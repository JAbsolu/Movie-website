<?php
$title = $price = $rating = $duration = ""; // Initialize variables with default values

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $duration = $_POST['duration'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ticket.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../scripts/index.js" defer></script>
    <style>
        .movie-info {
            margin-top: 20px;
        }
        .movie-info h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        .movie-info .details {
            font-size: 1.2em;
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .showtimes {
            margin-top: 20px;
        }
        .showtime-location {
            margin-bottom: 20px;
        }
        .showtime-header {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .showtime-times .showtime-time {
            margin-right: 10px;
            padding: 5px 10px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        
     
    </style>
    <title>Movie Details - <?php echo htmlspecialchars($title); ?></title>
</head>
<body class="text-light" style="background: #000;">
    <!-- navigation ----------------------------------------------------------------------------- -->
    <?php include "includes/nav.php"; ?>
    <div class="container mt-5">
        <div class="row mb-4">
            <!-- Movie Poster and Trailer -->
            <div class="col-md-4">
                <img src="../client/img/Bad Boys.png" alt="Movie Poster" class="img-fluid mb-3">
            </div>
            <div class="col-md-8">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/ZTQyMmz-cQE?si=Vk_SoVsS06Gkq6Ag" title="YouTube video player" class="rounded" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 movie-info">
                <h1 class="movie-title text-light"><?php echo htmlspecialchars($title) ?></h1>
                <div class="details">
                    <span><strong>Rating:</strong> <?php echo htmlspecialchars($rating) ?></span>
                    <span><strong>Runtime:</strong> <?php echo htmlspecialchars($duration) ?></span>
                    <span><strong>Release Date:</strong> June 7, 2024</span>
                    <span><strong>Genre:</strong> Action, Comedy</span>
                </div>
                <p>When their late police captain gets linked to drug cartels, wisecracking Miami cops Mike Lowrey and Marcus Burnett embark on a dangerous mission to clear his name.</p>
            </div>
        </div>
        <div class="showtimes">
            <div class="showtime-location">
                <div class="showtime-header text-light">Flakes Post 14 - Milford, CT</div>
                <div class="showtime-times">
                    <a href="seating.php?showtime=10:10am&price=10.00" class="showtime-time">10:10am</a>
                    <a href="seating.php?showtime=1:05pm&price=10.00" class="showtime-time">1:05pm</a>
                    <a href="seating.php?showtime=3:55pm&price=10.00" class="showtime-time">3:55pm</a>
                </div>
            </div>
            <div class="showtime-location">
                <div class="showtime-header text-light">Flakes North Haven 15 - North Haven, CT</div>
                <div class="showtime-times">
                    <a href="seating.php?showtime=10:25am&price=10.00" class="showtime-time">10:25am</a>
                    <a href="seating.php?showtime=1:05pm&price=10.00" class="showtime-time">1:05pm</a>
                    <a href="seating.php?showtime=3:45pm&price=10.00" class="showtime-time">3:45pm</a>
                    <a href="seating.php?showtime=6:35pm&price=10.00" class="showtime-time">6:35pm</a>
                    <a href="seating.php?showtime=9:20pm&price=10.00" class="showtime-time">9:20pm</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
