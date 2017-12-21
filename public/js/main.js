// JavaScript Document
(function() {
	"use strict";

	console.log("fired");

	var resultRequest;
	var delBtn = document.querySelectorAll('.delete');
	var search = document.querySelector('#searchfeild');
	var nameLink = document.querySelectorAll('.itemName');

	function changeDeleteUrl(e) {
		e.preventDefault();
		var id = this.dataset.id;
		var popup = document.querySelector('#dim');
		var confirm = popup.querySelector('.confirmDelete');
		var ignore = popup.querySelector('.ignoreDelete');

		function ignoreDelete(){
		popup.style.display = 'none';
		popup.style.opacity = 0;

		}

		ignore.removeEventListener("click", ignoreDelete, false);
		ignore.addEventListener("click", ignoreDelete, false);
		document.querySelector('#dimClick2').addEventListener("click", ignoreDelete, false);

		popup.style.display = 'block';
		TweenMax.to(popup, 0.3, {opacity: 1});
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
			var id = this.dataset.id;
			// console.log(id);
			var displayRequest = createRequest();
			var url = '/admin/tooling/list/'+id;

		function closeView(){
			quickView.style.display = 'none';
			quickView.style.opacity = 0;
			document.querySelector('#itemImg > img').src = "";
		}

		close.removeEventListener("click", show, false);
		close.addEventListener("click", closeView, false);
		document.querySelector('#dimClick').addEventListener("click", closeView, false);

		console.log(url);
		displayRequest.onreadystatechange = respStatus;
		displayRequest.open("GET", url, true);
		displayRequest.send(id, null);

		function respStatus() {
			if(displayRequest.readyState === 4 || displayRequest.readyState === "complete"){
				var infoDiv = document.querySelector('#quickView');
				infoDiv.style.display = 'block';
				console.log(displayRequest.responseText);
				var jsondoc = JSON.parse(displayRequest.responseText);
				document.querySelector("#toolname").innerHTML = jsondoc.tool[0].tool_name;
				document.querySelector("#number").innerHTML = jsondoc.tool[0].tool_number;
				document.querySelector("#desc").innerHTML = jsondoc.tool[0].tool_desc;
				document.querySelector("#itemImg > img").src = '../../images/' + jsondoc.tool.media_path;
				console.log(jsondoc.tool[0]);
				console.log(infoDiv);
				infoDiv.querySelector(".confirmEdit").href = '/admin/tooling/edit/'+ jsondoc.tool[0].tool_id;
				quickView.style.display = 'block';
				// quickView.style.opacity = 1;
				TweenMax.to(quickView, 0.3, {opacity: 1});
			}
		}
	}

	function showResults(e){
		var str = e.currentTarget.value;
		if(str) {
			// console.log(str);
			resultRequest = createRequest();
			var url = '/admin/tooling/search/'+str;
			resultRequest.onreadystatechange = respRequest;
			resultRequest.open("GET", url, true);
			resultRequest.send(str, null);

			function respRequest() {
				if(resultRequest.readyState === 4 || resultRequest.readyState === "complete"){
					var result = document.querySelector('#result');
					while(result.firstChild) {
					 result.removeChild(result.firstChild);
					}

					if(resultRequest.response !== 'not-found'){
						let jsonfile = JSON.parse(resultRequest.responseText);
						for(let i =0; i< jsonfile.tool.length; i++){
						result.style.display = "block";
						var newDiv = document.createElement("div");
						var newResult = document.createElement("p");
						newResult.innerHTML = jsonfile.tool[i].tool_name;
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
