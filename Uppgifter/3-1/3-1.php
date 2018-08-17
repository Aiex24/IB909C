<?php

//Läser in antalet gånger sidan har besökts från fil, ökar med 1
//och lagrar nya värdet i filen
$hits = trim(file_get_contents('counttracker.txt'));
$hits += 1;
$myfile = fopen("counttracker.txt", "w") or die("Unable to open file!");
fwrite($myfile, $hits);
fclose($myfile);

//Ersätter tempstring med siffervärdet
$html = file_get_contents("3-1.html");
$html = str_replace('---$hits---', $hits, $html);

//Skriver ut html-elementen
echo $html;
?>