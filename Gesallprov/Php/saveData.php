<?php

//Fil för att skapa koppling till databasen
include "database.php";


//Läser in vilken tabell som ska användas från textfil
$fh = "../Resources/connectionvalues.txt";
$lines = file($fh);//file in to an array
$table = trim($lines[4]);
$table = explode(":", $table);

//Lagrar värdena i databasen samt förhindrar SQL-injection
$stmt = $conn->prepare("INSERT INTO ".$table[1]." (Name, Score) VALUES (?, ?)");
$stmt->bind_param("si", $name, $score);
$name = strip_tags($_SESSION['name']);
$score = strip_tags($_SESSION['turn']);

$stmt->execute();
$stmt->close();
$conn->close();
?>