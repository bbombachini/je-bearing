// JavaScript Document
(function() {
	"use strict";

	// console.log("fired");
	var displayRequest;
	var resultRequest;
	var delBtn = document.querySelectorAll('.delete');
	var search = document.querySelector('#searchfeild');
	var nameLink = document.querySelectorAll('.itemName');

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

	function show(e){
		//e.preventDefault();
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
				let jsondoc = JSON.parse(displayRequest.responseText);
				document.querySelector("#toolname").innerHTML = jsondoc.tool[0].tool_name;
				document.querySelector("#number").innerHTML = jsondoc.tool[0].tool_number;
				document.querySelector("#desc").innerHTML = jsondoc.tool[0].tool_desc;
			}
		}
	}

	function showResults(e){
		var str = e.currentTarget.value;
		if(str) {
			//console.log(str);
			resultRequest = createRequest();
			var url = '/admin/tooling/list/'+str;
			resultRequest.onreadystatechange = respRequest;
			resultRequest.open("GET", url, true);
			resultRequest.send(str);

			function respRequest() {
				if(resultRequest.readyState === 4 || resultRequest.readyState === "complete"){
					var result = document.querySelector('#result');
					while(result.firstChild) {
			     result.removeChild(result.firstChild);
			    }
					if(resultRequest.response !== 'not-found'){
						let jsondoc = JSON.parse(resultRequest.responseText);
						for(let i =0; i< jsondoc.tool.length; i++){
						result.style.display = "block";
						var newDiv = document.createElement("div");
						var newResult = document.createElement("p");
						newResult.innerHTML = jsondoc.tool[i].tool_name;
						newDiv.appendChild(newResult);
						result.appendChild(newDiv);
						}
					} else {
						result.style.display = "block";
						var newDiv = document.createElement("div");
						var newResult = document.createElement("p");
						newResult.innerHTML = "Result not found";
						newResult.style.color = 'red';
						newDiv.appendChild(newResult);
						result.appendChild(newDiv);
					}
				}
			}
		}
		else {
			result.style.display = 'none';
		}
	}
	//USE EVENT LISTENER TO MAKE XHR OBJECT -- look at Marcos class file
	nameLink.forEach(function(btn, index) {
	btn.addEventListener('click', show, false);
	});
	delBtn.forEach(function(btn, index) {
	btn.addEventListener('click', changeDeleteUrl, false);
	});
	search.addEventListener('keyup', showResults, false);



})();
