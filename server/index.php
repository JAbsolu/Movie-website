<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mt-5">Admin Login</h2>
            <form action="admin_login.php" method="post">
                <div class="form-group">
                    <label for="username">Username or Email</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <?php
                if (isset($_SESSION['login_error'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
                    unset($_SESSION['login_error']);
                }
                ?>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
include '../server/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create connection
    $new_connection = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    // Check connection
    if ($new_connection->connect_error) {
        die("Connection failed: " . $new_connection->connect_error);
    }

    // Query to check the user credentials
    $sql = "SELECT * FROM admin_users WHERE (username = ? OR email = ?) AND password = ?";
    $stmt = $new_connection->prepare($sql);
    $stmt->bind_param("sss", $username, $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php');
        exit();
    } else {
        $_SESSION['login_error'] = 'Invalid username or password';
        header('Location: admin_login.php');
        exit();
    }

    $stmt->close();
    $new_connection->close();
}
?>
