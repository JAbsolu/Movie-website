<?php
include "../connect/config.php";
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

//create query
$sql = "SHOW TABLES";
$result = $conn->query($sql);

//create an arrays to store tables
$tables = [];

if ($result->num_rows > 0) {
    $i = 0;
    while ($row = $result->fetch_array()) {
        $table = $row[0];
        $tables[] = $table;
    }
}

function getTables($table, $connection) {
    $sql = "SELECT * FROM $table";
    $result = $connection->query($sql);
    return $result;
}

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
    <script src='script.js' defer></script>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">Flakes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../client" target="_blank">View Site</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="dashboard.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo htmlspecialchars($user) ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container mt-5">
        <h1 class="mb-4 color-blue"> Welcome to your dashboard <?php echo htmlspecialchars($user)?></h1>
        <!-- Add Movie Form -->
        <div class="card mb-4">
            <div class="card-header">
                <p class="table_list">Manage Tables</p>
                <!-- PHP -->
                <?php

                    print (
                        "<div class='d-flex gap-3 flex-wrap mt-3'>
                        "); 
                    foreach($tables as $table) {
                        echo  "<button class=' py-1 px-3 table-btn btn bg-dark text-light' type='button' data-table='$table'>$table</button>";
                    }
                    echo "</div>";
                ?>
            </div>
        </div>
        <div class="card-body">
            <!-- ADDRESS FORM -->
                <form id='address_form' method='post' action='../insert-data/insert_address.php' class='d-block'>
                    <div class='form-group'>
                        <label for='addressNumber'>Address Number</label>
                        <input type='number' class='form-control' id='addressNumber' name='addressNumber' placeholder='Enter address number' required>
                    </div>
                    <div class='form-group'>
                        <label for='address'>Address</label>
                        <input type='text' class='form-control' id='address' name='address' placeholder='Enter address' required>
                    </div>
                    <div class='form-group'>
                        <label for='city'>City</label>
                        <input type='text' class='form-control' id='city' name='city' placeholder='Enter city' required>
                    </div>
                    <div class='form-group'>
                        <label for='zipCode'>Zip Code</label>
                        <input type='text' class='form-control' id='zipCode' name='zipCode' placeholder='Enter zip code' required>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add Address</button>
                </form>
                <!-- Cinema form -->
                <form id='cinema_form' method='post' action='../insert-data/insert_cinema.php' class='d-none'>
                    <div class='form-group'>
                        <label for='cinemaName'>Cinema Name</label>
                        <input type='text' class='form-control' id='cinemaName' name='cinemaName' placeholder='Enter cinema name' required>
                    </div>
                    <div class='form-group'>
                        <label for='locationId'>Location ID</label>
                        <input type='number' class='form-control' id='locationId' name='locationId' placeholder='Enter location ID' required>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add Cinema</button>
                </form>
                <!-- Customer FOrm -->
                <form id='customer_form' method='post' action='../insert-data/insert_customer.php' class='d-none'>
                    <div class='form-group'>
                        <label for='username'>Username</label>
                        <input type='text' class='form-control' id='username' name='username' placeholder='Enter username' required>
                    </div>
                    <div class='form-group'>
                        <label for='email'>Email Address</label>
                        <input type='email' class='form-control' id='email' name='email' placeholder='Enter email address' required>
                    </div>
                    <div class='form-group'>
                        <label for='firstName'>First Name</label>
                        <input type='text' class='form-control' id='firstName' name='firstName' placeholder='Enter first name' required>
                    </div>
                    <div class='form-group'>
                        <label for='lastName'>Last Name</label>
                        <input type='text' class='form-control' id='lastName' name='lastName' placeholder='Enter last name' required>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add Customer</button>
                </form>
                <!-- FOOD FORM -->
                <form id='food_form' method='post' action='../insert-data/insert_food.php' class='d-none'>
                    <div class='form-group'>
                        <label for='foodName'>Food Name</label>
                        <input type='text' class='form-control' id='foodName' name='foodName' placeholder='Enter food name' required>
                    </div>
                    <div class='form-group'>
                        <label for='price'>Price</label>
                        <input type='number' class='form-control' id='price' name='price' placeholder='Enter price' required>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add Food</button>
                </form>
                <!-- GIFT CARD FORM -->
                <form id='gift_card_form' method='post' action='../insert-data/insert_giftcard.php' class='d-none'>
                    <div class='form-group'>
                        <label for='amount'>Amount</label>
                        <input type='number' class='form-control' id='amount' name='amount' placeholder='Enter amount' required>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add Gift Card</button>
                </form>
                <!-- LOCATION FORM -->
                <form id='location_form' method='post' action='../insert-data/insert_address.php' class='d-none'>
                    <div class='form-group'>
                        <label for='address_ID'>Address ID</label>
                        <input type='text' class='form-control' id='address_ID' name='address_ID' placeholder='Enter address ID' required>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add Location</button>
                </form>
                <!-- MERCH FORM -->
                <form id='merch_form' method='post' action='../insert-data/insert_merch.php' class='d-none'>
                    <div class='form-group'>
                        <label for='merchName'>Merch Name</label>
                        <input type='text' class='form-control' id='merchName' name='merchName' placeholder='Enter merch name' required>
                    </div>
                    <div class='form-group'>
                        <label for='merchPrice'>Merch Price</label>
                        <input type='text' class='form-control' id='merchPrice' name='merchPrice' placeholder='Enter merch price' required>
                    </div>
                    <div class='form-group'>
                        <label for='merchType'>Merch Type</label>
                        <input type='text' class='form-control' id='merchType' name='merchType' placeholder='Enter merch type' required>
                    </div>
                    <div class='form-group'>
                        <label for='stock'>Stock</label>
                        <input type='text' class='form-control' id='stock' name='stock' placeholder='Enter stock' required>
                    </div>
                    <div class='form-group'>
                        <label for='size'>Size</label>
                        <input type='text' class='form-control' id='size' name='size' placeholder='Enter size'>
                    </div>
                    <div class='form-group'>
                        <label for='color'>Color</label>
                        <input type='text' class='form-control' id='color' name='color' placeholder='Enter color'>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add Merch</button>
                </form>
                 <!-- MOVIE FORM -->
                 <form id='movie_form' method='POST' action='../insert-data/insert_movie.php' class='d-none'>
                    <div class='form-group'>
                        <label for='movieTitle'>Title</label>
                        <input type='text' class='form-control' id='movieTitle' name='movieTitle' placeholder='Enter movie title' required>
                    </div>
                    <div class='form-group'>
                        <label for='movieGenre'>Genre</label>
                        <input type='text' class='form-control' id='movieGenre' name='movieGenre' placeholder='Enter movie genre' required>
                    </div>
                    <div class='form-group'>
                        <label for='releasedDate'>Released Date</label>
                        <input type='date' class='form-control' id='releasedDate' name='releasedDate' required>
                    </div>
                    <div class='form-group'>
                        <label for='movieDuration'>Duration (mins)</label>
                        <input type='number' class='form-control' id='movieDuration' name='movieDuration' placeholder='Enter movie duration' required>
                    </div>
                    <div class='form-group'>
                        <label for='showtime'>Showtime</label>
                        <input type='text' class='form-control' id='showtime' name='showtime' placeholder='Enter showing times' required>
                    </div>
                    <div class='form-group'>
                        <label for='description'>Description</label>
                        <textarea class='form-control' id='description' name='description' placeholder='Enter movie description' required></textarea>
                    </div>
                    <div class='form-group'>
                        <label for='language'>Language</label>
                        <input type='text' class='form-control' id='language' name='language' placeholder='Enter movie language' required>
                    </div>
                    <div class='form-group'>
                        <label for='fileToUpload'>Select image to upload:</label><br>
                        <input type='file' name='fileToUpload' id='fileToUpload'>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add Movie</button>
                </form>
                <!-- AUDITORIUM FORM -->
                <form id='movie_room_form' method='post' action='../insert-data/insert_movie_room.php' class='d-none'>
                    <div class='form-group'>
                        <label for='capacity'>Capacity</label>
                        <input type='text' class='form-control' id='capacity' name='capacity' placeholder='Enter capacity' required>
                    </div>
                    <div class='form-group'>
                        <label for='available'>Available?</label>
                        <input type='text' class='form-control' id='available' name='available' placeholder='Enter available' required>
                    </div>
                    <div class='form-group'>
                        <label for='cinemaID'>Cinema ID</label>
                        <input type='text' class='form-control' id='cinemaID' name='cinemaID' placeholder='Enter cinema ID' required>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add</button>
                </form>
                <!-- ROLE -->
                <form id='role_form' method='post' action='../insert-data/insert_role.php' class='d-none'>
                    <div class='form-group'>
                        <label for='role'>Role</label>
                        <input type='text' class='form-control' id='role' name='role' placeholder='Enter role' required>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add role</button>
                </form>
                <!-- USER -->
                <form id='user_form' method='post' action='../insert-data/insert_user.php' class='d-none'>
                    <div class='form-group'>
                        <label for='first_name'>First name</label>
                        <input type='text' class='form-control' id='first_name' name='first_name' placeholder='Enter first name' required>
                    </div>
                    <div class='form-group'>
                        <label for='last_name'>Last name</label>
                        <input type='text' class='form-control' id='last_name' name='last_name' placeholder='Enter last name' required>
                    </div>
                    <div class='form-group'>
                        <label for='username'>Username</label>
                        <input type='text' class='form-control' id='username' name='username' placeholder='Enter username' required>
                    </div>
                    <div class='form-group'>
                        <label for='email_address'>Email address</label>
                        <input type='text' class='form-control' id='email_address' name='email_address' placeholder='Enter email address' required>
                    </div>
                    <div class='form-group'>
                        <label for='password'>Password</label>
                        <input type='text' class='form-control' id='password' name='password' placeholder='Enter password' required>
                    </div>
                    <button type='submit' class='mt-2 btn btn-primary'>Add user</button>
                </form>
            </div>

        <?php
            $sql = "SELECT * FROM User";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            echo "<table class='mb-5 table table-striped'><thead> <tr>";
                echo "<th scope='col'>User ID</th>";
                echo "<th scope='col'>First name</th>";
                echo "<th scope='col'>Last name</th>";
                echo "<th scope='col'>Username</th>";
                echo "<th scope='col'>User email address</th>";
                while ($row = $result->fetch_assoc()) {
                    $user_id = $row['User_ID'];
                    $first_name = $row['User_first_name'];
                    $last_name = $row['User_last_name'];
                    $username = $row['Username'];
                    $user_email_address = $row['User_email_address'];
                    $user_password = $row['User_password'];
                    

                    echo "<tr>";
                    echo "<td scope='col'>$user_id</th>";
                    echo "<td scope='col'>$first_name</th>";
                    echo "<td scope='col'>$last_name</th>";
                    echo "<td scope='col'>$username</th>";
                    echo "<td scope='col'>$user_email_address</th>";
                    echo "</tr>";
                }
                echo " </tr></thead><tbody id='TableBody'></tbody></table>";
            }
            // Display movies
            $sql = "SELECT * FROM Movie";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            echo "<table class='mt-4 mb-5 table table-striped'><thead> <tr>";
                echo "<th scope='col'>Movie ID</th>";
                echo "<th scope='col'>Movie Title</th>";
                echo "<th scope='col'>Movie Genre</th>";
                echo "<th scope='col'>Released date</th>";
                echo "<th scope='col'>Movie Duration</th>";
                while ($row = $result->fetch_assoc()) {
                    $movie_id = $row['MovieID'];
                    $title = $row['Title'];
                    $genre = $row['Genre'];
                    $released = $row['ReleaseDate'];
                    $duration = $row['Duration'];
                    // $user_password = $row['User_password'];
                    

                    echo "<tr>";
                    echo "<td scope='col'>$movie_id</th>";
                    echo "<td scope='col'>$title</th>";
                    echo "<td scope='col'>$genre</th>";
                    echo "<td scope='col'>$released</th>";
                    echo "<td scope='col'>$duration</th>";
                    echo "</tr>";
                }
                echo " </tr></thead><tbody id='TableBody'></tbody></table>";
            }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <?php $conn->close() ?>
</body>
</html>
