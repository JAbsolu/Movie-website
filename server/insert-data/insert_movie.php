<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include "../connect/config.php";
session_start();

$error= "";

// Upload images
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if (isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".<br>";
      $uploadOk = 1;
  } else {
      echo "File is not an image.<br>";
      $uploadOk = 0;
  }
 
if (file_exists($target_file)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
}

 
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}

 
$allowedTypes = ["jpg", "png", "jpeg", "gif"];
if (!in_array($imageFileType, $allowedTypes)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}
 
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
 
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }
}

  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Data from form
  $title = mysqli_real_escape_string($conn, $_POST['movieTitle']);
  $genre = mysqli_real_escape_string($conn, $_POST['movieGenre']);
  $released_date = mysqli_real_escape_string($conn, $_POST['releasedDate']);
  $duration = mysqli_real_escape_string($conn, $_POST['movieDuration']);
  $showitme = mysqli_real_escape_string($conn, $_POST['showtime']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $language = mysqli_real_escape_string($conn, $_POST['language']);
  $img = mysqli_real_escape_string($conn, $_POST['fileToUpload']);

  // INSERT INTO ADDRESS
  $sql = "INSERT INTO Movie (Title, Genre, ReleaseDate, Duration, Showtime, Description, Language, ImageURL) 
  VALUES ('$title', '$genre', $released_date, $duration, '$showitme', '$description', '$language', '$img')";

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