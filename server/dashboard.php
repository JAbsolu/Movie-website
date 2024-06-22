<?php
include "connect/config.php";
// Start the session
session_start();
if(!isset($_SESSION['Username'])){
   header("Location: login.php");
   die();
}

// create the greeting message 
$greeting = "";
$user = "";

$login_session = $_SESSION['Username'];
$username = $_SESSION['Username'];

// Establish connection
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to prevent SQL injection
$sql = $conn->prepare("SELECT User_first_name, User_last_name FROM User WHERE Username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // get admin first name and last name
        $firstname = $row["User_first_name"];
        $lastname = $row["User_last_name"];
        //save user
        $user = "$firstname $lastname";
        // save a message in the greeting variable
        $greeting = "Hello $firstname $lastname welcome to your dashbaord";
    }
}

$sql->close();
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Movie Theater</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard.php">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">View Data</a>
                </li>
            </ul>
            <!-- List to sign o -->
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link profile" href="dashboard.php">
                        <?php echo $user; ?>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="logout.php">Sign out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Start Managing Movies</h1>
        
        <!-- Add Movie Form -->
        <div class="card mb-4">
            <div class="card-header">
                Add Movie
            </div>
            <div class="card-body">
                <form id="addMovieForm">
                    <div class="form-group">
                        <label for="movieTitle">Title</label>
                        <input type="text" class="form-control" id="movieTitle" placeholder="Enter movie title" required>
                    </div>
                    <div class="form-group">
                        <label for="movieGenre">Genre</label>
                        <input type="text" class="form-control" id="movieGenre" placeholder="Enter movie genre" required>
                    </div>
                    <div class="form-group">
                        <label for="movieDuration">Duration (mins)</label>
                        <input type="number" class="form-control" id="movieDuration" placeholder="Enter movie duration" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Movie</button>
                </form>
            </div>
        </div>

        <!-- Movies Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="moviesTableBody">
                <!-- Movies will be dynamically inserted here -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        let movies = [];
        let movieId = 0;

        // Add Movie
        $('#addMovieForm').on('submit', function (e) {
            e.preventDefault();
            const title = $('#movieTitle').val();
            const genre = $('#movieGenre').val();
            const duration = $('#movieDuration').val();

            movies.push({ id: ++movieId, title, genre, duration });
            renderMoviesTable();
            $('#addMovieForm')[0].reset();
        });

        // Render Movies Table
        function renderMoviesTable() {
            const moviesTableBody = $('#moviesTableBody');
            moviesTableBody.empty();

            movies.forEach(movie => {
                moviesTableBody.append(`
                    <tr>
                        <th scope="row">${movie.id}</th>
                        <td>${movie.title}</td>
                        <td>${movie.genre}</td>
                        <td>${movie.duration}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editMovie(${movie.id})">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteMovie(${movie.id})">Delete</button>
                        </td>
                    </tr>
                `);
            });
        }

        // Edit Movie
        function editMovie(id) {
            const movie = movies.find(m => m.id === id);
            if (movie) {
                $('#movieTitle').val(movie.title);
                $('#movieGenre').val(movie.genre);
                $('#movieDuration').val(movie.duration);
                $('#addMovieForm').off('submit').on('submit', function (e) {
                    e.preventDefault();
                    movie.title = $('#movieTitle').val();
                    movie.genre = $('#movieGenre').val();
                    movie.duration = $('#movieDuration').val();
                    renderMoviesTable();
                    $('#addMovieForm')[0].reset();
                    $('#addMovieForm').off('submit').on('submit', function (e) {
                        e.preventDefault();
                        const title = $('#movieTitle').val();
                        const genre = $('#movieGenre').val();
                        const duration = $('#movieDuration').val();

                        movies.push({ id: ++movieId, title, genre, duration });
                        renderMoviesTable();
                        $('#addMovieForm')[0].reset();
                    });
                });
            }
        }

        // Delete Movie
        function deleteMovie(id) {
            movies = movies.filter(movie => movie.id !== id);
            renderMoviesTable();
        }
    </script>
</body>
</html>
