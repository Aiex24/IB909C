<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "621Data";

// Skapar ny koppling till databasen
$conn = new mysqli($servername, $username, $password, $database);
// Kontrollerar att uppkoppling mot databasen skedde
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>