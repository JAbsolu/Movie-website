<?php include "server/connect/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/food-and-drinks.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="scripts/index.js" defer></script>
    <title>Flakes - Food and Drinks</title>
</head>

<body class="text-light" style="background: #000;">
<?php include "includes/nav.php"; ?>

    <div class="container mt-5">
        <h2 class="section-title mb-4">T-Shirts</h2>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="menu-item">
                    <img src="#" alt="Small T-Shirt" class="menu-img">
                    <h3>Small</h3>
                    <p>$4.50</p>
                    <form action="buy.php" method="POST">
                        <input type="hidden" name="item" value="Small T-Shirt">
                        <input type="hidden" name="price" value="4.50">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menu-item">
                    <img src="#" alt="Medium T-Shirt" class="menu-img">
                    <h3>Medium</h3>
                    <p>$5.00</p>
                    <form action="buy.php" method="POST">
                        <input type="hidden" name="item" value="Medium T-Shirt">
                        <input type="hidden" name="price" value="5.00">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menu-item">
                    <img src="#" alt="Large T-Shirt" class="menu-img">
                    <h3>Large</h3>
                    <p>$5.50</p>
                    <form action="buy.php" method="POST">
                        <input type="hidden" name="item" value="Large T-Shirt">
                        <input type="hidden" name="price" value="5.50">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            </div>
        </div>

        <h2 class="section-title mb-4">Hoodies</h2>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="menu-item">
                    <img src="#" alt="Small Hoodie" class="menu-img">
                    <h3>Small</h3>
                    <p>$10.00</p>
                    <form action="buy.php" method="POST">
                        <input type="hidden" name="item" value="Small Hoodie">
                        <input type="hidden" name="price" value="10.00">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menu-item">
                    <img src="#" alt="Medium Hoodie" class="menu-img">
                    <h3>Medium</h3>
                    <p>$11.00</p>
                    <form action="buy.php" method="POST">
                        <input type="hidden" name="item" value="Medium Hoodie">
                        <input type="hidden" name="price" value="11.00">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menu-item">
                    <img src="#" alt="Large Hoodie" class="menu-img">
                    <h3>Large</h3>
                    <p>$12.00</p>
                    <form action="buy.php" method="POST">
                        <input type="hidden" name="item" value="Large Hoodie">
                        <input type="hidden" name="price" value="12.00">
                        <button type="submit">Buy</button>
                    </form>
                </div>
            </div>
        </div>

        </div>

    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>
