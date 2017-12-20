// JavaScript Document
(function() {
	"use strict";

	console.log("fired");
	var displayRequest;
	var delBtn = document.querySelectorAll('.delete');

	function changeDeleteUrl(e) {
		e.preventDefault();
		var id = this.dataset.id;
		var popup = document.querySelector('#dim');
		var confirm = popup.querySelector('.confirmDelete');
		var ignore = popup.querySelector('.ignoreDelete');

		function ignoreDelete(){
		popup.style.display = 'none';
		}

		ignore.removeEventListener("click", ignoreDelete, false);
		ignore.addEventListener("click", ignoreDelete, false);
		document.querySelector('#dimClick2').addEventListener("click", ignoreDelete, false);

		popup.style.display = 'block';
		confirm.href = confirm.href.replace(/destroy([\/]*)([0-9]*)/, 'destroy/'+id);
	}


		delBtn.forEach(function(btn, index) {
		btn.addEventListener('click', changeDeleteUrl, false);
	});


	var nameLink = document.querySelectorAll('.itemName');

	function show(){
		//e.preventDefault();

		var quickView = document.querySelector('#dim2');
		var close = quickView.querySelector('.xButt');

		quickView.style.display = 'block';

		function closeView(){
		quickView.style.display = 'none';
		}

		close.removeEventListener("click", show, false);
		close.addEventListener("click", closeView, false);
		document.querySelector('#dimClick').addEventListener("click", closeView, false);

		var id = this.dataset.id;

		displayRequest = createRequest();
		var url = '/admin/tooling/list/'+id;
		displayRequest.onreadystatechange = respStatus;
		displayRequest.open("GET", url, true);
		displayRequest.send(id);

		function respStatus() {
			if(displayRequest.readyState === 4 || displayRequest.readyState === "complete"){
				var infoDiv = document.querySelector('#quickView');
				quickView.style.display = 'block';

				var jsondoc = JSON.parse(displayRequest.responseText);
				document.querySelector("#toolname").innerHTML = jsondoc.tool[0].tool_name;
				document.querySelector("#number").innerHTML = jsondoc.tool[0].tool_number;
				document.querySelector("#desc").innerHTML = jsondoc.tool[0].tool_desc;
				console.log(infoDiv);
				infoDiv.querySelector(".confirmEdit").href = '/admin/tooling/edit/'+ jsondoc.tool[0].tool_id;

			}
		}

	}
	//USE EVENT LISTENER TO MAKE XHR OBJECT -- look at Marcos class file

	nameLink.forEach(function(btn, index) {
	btn.addEventListener('click', show, false);
	});


})();
