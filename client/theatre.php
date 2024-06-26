<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="client/scripts/index.js" defer></script>
    <title>Theatre Details</title>
</head>
<body>
    <?php include "includes/nav.php"; ?>
    <div class="container">
        <h1 class="text-center">Theatre Details</h1>
        <?php
        if (isset($_GET['name'])) {
            $theatre_name = str_replace('-', ' ', urldecode($_GET['name']));
            print ("
            <!-- Movie Container -->
            <h2 class='section-title mt-5 mb-4'>Now Showcasing at $theatre_name</h2>
            <span class='bg-dark' width='100px'></span>
             <div class='container'>
                <div class='row d-flex flex-row justify-content-start'>
                    <div class='col-sm'>
                        <img src='img/Bad Boys.png' alt='Movie Poster 1' class='poster-img' width='250px'>
                        <div class='mt-2'>
                            <p class='p-0 m-0'>Bad Boys: Ride or Die</p>
                            <p class='p-0 m-0'>1 HR 55 MIN</p>
                            <p class=''>R</p>
                        </div>
                    </div>
                </div>
             </div>
            ");
            // Here you can add more details about the theatre from the database
        } else {
            echo "<p>No theatre selected.</p>";
        }
        ?>
    </div>
</body>
</html>
