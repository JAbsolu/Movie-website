<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Theater Website</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="./scripts/app.js" async></script>
</head>
<body>
    <?php include("includes/header.php") ?>
    <div class="container">
        <div class="content-container">
            <div class="featured-content"  style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/f-1.jpg');">
            
            <img class="featured-title" src="img/f-t-1.png" alt="">
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
                <!-- Movie 1 -->
                <div class="movie">
                    <img src="img/164729.jpg" alt="Movie Title 1">
                    <div class="movie-info">
                        <h3>Haikyu!! The Dumpster Battle </h3>
                        <p>1 HR 25 Min</p>
                        <button>Get Tickets</button>
                    </div>
                </div>
                <!-- Movie 2 -->
                <div class="movie">
                    <img src="img/164492.avif" alt="Movie Title 2">
                    <div class="movie-info">
                        <h3>Kingdom of the Planet of the Apes</h3>
                        <p>2 HR 25 min</p>
                        <button>Get Tickets</button>
                    </div>
                </div>
                <!-- Movie 3 -->
                <div class="movie">
                    <img src="img/163585.avif" alt="Movie Title 3">
                    <div class="movie-info">
                        <h3>The Garfield Movie</h3>
                        <p>1 HR 45 min</p>
                        <button>Get Tickets</button>
                    </div>
                </div>
            </div>
            
                </div>
        </div>
    </div>
    

    
    <main>
        <!-- Main content goes here -->
    </main>

    <!-- Footer content goes here -->
    <?php include("include/footer.php") ?>
</body>
</html>
