<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/find-a-theatre.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="client/scripts/index.js" defer></script>
    <title>Find a Theatre</title>
</head>
<body>
    <?php include "includes/nav.php"; ?>
    <div class="container">
        <h1>All Theatres</h1>
        <div class="search-bar">
            <input type="text" placeholder="Search by City, Zip or Theatre" class="form-control search-input">
        </div>
        <div class="theatre-list row">
            <?php
            // Placeholder for PHP code to dynamically add theatres
            // Example of static content for now
            $theatres = [
                'Albany, GA', 'Albuquerque, NM', 'Allentown', 'Altoona, PA', 'Atlanta', 'Austin', 
                'Bakersfield', 'Baltimore', 'Baton Rouge', 'Billings, MT', 'Binghamton', 'Birmingham, AL', 
                'Bloomington - IL', 'Bloomington - IN', 'Boston', 'East Hanover', 'Eatontown', 'Edison', 
                'El Paso', 'Elizabeth', 'Eugene, OR', 'Evansville', 'Fayetteville', 'Fort Myers', 
                'Freehold', 'Ft. Wayne, IN', 'Galesburg', 'Gary', 'Grand Rapids', 'Great Falls, MT', 
                'Green Bay, WI', 'Mattoon', 'Miami / Ft. Lauderdale', 'Middletown', 'Milwaukee', 
                'Minneapolis / St. Paul', 'Minot, ND', 'Miramar Beach, FL', 'Missoula, MT', 'Montgomery', 
                'Morristown', 'Mount Vernon', 'Mountainside', 'Muncie/Richmond', 'Myrtle Beach, SC', 
                'Nashville, TN', 'New Brunswick', 'Rockford', 'Salt Lake City', 'San Antonio', 'San Diego', 
                'San Francisco', 'San Jose', 'Saratoga Springs', 'Savannah, GA', 'Seattle / Tacoma', 
                'Sherman, TX', 'Sioux City, IA', 'South Bend', 'Spokane', 'Springfield - IL', 
                'Springfield - MO', 'St. Louis' 
            ];
            foreach ($theatres as $theatre) {
                // Replace spaces and commas with URL-friendly dashes
                $theatre_slug = urlencode(str_replace(',', '', str_replace(' ', '-', $theatre)));
                echo "<div class='col-6 col-md-4 col-lg-3 theatre-item'><a href='theatre.php?name=$theatre_slug'>$theatre</a></div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
