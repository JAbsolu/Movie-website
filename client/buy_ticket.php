<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $price = $_POST['duration'];
    // Here you can add code to handle the purchase, e.g., save to a database, send a confirmation email, etc.
    // echo "You have bought: $item for $$price";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <title>Your Shopping Cart</title>

</head>
<body>
    <!-- navigation ----------------------------------------------------------------------------- -->
    <?php include "includes/nav.php"?>
    <div>
        <div class="row mt-3 mb-4 p-3">
            <h1 class="text-center mb-5">Your Shoping Cart</h1>
            <div class="col">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/ZTQyMmz-cQE?si=Vk_SoVsS06Gkq6Ag" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="col">
                <h3><?php echo htmlspecialchars($title) ?></p>
                <p>Ticket: <?php echo htmlspecialchars($price) ?></p>
                <p>Rating: <?php echo htmlspecialchars($rating) ?></p>
                <p>Duration: <?php echo htmlspecialchars($duration) ?></p>
                <div class="d-flex">
                    <p>Quantity: </p>
                    <input type="number" name="quantity">
                </div>
            </div>
        </div>
    </div>
</body>
</html>