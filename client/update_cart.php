<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = (float)$_POST['price'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = [
        'item' => $name,
        'price' => $price
    ];

    echo json_encode(['cart' => $_SESSION['cart']]);
}
?>
