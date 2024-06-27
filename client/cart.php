<?php
session_start();
$total = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Food & Drink</title>
    <link rel="stylesheet" href="styles/cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-light" style="background: #000;">
    <!-- Include Navigation Bar -->
    <?php include 'includes/nav.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4 text">Order Food & Drink</h1>
        <div class="row text-dark">
            <div class="col-md-8">
                <div class="section">
                    <h3 class="text-dark">Combos</h3>
                    <div class="combos">
                        <div class="item text-dark" data-name="Large Popcorn & Drink Combo" data-price="10.00">
                            <img src="img/Popcorn Combo.webp" alt="Combo 1">
                            <div class="description">
                                <p>Large Popcorn & Drink Combo (1 Large Popcorn, 1 Large Fountain Drink)</p>
                            </div>
                        </div>
                        <div class="item text-dark" data-name="Large Popcorn & Large ICEE Combo" data-price="12.00">
                            <img src="img/combo12.webp" alt="Combo 2">
                            <div class="description">
                                <p>Large Popcorn & Large ICEE Combo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <h3 class="text-light">Popcorn</h3>
                    <div class="item text-light">
                        <img src="img/popcorn1.webp" alt="Popcorn">
                        <div class="description">
                            <p>Large Popcorn</p>
                        </div>
                    </div>
                    <div class="popcorn-options">
                        <div class="popcorn-item text-light" data-name="Small Popcorn" data-price="6.40">
                            <img src="img/smallpopcorn.webp" alt="Small Popcorn">
                            <p>Small Popcorn $6.40</p>
                        </div>
                        <div class="popcorn-item text-light" data-name="Medium Popcorn" data-price="7.60">
                            <img src="img/mediumpopcorn.webp" alt="Medium Popcorn">
                            <p>Medium Popcorn $7.60</p>
                        </div>
                        <div class="popcorn-item text-light" data-name="Large Popcorn" data-price="8.00">
                            <img src="img/largepopcorn.webp" alt="Large Popcorn">
                            <p>Large Popcorn $8.00</p>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <h3 class="text-light">Fountain Drinks</h3>
                    <div class="item text-light">
                        <img src="img/fountaindrinks.webp" alt="Fountain Drinks">
                        <div class="description">
                            <p>Choose from a variety of fountain drinks</p>
                        </div>
                    </div>
                    <div class="drink-options">
                        <div class="drink-item text-light" data-name="Small Drink" data-price="3.00">
                            <img src="img/smalldrink.png" alt="Small Drink">
                            <p>Small Drink $3.00</p>
                        </div>
                        <div class="drink-item text-light" data-name="Medium Drink" data-price="4.00">
                            <img src="img/mediumdrink.webp" alt="Medium Drink">
                            <p>Medium Drink $4.00</p>
                        </div>
                        <div class="drink-item text-light" data-name="Large Drink" data-price="5.00">
                            <img src="img/largedrink.webp" alt="Large Drink">
                            <p>Large Drink $5.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-summary text-light">
                    <h4>Your Order</h4>
                    <div id="cart-items">
                        <?php
                        if (!empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $item) {
                                echo '<p>' . $item['item'] . ' - $' . number_format($item['price'], 2) . '</p>';
                            }
                        } else {
                            echo '<p>Your cart is empty.</p>';
                        }
                        ?>
                    </div>
                    <p>Total: $<span id="cart-total"><?php echo number_format($total, 2); ?></span></p>
                    <button class="btn btn-primary" onclick="window.location.href='checkout.php'">Continue to Checkout</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('.combos .item, .popcorn-options .popcorn-item, .drink-options .drink-item');
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');

            items.forEach(function (item) {
                item.addEventListener('click', function () {
                    const name = item.getAttribute('data-name');
                    const price = parseFloat(item.getAttribute('data-price'));

                    // Add item to the server-side cart using Ajax
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'update_cart.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Update the cart display
                            const response = JSON.parse(xhr.responseText);
                            cartItems.innerHTML = '';
                            let total = 0;
                            response.cart.forEach(function (cartItem) {
                                const itemElement = document.createElement('p');
                                itemElement.textContent = `${cartItem.item} - $${cartItem.price.toFixed(2)}`;
                                cartItems.appendChild(itemElement);
                                total += cartItem.price;
                            });
                            cartTotal.textContent = total.toFixed(2);
                        }
                    };
                    xhr.send(`name=${name}&price=${price}`);
                });
            });
        });
    </script>
</body>
</html>
