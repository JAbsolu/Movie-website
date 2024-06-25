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

$table_name = 'Merch';

$sql = "CREATE TABLE $table_name (
  Merch_ID INT(6) NOT NULL AUTO_INCREMENT, 
  Merch_name VARCHAR(70),
  Merch_price INT,
  Merch_type INT,
  Stock INT(5),
  Merch_size ENUM('XL', 'L', 'M', 'S', 'XS'),
  Address_Color ENUM('Rd', 'Bl', 'Grn', 'Ylw'),
  PRIMARY KEY (Merch_ID)
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
      echo "Error creating table: $table_name -> " . $connection->error . "<br>";
    }
  }
} else {
  echo "Error checking table: " . $connection->error;
}

?>