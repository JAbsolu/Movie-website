<?php
include "connect/config.php";
// Start the session
session_start();
if(!isset($_SESSION['Username'])){
   header("Location: login.php");
   die();
}

$login_session = $_SESSION['Username'];
$username = $_SESSION['Username'];

// Establish connection
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to prevent SQL injection
$sql = $conn->prepare("SELECT User_first_name, User_last_name FROM User WHERE Username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$result = $sql->get_result();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      $firstname = $row["User_first_name"];
      $lastname = $row["User_last_name"];
      echo "Hello $firstname $lastname welcome to your dashbaord";
    }
} else {
    echo $username;
}

$sql->close();
$conn->close();

?>
