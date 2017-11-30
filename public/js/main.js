// JavaScript Document
(function() {
	"use strict";

	console.log("fired");


	var img =  document.querySelectorAll("#adminNav a");
	//console.log(img);

	for(var i=0; i<img.length; i++){
		img[i].addEventListener("click", changeColor, false);
	}

	function changeColor(e){
		console.log("clcik");

	}

 

	

})();
