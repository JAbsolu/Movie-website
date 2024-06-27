<?php
include "../connect/config.php";
session_start();

$error= "";

if ($_SERVER['REQUEST_METHOD']) {
  // establish connection
  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Data from form
  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // INSERT INTO ADDRESS
  $sql = "INSERT INTO User (User_first_name, User_last_name, Username, User_email_address, User_password) 
  VALUES ('$first_name', '$last_name', '$username', '$email_address', $password)";

  if (mysqli_query($conn, $sql)) {
      $last_id = $conn->insert_id;
      $success = "Registration successful!";
      header("Location: ../auth/dashboard.php");
      exit();
  } else {
      $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
      // exit();
  }

  // Close the database connection
  mysqli_close($conn);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='script.js' defer></script>
</head>
<body class="bg-dark">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card" style="width: 600px;">
            <div class="card-body">
                <h1 class="card-title text-center text-danger">Error</h1>
                <div class='alert bg-danger'>
                  <span class='closebtn d-block fs-2' onclick='this.parentElement.style.display='none'>&times;</span>
                    <?php echo $error?>
                </div>
                <div class="d-flex justify-content-center">
                  <a href="../auth/dashboard.php" class="text-primary">Return to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>