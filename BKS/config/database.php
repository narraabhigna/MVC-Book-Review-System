<?php

// Load the Dotenv library
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Database configuration
$db_server = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_NAME'];
global $connection;
$connection = null;

try {
    // Establish database connection
    $connection = mysqli_connect($db_server, $username, $password, $db_name);
    if (!$connection) {
        throw new Exception("Could not connect to database.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>



