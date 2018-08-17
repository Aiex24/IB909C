<?php
// Skapar upp vyn för att kunna spela

session_start(); 


$answer = "";

//Slumpar fram kombinationen användaren skall försöka gissa sig till
for ($x = 0; $x <= 3; $x++) {
	$answer=$answer.(rand(0,5));
}

//Lagrar värden i sessions-variabler
$_SESSION["answer"] = $answer;
$_SESSION["turn"] = 0;
$_SESSION["name"] = $_POST['player'];

header('Content-type: text/html');

//Skapar knappar och en tabell som utgör spelplanen
$gameboardhtml = file_get_contents("../Views/gameboard.html");
$gameboardhtml = str_replace('<!--name-->', $_SESSION["name"], $gameboardhtml);

//Laddar in html för att skapa tabell-rader
$gametablehtml = file_get_contents("../Views/gametable.html");

//Laddar in html för att skapa radiobuttons som utgör gissningsval
$guesseshtml = file_get_contents("../Views/guesses.html");
$concatgametable = "";

//Skapar celler i tabellen och tilldelar unika IDn
for ($x = 0; $x <= 11; $x++) {
	$concatgametable = $concatgametable . str_replace('<!--answer-->', "answer".$x, $gametablehtml);
    $concatgametable = str_replace('<!--feedback-->', "feedback".$x, $concatgametable);
} 

//Skapar unika IDn för radiobuttons som utgör gissningarna
$concathtml = "";
for ($x = 0; $x <= 3; $x++) {
	$concathtml = $concathtml . str_replace('<!--name-->', "guess".$x, $guesseshtml);
} 

//Lägger till den genererade htmlen till den html som senare skall skickas till huvudvyn
$concatgametable = str_replace('<!--feedback-->', $concatgametable, $gameboardhtml);
$concatgametable  = str_replace('<!--newgame-->', $concathtml, $concatgametable);

//Gör om htmlen till ett json-objekt för att skicka tillbaks till scriptfilen
$concatgametable = json_encode($concatgametable);

echo $concatgametable;
?>