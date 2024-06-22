<?php include "../includes/nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/food-and-drinks.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Food and Drinks</title>
</head>
<body>
    <div class="container">
        <h1>Our Drinks</h1>
        <div class="drinks-list">
            <div class="drink-item">
                <img src="images/soda.png" alt="Soda">
                <h2>Soda</h2>
                <p>Refreshing soda drink</p>
                <p>Price: $1.99</p>
                <button>Buy Now</button>
            </div>
            <div class="drink-item">
                <img src="images/beer.png" alt="Beer">
                <h2>Beer</h2>
                <p>Cold alcoholic beer</p>
                <p>Price: $3.99</p>
                <button>Buy Now</button>
            </div>
            <!-- Add more drink items as needed -->
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
