// JavaScript Document
(function() {
	"use strict";

	console.log("fired");

	var delBtn = document.querySelectorAll('.delete');

	function changeDeleteUrl(e) {
		e.preventDefault();
		var id = this.dataset.id;
		var popup = document.querySelector('#confirm');
		var confirm = popup.querySelector('.confirmDelete');
		var ignore = popup.querySelector('.ignoreDelete');

		function ignoreDelete(){
		popup.style.display = 'none';
		}

		ignore.removeEventListener("click", ignoreDelete, false);
		ignore.addEventListener("click", ignoreDelete, false);

		popup.style.display = 'block';
		confirm.href = confirm.href.replace(/destroy([\/]*)([0-9]*)/, 'destroy/'+id);
	}


		delBtn.forEach(function(btn, index) {
		btn.addEventListener('click', changeDeleteUrl, false);
	});


	var nameLink = document.querySelectorAll('.itemName');

	function show(e){
		//e.preventDefault();
		var id = this.dataset.id;
		var infoDiv = document.querySelector('#quickView');
		console.log(id);
		quickView.style.display = 'block';

		//console.log("hi")

	}
	//USE EVENT LISTENER TO MAKE XHR OBJECT -- look at Marcos class file 
	nameLink.forEach(function(btn, index) {
	btn.addEventListener('click', show, false);
	});


})();
