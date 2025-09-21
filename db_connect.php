<?php
// db.php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$servername = "localhost";     // Usually localhost
$username = "root";       // Your MySQL username
$password = "";
$database= "event_db";            // Your MySQL password

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>
