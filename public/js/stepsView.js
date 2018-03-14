// JavaScript Document
(function() {
	"use strict";

	
	// Variables **************************************************

	var operationLinks = document.querySelectorAll('.opItem'),
	    operationHeader = document.querySelectorAll('.opItem > .opInfo'),
	    operationP = document.querySelectorAll('.opInfo > p');

	var itemLinks = document.querySelectorAll('.itemBarItem'),
		library = document.querySelector("#itemLibraryCon"),
	 	closeButt = document.querySelector("#xButt"),
	 	libraryHeaderH3 = document.querySelector("#libraryHeader h3");

	var pageCon = document.querySelector('#stepContent'),
		toolBar = document.querySelector('#itemBar');


	// Functions **************************************************

	function checkScroll(){
		var windowScroll = window.scrollY,
			height = pageCon.clientHeight;

			// console.log(height);
			console.log(window.scrollY);
		
		if (windowScroll > 170) {
			toolBar.classList.add('itemBarFixed');
			console.log("Stick");
		}else{
			toolBar.classList.remove('itemBarFixed');
			console.log("not yet");
		}
	}

	function openOperation(e){

		var opSingle = e.currentTarget.dataset.id;
		// console.log(opSingle);

		var opInfo = document.querySelector(".opItem [data-id='"+ opSingle +"']");
		var clicked = e.currentTarget.dataset.id;
		var clicked = clicked.slice(2,3);
		var clicked = "#opInfo"+clicked;
		var p = document.querySelectorAll(clicked);

		if(opInfo.style.display == "none"){

			opInfo.style.display = "block";
			this.firstChild.nextSibling.style.backgroundColor = "#009B60";
			p[0].classList.add("whiteText");

		}else{
			opInfo.style.display = "none";
			this.firstChild.nextSibling.style.backgroundColor = "#FFF";
			p[0].classList.remove("whiteText");
		}

	}

	function openLibrary(e){
		// console.log("open");
		library.style.display = "block";
		libraryHeaderH3.innerHTML = e.currentTarget.id + " For Part Number #123";

	}

	function closeLibrary(){
		// console.log("close");
		library.style.display = "none";
	}

	// Event Listeners ******************************************

	for(var i=0; i<operationLinks.length; i++){
		operationLinks[i].addEventListener("click", openOperation, false);
	}

	for(var i=0; i<itemLinks.length; i++){
		itemLinks[i].addEventListener("click", openLibrary, false);
	}

	closeButt.addEventListener("click", closeLibrary, false);

	window.addEventListener("scroll", checkScroll, false);
	window.addEventListener("onload", checkScroll, false);


})();
