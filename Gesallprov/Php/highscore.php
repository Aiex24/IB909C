<?php
header('Content-type: text/html');

//php-fil för att koppla upp sig mot databasen
include "database.php";



//Läser in vilken tabell som ska användas från textfil
$fh = "../Resources/connectionvalues.txt";
$lines = file($fh);//file in to an array
$tableName = trim($lines[4]);
$tableName = explode(":", $tableName);

//Läser in de 12 bästa omgångarna från databasen
$sql = "SELECT * FROM " . $tableName[1] . " ORDER BY Score LIMIT 12";

$result = $conn->query($sql);
$conn->close();


$table = file_get_contents("../Views/highscoreheader.html");;

$tablerow = file_get_contents("../Views/highscorerows.html");

if ($result->num_rows > 0) {
    // Lägger till värdena från databasen till html-koden
     while($row = $result->fetch_assoc()) {
		$table = str_replace('<!--tablecontent-->', $tablerow, $table);
		$table = str_replace('<!--name-->', $row["Name"], $table);
        $table = str_replace('<!--score-->', $row["Score"], $table);

	}
}
		$table = utf8_encode($table); 
		$table = json_encode($table);
		echo $table;
?>