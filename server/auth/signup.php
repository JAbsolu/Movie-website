<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Movie Theater Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../client/styles/style.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
        <h3 class="fw-bold color-blue mb-3">Flakes</h3>
        <div class="card" style="width: 400px;">
            <div class="card-body">
                <h3 class="card-title text-center">Create Account</h3>
                <form action="signup.php" method="POST" onsubmit="return validatePasswords()">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter your first name" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter your last name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Choose a username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Choose a password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm password" required>
                    </div>
                    <div id="passwordError" class="text-danger mt-0 pt-0 mb-2"></div>
                    <button type="submit" class="btn btn-primary btn-block mb-3">Create Account</button>
                    <span>
                        Already have an account?
                        <a class="color-blue" href="login.php">Sign in</a>
                    </span>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function validatePasswords() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                document.getElementById("passwordError").innerText = "Passwords do not match";
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

<?php
include "../connect/config.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create a database connection
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $$conn->connect_error);
    }

    // Get the form data and escape them
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if the username already exists
    $sql = "SELECT * FROM User WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $error = "Username already exists, please choose another one.";
        header("Location: signup.php?error=" . urlencode($error));
        exit();
    } else {
        // Insert the new user into the database
        $sql = "INSERT INTO User (User_first_name, User_last_name, Username, User_email_address, User_password) 
                VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            $success = "Registration successful!";
            header("Location: login.php");
            exit();
        } else {
            $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
            header("Location: signup.php?error=" . urlencode($error));
            exit();
        }
    }

    // Close the database connection
    $conn->close();
}
?>
