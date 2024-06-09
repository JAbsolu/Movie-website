<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <title>Movie Theatre</title>
</head>

<body>
    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo">flakes</h1>
            </div>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item">
                        Find a Movie
                        <div class="dropdown-menu movie-dropdown">
                            <div class="movie-list">
                                <div class="dropdown-item">Bad Boys: Ride or Die</div>
                                <div class="dropdown-item">Haikyu!! The Dumpster Battle</div>
                                <div class="dropdown-item">Furiosa: A Mad Max Saga</div>
                                <div class="dropdown-item">The Garfield Movie</div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-list-item">
                        Find a Theatre
                        <div class="dropdown-menu">
                            <div class="dropdown-item">Flakes Mystic 12</div>
                            <div class="dropdown-item">Flakes Haven 10</div>
                            <div class="dropdown-item">Flakes Norwalk 14</div>
                        </div>
                    </li>
                    <li class="menu-list-item">
                        More
                        <div class="dropdown-menu">
                            <div class="dropdown-item">Food and Drinks</div>
                            <div class="dropdown-item">Merch</div>
                            <div class="dropdown-item">Membership</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="profile-container">
                <i class="fas fa-user"></i>
                <a href="#" class="profile-link">Sign Up</a>
                <a href="#" class="profile-link">Sign In</a>
            </div>
        </div>
    </div>

    <!-- Banner Slider -->
    <div class="banner-swiper-container swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="img/Badboys.jpg" alt="Banner Image 1" class="banner-img">
                <div class="banner-content">
                    <h2 class="banner-title">Bad Boys: Ride or Die</h2>
                    <p class="banner-subtitle">Miami's Finest Are Now Its Most Wanted</p>
                    <p class="banner-duration">1 HR 55 MIN</p>
    
                </div>
            </div>
            <div class="swiper-slide">
                <img src="img/haikyuu-final (1) (1).png" alt="Banner Image 2" class="banner-img">
                <div class="banner-content">
                    <h2 class="banner-title">Haiku!! The Dumpster Battle</h2>
                    <p class="banner-subtitle">Karasuno High Vs Black Cats</p>
                    <p class="banner-duration">1 HR 25 MIN</p>
            
                </div>
            </div>
            <div class="swiper-slide">
                <img src="img/ezgif-3-d51f16e1d9 (1).png" alt="Banner Image 2" class="banner-img">
                <div class="banner-content">
                    <h2 class="banner-title">Furiosa: A Mad Max Saga</h2>
                    <p class="banner-subtitle">The origin story of renegade warrior Furiosa.</p>
                    <p class="banner-duration">1 HR 25 MIN</p>

                </div>
            </div>
            <!-- Add more slides as needed -->
        </div>
    </div>

    <h2 class="section-title">Now Showcasing at Flakes</h2>
    <div class="showcase-swiper-container swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="img/Bad Boys.png" alt="Movie Poster 1" class="poster-img">
                <div class="poster-info">
                    <p class="movie-title">Bad Boys: Ride or Die</p>
                    <p class="movie-length">1 HR 55 MIN</p>
                    <p class="movie-rating">R</p>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="img/Haikyu.png" alt="Movie Poster 2" class="poster-img">
                <div class="poster-info">
                    <p class="movie-title">Haikyu!! The Dumpster Battle</p>
                    <p class="movie-length">1 HR 25 MIN</p>
                    <p class="movie-rating">PG</p>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="img/lg-furiosa-final-poster.png" alt="Movie Poster 3" class="poster-img">
                <div class="poster-info">
                    <p class="movie-title">Furiosa: A Mad Max Saga</p>
                    <p class="movie-length">2 HR 30 MIN</p>
                    <p class="movie-rating">PG-13</p>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="img/The Garfield Movie.png" alt="Movie Poster 4" class="poster-img">
                <div class="poster-info">
                    <p class="movie-title">The Garfield Movie</p>
                    <p class="movie-length">1 HR 40 MIN</p>
                    <p class="movie-rating">G</p>
                </div>
            </div>
            <!-- Add more slides as needed -->
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
    <script>
        var bannerSwiper = new Swiper('.banner-swiper-container', {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 3000,
            },
        });

        var showcasingSwiper = new Swiper('.showcase-swiper-container', {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 5000,
            },
        });



    </script>
</body>

</html>
