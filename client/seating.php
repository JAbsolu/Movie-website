<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $showtime = $_POST['showtime'];
    $seats = $_POST['seats'];
    $pricePerSeat = 10.00;
    foreach ($seats as $seat) {
        $_SESSION['cart'][] = array('item' => $seat, 'showtime' => $showtime, 'price' => $pricePerSeat);
    }
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seating for Showtime</title>
    <link rel="stylesheet" href="styles/seating.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-light" style="background: #000;">
    <!-- Include Navigation Bar -->
    <?php include 'includes/nav.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Seating for Showtime: 10:10am</h1>
        <div class="seating-section d-flex justify-content-center">
            <div class="seating-chart">
                <div class="screen text-center mb-3">Screen</div>
                <form action="seating.php" method="POST">
                    <div class="seats d-flex flex-wrap justify-content-center">
                        <?php
                        $rows = ['A', 'B'];
                        $cols = [1, 2, 3];
                        foreach ($rows as $row) {
                            foreach ($cols as $col) {
                                $seat = $row . $col;
                                echo '<div class="seat">';
                                echo '<input type="checkbox" id="' . $seat . '" name="seats[]" value="' . $seat . '">';
                                echo '<label for="' . $seat . '">' . $seat . '</label>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                    <input type="hidden" name="showtime" value="10:10am">
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
