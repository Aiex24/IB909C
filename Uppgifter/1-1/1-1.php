<?php
//Läser in antalet besökare från textfil. Ökar detta med 1, och skriver ut
//svaret på skärmen, och lagrar det nya värdet i samma textfil
header('Content-type: text/plain');
$number = trim(file_get_contents('counttracker.txt'));
$number += 1;
$myfile = fopen("counttracker.txt", "w") or die("Unable to open file!");
fwrite($myfile, $number);
fclose($myfile);
echo $number;
?>  