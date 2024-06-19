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

$table_name = 'Order';

$sql = "CREATE TABLE $table_name (
  Order_ID INT AUTO_INCREMENT PRIMARY KEY,
  FOREIGN KEY (Customer_ID) REFERENCES Customer_ID,
  FOREIGN KEY (Movie_ID) REFERENCES Movie_ID,
  FOREIGN KEY (Payment_ID) REFERENCES Payment_ID,
  FOREIGN KEY (Gift_Card_ID) REFERENCES Location_ID,
  FOREIGN KEY (Merch_ID) REFERENCES Merch_ID,
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
      echo "Table $table_name created successfully";
    } else {
      echo "Error creating table: " . $connection->error;
    }
  }
} else {
  echo "Error checking table: " . $connection->error;
}

?>