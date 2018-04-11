(function() {
	"use strict";

	var nextbutt = document.querySelector("#nextMediaButt");
	var prevbutt = document.querySelector("#prevMediaButt");

	var imgGallery = document.querySelector('.stepImage');
	var caption = document.querySelector('.stepCap');
	console.log(caption);

	var stepCaptions = ["Caption one", "caption Two", "caption three"];
	var stepImgs = ['../../images/steptwo.jpg','../../images/stepthree.jpg', '../../images/stepfour.jpg'];
	console.log(imgGallery.src);
	var i = 0;


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

		console.log(i);

		if(i<0) {
			i=stepImgs.length-1;
			imgGallery.src = stepImgs[i];
			caption.innerHTML = stepCaptions[i];

		}

	}

	nextbutt.addEventListener("click", nextImage, false);
	prevbutt.addEventListener("click", prevImage, false);


})();
