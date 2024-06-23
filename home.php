
<?php include "server/connect/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="client/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="client/scripts/index.js" defer></script>
    <title>Flakes</title>
</head>

<body class="text-light" style="background: #000;">
<?php include "client/includes/nav.php" ?>

    <!-- Banner Slider -->
    <div class="container p-0 banner-swiper-container swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide bg-dark p-2 rounded-2">
                <img src="client/img/Badboys.jpg" alt="Banner Image 1" class="banner-img">
                <div class="banner-content">
                    <h2 class="banner-title">Bad Boys: Ride or Die</h2>
                    <p class="banner-subtitle">Miami's Finest Are Now Its Most Wanted</p>
                    <p class="banner-duration">1 HR 55 MIN</p>
                </div>
            </div>
            <div class="swiper-slide bg-dark p-2 rounded-2">
                <img src="client/img/haikyuu-final (1) (1).png" alt="Banner Image 2" class="banner-img">
                <div class="banner-content">
                    <h2 class="banner-title">Haiku!! The Dumpster Battle</h2>
                    <p class="banner-subtitle">Karasuno High Vs Black Cats</p>
                    <p class="banner-duration">1 HR 25 MIN</p>
            
                </div>
            </div>
            <div class="swiper-slide bg-dark p-2 rounded-2">
                <img src="client/img/ezgif-3-d51f16e1d9 (1).png" alt="Banner Image 2" class="banner-img">
                <div class="banner-content">
                    <h2 class="banner-title">Furiosa: A Mad Max Saga</h2>
                    <p class="banner-subtitle">The origin story of renegade warrior Furiosa.</p>
                    <p class="banner-duration">1 HR 25 MIN</p>

                </div>
            </div>
            <!-- Add more slides as needed -->
        </div>
    </div>

    <!-- Movie Container -->
    <h2 class="section-title mt-5 mb-4">Now Showcasing at Flakes</h2>
    <span class="bg-dark" width="100px"></span>
     <div class="container">
        <div class="row d-flex flex-row justify-content-start">
            <div class="col-sm">
                <img src="client/img/Bad Boys.png" alt="Movie Poster 1" class="poster-img" width="250px">
                <div class="mt-2">
                    <p class="p-0 m-0">Bad Boys: Ride or Die</p>
                    <p class="p-0 m-0">1 HR 55 MIN</p>
                    <p class="">R</p>
                </div>
            </div>
            <div class="col-sm">
                <img src="client/img/Haikyu.png" alt="Movie Poster 2" class="poster-img" width="250px">
                <div class="mt-2">
                    <p class="p-0 m-0">Haikyu!! The Dumpster Battle</p>
                    <p class="p-0 m-0">1 HR 25 MIN</p>
                    <p class="">PG</p>
                </div>
            </div>
            <div class="col-sm">
                <img src="client/img/lg-furiosa-final-poster.png" alt="Movie Poster 3" class="poster-img" width="250px">
                <div class="mt-2">
                    <p class="p-0 m-0">Furiosa: A Mad Max Saga</p>
                    <p class="p-0 m-0">2 HR 30 MIN</p>
                    <p class="">PG-13</p>
                </div>
            </div>
            <div class="col-sm">
                <img src="client/img/The Garfield Movie.png" alt="Movie Poster 4" class="poster-img" width="250px">
                <div class="mt-2">
                    <p class="p-0 m-0">The Garfield Movie</p>
                    <p class="p-0 m-0">1 HR 40 MIN</p>
                    <p class="">PG-13</p>
                </div>
            </div>

        </div>
     </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Modal Structure -->
    <div id="trailerModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div class="video-container">
                <iframe id="trailerVideo" width="560" height="315" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>
