<?php
  error_reporting(E_ALL);
  // ini_set('display_errors', 1);

include "./config.php";

//create connection
$connection = new mysqli($DB_HOST, $DB_USER, $DB_PASS);


//check connection
if ($connection->connect_error) {
  die("connection failed: " . $connection->connect_error);
}

$sql = "SHOW DATABASES LIKE '$DB_NAME'";
$result = $connection->query($sql);
if ($result->num_rows == 0) {
  $sql_querry = "CREATE DATABASE $DB_NAME";
  if ($connection->query($sql_querry) === TRUE) {
    echo "Database $DB_NAME has been created";
  } else {
    echo "Creating Database " . $connection->error;
  }
}
?>