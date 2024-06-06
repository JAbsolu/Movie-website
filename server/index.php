<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Accessing environment variables
$env = $_ENV['APP_ENV'];
$dbHost = $_ENV['DB_HOST'];
$dbName = $_ENV['DB_NAME'];
$dbUser = $_ENV['DB_USER'];
$dbPass = $_ENV['DB_PASS'];

//create connection
$connection = new mysqli($dbHost, $dbUser, $dbPass);

//check connection
if ($connection -> connection_error) {
  die("connection faillure: " . $connection -> connection_error);
}

//Create new database
$sql_querry = "CREATE DATABASE $dbName";

if ($connection -> query($sql_querry) === TRUE) {
  echo "Databse $dbName has been created";
} else {
  echo "Error: " . $connection -> error;
}

?>