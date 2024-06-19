<?php
// The following 2 codes bellow are for error checking, remove comments to debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    echo "Database $DB_NAME has been created<br><br>";
  } else {
    echo "Creating Database " . $connection->error;
  }
}

include "schema/address.php";
include "schema/location.php";
include "schema/customer.php";
include "schema/cinema.php";
include "schema/employee.php";
include "schema/food.php";
include "schema/gift_card.php";
include "schema/merch.php";
include "schema/movie_room.php";
include "schema/movie.php";
include "schema/order.php";
include "schema/payment.php";
include "schema/reservation.php";
include "schema/role.php";
include "schema/ticket.php";

?>