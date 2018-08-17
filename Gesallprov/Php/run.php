<?php

//Hanterar spellogiken. Kontrollerar spelarens gissning och ger feedback på hur många rätt man fick
//Om man gissat rätt lagras poängen i databasen

header('Content-type: text/html');

session_start(); 
//Sätter session-variablerna och skapar returneringsträngar beroende på inmatning
	$guesses = $_POST['guesses'];
	$guesshtml =  indicatorstring($guesses);

	$turnTemp = $_SESSION["turn"];
	$_SESSION["turn"] += 1;

	$answer = $_SESSION["answer"];
	$rightAnswer = 0;
	$completed = false;

	
$feedbackString = setFeedback($guesses, $answer);
$feedback = indicatorstring($feedbackString);

//Anroper funktion för att skriva resultatet till databasen om man löst färg-kombinationen
if($completed===true){
	include "saveData.php";
}

//Om man använt alla gissningar returneras det rätta värdet
if($completed===true || $turnTemp==11){
	$rightAnswer = quitCheck();
}


//Returnerar resultatet
$values = array((int)$turnTemp, $guesshtml, $feedback, $completed, $rightAnswer);
$js_array = json_encode($values);
echo $js_array;



//-------------------FUNKTIONER-----------------------------


//Tar in en sifferkod och returnerar cirklar i olika färg beroende på siffervärdena som skickades in
//Används för att rita ut spelarens gissning, feedback (svart/vit-cirklar) och svaret ifall
//Spelaren inte lyckades hitta rätt kombination inom 12 drag
function indicatorstring($str) {
	$concatstr = "";
	$indicator = file_get_contents("../Views/indicator.html");
    for($x = 0; $x < strlen($str); $x++){	
		$concatstr .= str_replace('<!--color-->', $str[$x], $indicator);
	}
	return $concatstr;
}

//Skapar html-kod för att indikera hur många rätt man hade
function setFeedback($guesses, $answer){
	$correct = 0;
	$almostCorrect = 0;
	
	//Beräknar antalet rätt färg, oberoende position
	for ($x = 0; $x <= 5; $x++) {
		$GuessCount = substr_count($guesses, $x);
		$AnswerCount = substr_count($answer, $x);
		$almostCorrect = $almostCorrect + min($AnswerCount,$GuessCount);
	}

	$feedback = "";

	//Beräknar antalet rätt färg oberoende position och 
	//Lägger till "6"a som motsvarar vitt i CSSen för varje cirkel som skall skrivas ut i vitt
	for ($x = 0; $x <= 3; $x++) {
		if($answer[$x]==$guesses[$x]){
			$correct++;
			$feedback .="6"; 
		}
	}

	//Beräknar antalet rätt färg men på fel plats
	$almostCorrect = $almostCorrect - $correct;
	
	//Lägger till "7"a som motsvarar svart i CSSen för varje cirkel som skall skrivas ut i svart
	for ($x = 0; $x < $almostCorrect; $x++) {
		$feedback .="7"; //Sätter svart färg
	}
	
	if($correct==4){
		$GLOBALS['completed']=true;
	}
	
	return $feedback;
}

//Kontrollerar om spelet skall avslutas
function quitCheck(){
	$_SESSION["turn"]=12; //Förhindrar fler anrop
	$rightAnswer = $_SESSION["answer"];
	$rightAnswer = indicatorstring($rightAnswer);
	$_SESSION["answer"] = 0;
	return $rightAnswer;
}
?>