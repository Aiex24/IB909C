<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "kalleanka";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


//Lagrar värdena i databasen samt förhindrar SQL-injection
$stmt = $conn->prepare("INSERT INTO usercomments (Time, Sender, Website, Email, Comment) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $currentDate, $sender, $page, $mail, $text);
$currentDate = date('Y-m-d');
$sender = strip_tags($_POST["name"]);
$page = strip_tags($_POST["homepage"]);
$mail = strip_tags($_POST["email"]);
$text  = strip_tags($_POST["comment"]); 

$stmt->execute();

$stmt->close();
$conn->close();

include "6-2-1.php";
?>