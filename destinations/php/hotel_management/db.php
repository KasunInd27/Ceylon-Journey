<?php
$servername = "localhost";
$username = "root"; // Adjust based on your MySQL setup
$password = ""; // Adjust based on your MySQL setup
$dbname = "hotel_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
