<?php
$servername = "localhost";
$userserver = "root";
$password = "123456";
$dbname = "instagram";

// Create connection
$conn = new mysqli($servername, $userserver, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>