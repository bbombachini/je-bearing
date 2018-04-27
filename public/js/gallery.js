(function() {
	"use strict";
	// Gallery functionality to be used on steps multiple image feature - to be implemented as well
	//
	//
	var nextbutt = document.querySelector("#nextMediaButt");
	var prevbutt = document.querySelector("#prevMediaButt");

	var imgGallery = document.querySelector('.stepImage');
	var caption = document.querySelector('.stepCap');

	var stepCaptions = ["Caption one", "caption Two", "caption three"];

	// These images are hard coded for now but should be pulled in from the database
	var stepImgs = ['../../images/steptwo.jpg','../../images/stepthree.jpg', '../../images/stepfour.jpg'];
	var i = 0;

	//Functions that sort through the images of the gallery
	function nextImage(){
		i =(i+1);
		imgGallery.src = stepImgs[i];
		caption.innerHTML = stepCaptions[i];

		if(i===stepImgs.length){
			i = 0;
			imgGallery.src = stepImgs[i];
			caption.innerHTML = stepCaptions[i];
		}
	}

	function prevImage(){
		i = (i - 1);
		imgGallery.src = stepImgs[i];
		caption.innerHTML = stepCaptions[i];

		if(i<0) {
			i=stepImgs.length-1;
			imgGallery.src = stepImgs[i];
			caption.innerHTML = stepCaptions[i];
		}
	}

	nextbutt.addEventListener("click", nextImage, false);
	prevbutt.addEventListener("click", prevImage, false);


})();
