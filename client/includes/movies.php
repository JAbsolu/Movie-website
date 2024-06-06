<?php

include '../../server/config.php';
include '../../server/index.php';

// Make call to backend
$new_connection = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// Check connection
if ($new_connection->connect_error) {
    die("Connection failed: " . $new_connection->connect_error);
}

$sql_query = 'SELECT * FROM `Movie`';
$result = $new_connection->query($sql_query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = $row["Title"]; // get the title of the movie
        $rating = $row["Rating"]; // get the rating 
        $duration = $row["Length"]; // get duration
        $released = $row["Released_date"]; // get released date
        
        //create movie listing for each movies pulled
        echo "<div class='movie'>"; 
        echo "<img src='client/img/164729.jpg' alt='$title'>";
        echo "<div class='movie-info'>";
        echo "<h3>$title</h3>";
        echo "<p>$duration</p>";
        echo "<button>Get Tickets</button>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No movies are listed.";
}

$new_connection->close();
?>
