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
    <title>Checkout</title>
    <link rel="stylesheet" href="styles/checkout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Include Navigation Bar -->
    <?php include 'includes/nav.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Checkout</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="payment">
                    <h3>Payment</h3>
                    <form action="complete_purchase.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" id="cardNumber" name="cardNumber" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="text" id="expiryDate" name="expiryDate" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="securityCode">Security Code</label>
                            <input type="text" id="securityCode" name="securityCode" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Complete Purchase</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="summary">
                    <h3>Summary</h3>
                    <div id="order-summary">
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
                    <p>Total: $<?php echo number_format($total, 2); ?></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
