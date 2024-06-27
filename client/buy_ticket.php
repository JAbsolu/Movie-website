<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $rating = htmlspecialchars($_POST['rating']);
    $duration = $_POST['duration'];
    // Here you can add code to handle the purchase, e.g., save to a database, send a confirmation email, etc.
    include "includes/nav.php";

    print"<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='stylesheet' href='styles/style.css'>
                <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap' rel='stylesheet'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
                <link rel='stylesheet' href='https://unpkg.com/swiper/swiper-bundle.min.css'>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' 
                integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' 
                integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
                <script src='client/scripts/index.js' defer></script>
                <title>Your Shopping Cart</title>

            </head>
            <body class='text-light' style='background: #000;'>
                <!-- navigation ----------------------------------------------------------------------------- -->
                <div>
                    <div class='row mt-3 p-3'>
                        <div class='col-md'>
                        <iframe width='560' height='315' src='https://www.youtube.com/embed/ZTQyMmz-cQE?si=Vk_SoVsS06Gkq6Ag' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe>
                        </div>
                        <div class='col-md'>
                            <h4 class='mb-5'>Buy Tickets</h4>
                            <h5 class='mb-3'>$title</h5>
                            <p>Duration: $duration </p>
                            <p>Rated $rating </p>
                            <div class='d-flex gap-3'>
                            <p>Quantity: </p>
                            <input type='number' name='quantity' style='height: 25px; width: 50px'>
                            </div>
                                <button type='submit' class='btn btn-danger mt-2'>Buy Ticket</button>
                            <div>
                        </div>
                    </div>
                    <h4 class='mt-5 mb-1 px-4'> More Movie Trailers</h4>
                    <div class='mt-3 p-3 d-flex gap-2 mb-5' style='overflow: auto'>
                        <div>
                        <iframe width='550' height='305' src='https://www.youtube.com/embed/ZTQyMmz-cQE?si=Vk_SoVsS06Gkq6Ag' title='YouTube video player' 
                            frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' 
                            referrerpolicy='strict-origin-when-cross-origin' allowfullscreen>
                        </iframe>
                        </div>
                        <div>
                        <iframe width='550' height='305' src='https://www.youtube.com/embed/FVswuip0-co?si=vxHKOcRKz4Ac9I32' title='YouTube video player' 
                            frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' 
                            referrerpolicy='strict-origin-when-cross-origin' allowfullscreen>
                        </iframe>
                        </div>
                        <div>
                        <iframe width='550' height='305' src='https://www.youtube.com/embed/IeFWNtMo1Fs?si=zMKRNMpIxIrBnesK' title='YouTube video player' 
                            frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' 
                            referrerpolicy='strict-origin-when-cross-origin' allowfullscreen>
                        </iframe>
                        </div>
                </div>
            </body>
        </html>"
        ;
}
?>

