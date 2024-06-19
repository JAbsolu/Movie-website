<?php
// The following two lines are for error checking, remove comment to debug the file
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

$table_name = 'Customer_Order';

$sql = "CREATE TABLE $table_name (
  Customer_Order_ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Cust_ID INT,
  MovieID INT,
  Payment_ID INT,
  Gift_card_ID INT,
  Merch_ID INT,
  Address_ID INT,
  Ticket_ID INT,
  FOREIGN KEY (Cust_ID) REFERENCES Customer (Cust_ID),
  FOREIGN KEY (MovieID) REFERENCES Movie (MovieID),
  FOREIGN KEY (Payment_ID) REFERENCES Payment (Payment_ID),
  FOREIGN KEY (Gift_card_ID) REFERENCES Gift_Card (Gift_card_ID),
  FOREIGN KEY (Merch_ID) REFERENCES Merch (Merch_ID),
  FOREIGN KEY (Address_ID) REFERENCES Address (Address_ID),
  FOREIGN KEY (Ticket_ID) REFERENCES Ticket (Ticket_ID)
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
      echo "Error creating table: $table_name --> " . $connection->error . "<br>";
    }
  }
} else {
  echo "Error checking table: " . $connection->error;
}

?>



