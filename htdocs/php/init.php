<?php
require '../vendor/autoload.php';

use Elasticsearch\ClientBuilder;

// Database configuration
$servername = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USERNAME') ?: 'paul';
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME') ?: 'app';

// Caphcha configuration
$secretKey = getenv('CAPTCHA_SECRET_KEY');

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set up EasticSearch
$client = ClientBuilder::create()->setHosts(['localhost:9200'])->build();

// Other global settings or functions
function sanitizeInput($data) {
    global $conn;
    return $conn->real_escape_string(trim($data));
}
?>
