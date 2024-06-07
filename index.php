<?php 
    include './server/config.php';
    include './server/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Theater Website</title>
    <link rel="stylesheet" href="client/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="client/scripts/app.js" async></script>
</head>
<body>
    <?php include("client/includes/header.php") ?>
    <div class="container">
        <div class="content-container">
            <div class="featured-content"  style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('client/img/f-1.jpg');">
            
            <img class="featured-title" src="client/img/f-t-1.png" alt="">
            <p class="featured-desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates ut assumenda vero eos ratione sunt alias ducimus dolorem magnam hic doloremque ipsa totam modi qui laborum, porro voluptatum asperiores rerum.</p>
            <button class="featured-button">WATCH NOW</button>
            </div>
            <div class="movie-list-title">
                Movies at NMT
                <span class="movie-status">
                    <span class="now-playing">Now Playing</span> | 
                    <span class="coming-soon">Coming Soon</span>
                </span>
            </div>
            <div class="movie-showcase">
                <!-- Generate list of movies from database-->
                <?php 
                    //pulling data from backend, and accessing this include file from the includes folder
                    include "client/includes/movies.php";
                ?>

            </div>
            
            </div>
        </div>
    </div>
    

    
    <main>
        <!-- Main content goes here -->
    </main>

    <!-- Footer content goes here -->
    <?php include("client/include/footer.php") ?>
</body>
</html>
