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

$table_name = 'Payment';
$address_table = 'Address';

$sql = "CREATE TABLE $table_name (
  Payment_ID INT AUTO_INCREMENT PRIMARY KEY,
  Payment_type VARCHAR(20),
  Total DECIMAL(15),
  Card_ending_num INT(5),
  Card_exp_month INT(2),
  Card_exp_year INT(4),
  Card_type INT(4),
  Transaction_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Customer_Order_ID INT,
  Gift_card_ID INT,
  Address_ID INT,
  FOREIGN KEY (Customer_Order_ID) REFERENCES Customer_Order (Customer_Order_ID),
  FOREIGN KEY (Gift_card_ID) REFERENCES Gift_Card (Gift_card_ID),
  FOREIGN KEY (Address_ID) REFERENCES Address (Address_ID)
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