<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include Composer autoloader for environment handling
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Check if the DB_PASSWORD is set in the env variables
if (!isset($_ENV['DB_PASSWORD'])) {
    die('DB_PASSWORD is not set.');
}

// Database credentials details
$servername = "localhost";
$username = "root";
$password = $_ENV['DB_PASSWORD'];
$dbname = "address_book_db";

// Create new connection to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected Successfully";
?>
