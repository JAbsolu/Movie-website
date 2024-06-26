<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    // Here you can add code to handle the purchase, e.g., save to a database, send a confirmation email, etc.
    echo "You have bought: $item for $$price";
}
?>

