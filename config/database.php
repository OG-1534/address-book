<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Check if the DB_PASSWORD is set
if (!isset($_ENV['DB_PASSWORD'])) {
    die('DB_PASSWORD is not set.');
}

// Database credentials
$servername = "localhost";
$username = "root";
$password = $_ENV['DB_PASSWORD'];
$dbname = "address_book_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected Successfully";
// Do not close the connection here
?>

