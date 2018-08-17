$(document).ready ( function () {
	
	//postar den inmatade gissningen vid knapptryck
    $(document).on ("click", "#submit", function () {
		checkGuess();
    });
	
	//Skapar ett nytt spel vid knapptryck
	$(document).on ("click", "#newGame", function () {
		var player = document.getElementById("newGame").name;
		startGame(player);
	});
});

//Skickar spelarens gissning till servern för kontroll
function checkGuess(){
	var guesses = "";
	
	//Kontrollerar vilka radiobuttons (färger) spelaren valt
	for(i=0;i<4;i++){
		var name = 'guess'+i; //söker efter klassnamn dvs "guess0", "guess1", "guess2" eller "guess3"
		guesses +=document.querySelector('input[name="'+name+'"]:checked').value;
	}
	
	//Skickar gissningen till run.php för rättelse 
    $.ajax({
        url: '../php/run.php',
        type: 'POST',
        data: {
            guesses: guesses,
        },
        success: function(values) {
			var obj = JSON.parse(values);
			//Antalet gissningar hanteras av servern
			if(obj[0]<12){
				drawGuess(guesses, obj);
				//Om man antingen gissat rätt eller använt upp sina gissningar
				if(obj[0]==11 || obj[3]==true){
					endGame(obj);
				}
			}
		}
    });
}

//Ritar ut färgkombinationen spelaren gissat på i tabellen
function drawGuess(guesses, obj) {
    var id = "answer"+obj[0];
	document.getElementById("answer"+obj[0]).innerHTML = obj[1];
	document.getElementById("feedback"+obj[0]).innerHTML = obj[2];
}

//Anropas om spelaren gissat rätt eller spelaren använt alla 12 gissningar utan att gissa rätt
function endGame(obj){
	var msg = "";
	if(obj[3]===true){
		msg = "Du vann!";
	}
	else {
		msg = "Du förlorade";
		//Ritar ut rätt kombination
		//Om man lokalt skulle ändra detta får man inte ut rätt kombination eftersom denna inte skickas från servern
		msg+=obj[4];
	}
	 document.getElementById('result').innerHTML = msg;
}