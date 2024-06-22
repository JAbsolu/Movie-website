<?php
include "connect/config.php";
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

<div style="position:relative;left:800px;top:400px;border:solid;width:300px;">
    <form action="login.php" method="POST" style="position:relative;left:20px;">
        <p>Please Log in:</p>
        <p>Username <input type="text" name="username"/> </p>
        <p>Password <input type="password" name="password"/> </p>
        <p><input type="submit" value="Log in"/></p>
				<?php echo "<p style='color: red'>$error</p>" ?>
    </form>
</div>
