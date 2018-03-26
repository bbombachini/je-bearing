// JavaScript Document
(function() {
	"use strict";

	// Variables **************************************************

	var addImgButt = document.querySelector("#addImgButt");
	var stepImageCon = document.querySelector(".step-image");

	// Functions **************************************************
	function AddStepImage(){

		var imageItem = document.querySelector(".step-image-item");
		var newStepImage = imageItem.cloneNode(true);

		stepImageCon.appendChild(newStepImage);
		console.log('cloned');
	}
	
	// Event Listeners ******************************************

	addImgButt.addEventListener("click", AddStepImage, false);


})();
