//När html-koden laddats klart anropas home-sidan som default
$(document).ready(function() {
	functionName("home");
});

//Anropar php-filen vars namn skickas in. php-filerna returnerar html-kod som appliceras till en div
function functionName(fileName){
	var link = '../php/'+fileName+'.php'
	$.ajax({
        url: link,
        success: function(value) {
			var obj = JSON.parse(value);
			document.getElementById("contentDiv").innerHTML = obj;
		}           
	});
}
