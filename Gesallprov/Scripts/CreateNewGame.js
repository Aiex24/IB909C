//Anropas när en ny spelare skall skapas (skapar en sida för att mata in spelarnamn, varefter ett nytt spel skapas)
function newStartGame(){
	var player = document.getElementById("player").value;
	if(player.length===0 ) {
		alert("Du måste ange ett namn");
	}
	else {
		startGame(player);
	}
}

//Anropas när ett nytt spel skapas (skickar med det lagrade spelarnamnet)
function startGame(player){
		$.ajax({
        url: '../php/startGame.php',
		type: 'POST',	
        data: {
             player: player
        },
        success: function(values) {
			var obj = JSON.parse(values);
			document.getElementById("contentDiv").innerHTML = obj;
		}               
    });
}