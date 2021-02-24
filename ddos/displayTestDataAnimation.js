//<script>
	// This will animate the webpage to display contents as though network traffic were Realtime. 
	
	function Animate(index) {
		$(document).ready(
			function (){
				ajaxPage();
				function ajaxPage() {
					$.ajax({
						url: "displayTestDataset.php",
						method: "POST",
						//timeout: 50000,
						success: function(data) {
							var result = data.split("unique_char");
							document.getElementById("delayedParagraph").innerHTML = "";  
							for(var i = 0; i < index; i++) {
								document.getElementById("delayedParagraph").innerHTML += result[i] + "<br>";  // there might be some problem here.!!.
							}
						}
					});
				}
			}
		); // end of ready

		if(index < 300)
			setTimeout(Animate, 1000, index + 1); // syntax: (function, delay time, arguments to the function.)	
	}





	function runML() {
		$(document).ready(
			function (){
				ajaxPage();
				function ajaxPage() {
					$.ajax({
						url: "runMLInBackground.php",
						method: "POST",
						success: function(data) {
							// var result = data.split("unique_char");
							// document.getElementById("delayedParagraph").innerHTML = "";  
							// for(var i = 0; i < index; i++) {
							// 	document.getElementById("delayedParagraph").innerHTML += result[i] + "<br>";  // there might be some problem here.!!.
							// }
						}
					});
				}
			}
		); // end of ready
	}
