<?php


$dbarray = array();

$fh = fopen("../Resources/connectionvalues.txt", "r");
if ($fh) {
    while (($line = fgets($fh)) !== false) {
		
		$line = explode(":", $line);
		array_push($dbarray, $line[1]);
	}
    fclose($fh);
}

// Skapar ny koppling till databasen

//Tar bort specialtecken (annars matchar inte stringen med databasuppgifterna)
$dbarray = array_map('trim',$dbarray);

$servername = $dbarray[0];
$username = $dbarray[1];
$password = $dbarray[2];
$database = $dbarray[3];



$conn = new mysqli($servername, $username, $password, $database);
// Kontrollerar att uppkoppling mot databasen skedde
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>


