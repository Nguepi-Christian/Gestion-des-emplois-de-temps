function Show(str) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("div").innerHTML =xmlhttp.responseText;
					}
				};
				xmlhttp.open("GET", "Suggestion.php?q="+str, true);
				xmlhttp.send();
}