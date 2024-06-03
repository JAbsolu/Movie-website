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

echo "Environment: $env\n";
echo "Database Host: $dbHost\n";
echo "Database Name: $dbName\n";
echo "Database User: $dbUser\n";
echo "Database Password: $dbPass\n";
