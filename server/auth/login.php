<?php
include "../connect/config.php";
$error = '';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Create a database connection
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the username and password from the form and escape them
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Create SQL query
    $sql = "SELECT * FROM User WHERE Username = '$username' AND User_password = '$password'";

    // Get result
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['Username'] = $username;
        header("location: dashboard.php");
        exit();
    } else {
        $error = "Your username or password is invalid, try again";
    }

    // Close the database connection
    mysqli_close($conn);

} else {
    // Remove all session variables
    session_unset();

    // Destroy the session
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Movie Theater Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../client/styles/style.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
        <h3 class="fw-bold color-blue mb-3">Flakes</h3>
        <div class="card" style="width: 400px;">
            <div class="card-body">
                <h3 class="card-title text-center ">Please Log in</h3>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                    </div>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="btn bg-blue btn-block mb-3"><span class="text-light">Sign in</span></button>
                    <span>
                        New Admin?
                        <a class="color-blue" href="signup.php">create account</a>
                    </span>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
