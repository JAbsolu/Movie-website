<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// include config, this php file will be called in the dbconnect file
include "config.php";

// establish connection to db
$connection = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

$table_name = 'Customer';

$sql = "CREATE TABLE $table_name (
  Cust_ID INT(6) NOT NULL AUTO_INCREMENT, 
  Username VARCHAR(50) NOT NULL UNIQUE,
  Password VARCHAR(255) NOT NULL,
  Email_address VARCHAR(100) NOT NULL UNIQUE,
  FirstName VARCHAR(50),
  LastName VARCHAR(50),
  Address_ID INT,
  FOREIGN KEY (Address_ID) REFERENCES Address (Address_ID),
  PRIMARY KEY (Cust_ID)
)";

//check if the table already exists
$is_exist = "SELECT COUNT(*) as count 
FROM information_schema.tables 
WHERE table_schema = '$DB_NAME' 
AND table_name = '$table_name'";

$result = $connection->query($is_exist);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if ($row['count'] > 0) {
      echo "Table $table_name exists.<br>";
  } else {
    if ($connection->query($sql) === TRUE) {
      echo "Table $table_name created successfully <br>";
    } else {
      echo "Error creating table: $table_name" . $connection->error . "<br>";
    }
  }
} else {
  echo "Error checking table: " . $connection->error;
}

?>