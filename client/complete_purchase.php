<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Here you would handle the payment processing with a payment gateway
    // For this example, we'll just clear the cart and show a success message
    unset($_SESSION['cart']);
    header("Location: success.php");
    exit();
}
?>
