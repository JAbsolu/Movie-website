<?php include "../server/connect/config.php"; ?>

<?php
// Get the showtime_id from the URL
$showtime_id = $_GET['showtime_id'];

// Fetch seating details from the database
$query = "SELECT * FROM seats WHERE showtime_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $showtime_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Select Seat</title>
</head>
<body class="text-light" style="background: #000;">
<?php include "includes/nav.php" ?>

<div class="container mt-5">
    <h2>Select Your Seat</h2>
    <div class="row">
        <?php
        while ($seat = $result->fetch_assoc()) {
            $class = $seat['is_booked'] ? 'btn-danger' : 'btn-success';
            echo '<div class="col-md-1 mb-2"><a href="confirm_booking.php?seat_id=' . $seat['id'] . '" class="btn ' . $class . '">' . $seat['seat_number'] . '</a></div>';
        }
        ?>
    </div>
</div>

</body>
</html>
