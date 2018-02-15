// JavaScript Document
(function() {
	"use strict";

	// console.log("fired");

	var resultRequest;
	var delBtn = document.querySelectorAll('.delete');
	var search = document.querySelectorAll('.searchfeild');
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
		switch(confirm.id) {
			case 'deleteItem':
				confirm.href = confirm.href.replace(/destroy([\/]*)([0-9]*)/, 'destroy/'+id);
				break;
			case 'deletePhoto':
				confirm.href = confirm.href.replace(/destroyMedia([\/]*)([0-9]*)/, 'destroyMedia/'+id);
				console.log('Delete Photo - id= '+id);
				break;
			default:
				break;
		}
	}


		delBtn.forEach(function(btn, index) {
		btn.addEventListener('click', changeDeleteUrl, false);
	});


	var nameLink = document.querySelectorAll('.itemName');

	function showView(){
		//e.preventDefault();
			// console.log(window.location.href);
			var bodyarea = document.querySelector('body');
			var quickView = document.querySelector('#dim2');
			var close = quickView.querySelector('.xButt');
			var id = this.dataset.id;
			// console.log(id);
			var curUrl = window.location.href.split('/');
			// console.log(curUrl);
			var section = curUrl[curUrl.length - 2];
			var displayRequest = createRequest();
			var url = '/admin/'+section+'/list/'+id;
			// console.log(url);

		function closeView(){
			quickView.style.display = 'none';
			bodyarea.classList.remove('quickview-enabled');
			quickView.style.opacity = 0;
			document.querySelector('#itemImg > img').src = "";
		}

		close.removeEventListener("click", closeView, false);
		close.addEventListener("click", closeView, false);
		document.querySelector('#dimClick').addEventListener("click", closeView, false);

		// console.log(url);
		if(section === 'user') {
			displayRequest.onreadystatechange = respUser;
		}
		else {
			displayRequest.onreadystatechange = respStatus;
		}

		displayRequest.open("GET", url, true);
		displayRequest.send(id, null);

		quickView.style.display = 'block';
		bodyarea.classList.add('quickview-enabled');

		function respStatus() {
			if(displayRequest.readyState === 4 || displayRequest.readyState === "complete"){
				var infoDiv = document.querySelector('#quickView');
				infoDiv.style.display = 'block';

				var jsondoc = JSON.parse(displayRequest.responseText);
				console.log(jsondoc);
				// console.log(jsondoc.section[0].section_name);
				document.querySelector("#itemname").innerHTML = jsondoc.item[0].name;
				document.querySelector("#number").innerHTML = jsondoc.item[0].number;
				document.querySelector("#desc").innerHTML = jsondoc.item[0].desc;
				document.querySelector("#itemImg > img").src = '../../images/'+jsondoc.item.media_path;
				// console.log(infoDiv);
				// console.log(jsondoc);
				infoDiv.querySelector(".confirmEdit").href = '/admin/'+section+'/edit/'+ jsondoc.item[0].id;
				quickView.style.display = 'block';
				// quickView.style.opacity = 1;
				TweenMax.to(quickView, 0.3, {opacity: 1});
			}
		}

		function respUser() {
		  if(displayRequest.readyState === 4 || displayRequest.readyState === "complete"){
		    var infoDiv = document.querySelector('#quickView');
		    infoDiv.style.display = 'block';

		    var jsondoc = JSON.parse(displayRequest.responseText);

		    console.log(jsondoc);
		    document.querySelector("#username").innerHTML = jsondoc.item[0].fname+' '+jsondoc.item[0].lname;
		    document.querySelector("#employee-id").innerHTML = jsondoc.item[0].employee_id;
				let role;
				switch(jsondoc.item[0].role) {
		      case 1:
		        role = 'Administrator';
		        break;
		      case 2:
		        role = 'Supervisor';
		        break;
		      default:
						role = 'Operator'
		        break;
		    }
		    document.querySelector("#user-role").innerHTML = role;
				document.querySelector("#user-email").innerHTML = jsondoc.item[0].email;
				document.querySelector("#user-phone").innerHTML = jsondoc.item[0].phone;

		    document.querySelector("#itemImg > img").src = '../../'+jsondoc.item[0].photo;
		    // console.log(infoDiv);
		    // console.log(jsondoc);
		    infoDiv.querySelector(".confirmEdit").href = '/admin/'+section+'/edit/'+ jsondoc.item[0].id;
		    quickView.style.display = 'block';
		    TweenMax.to(quickView, 0.3, {opacity: 1});
		  }
		}
	}

	var url;

	var searchfeilds = document.querySelectorAll(".itemsearchfeild");

	// function switchSearch(e){
	// 	var id = e.currentTarget.id;
	// 	var str = e.currentTarget.value;
	// 	// console.log(id);
	// 	var url = "http://localhost:8000/admin/"+id+'/list/search/'+str;
	// 	console.log(url);
	// }

	// for(var i = 0; i<searchfeilds.length; i++){
	// 	searchfeilds[i].addEventListener("click", switchSearch,false);
	// }


	function showResults(e){
		var str = e.currentTarget.value;
			// console.log(str);
		var url = window.location.href+'/search/'+str;

		if(str !== "") {

			resultRequest = createRequest();

			// console.log(url);
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
						for(let i =0; i< jsonfile.item.length; i++){
						result.style.display = "block";
						var newDiv = document.createElement("div");
						var newResult = document.createElement("p");
						if(url.indexOf('/admin/user/list/search') !== -1) {
							newResult.innerHTML = jsonfile.item[i].lname+', '+jsonfile.item[i].fname;
						}
						else {
							newResult.innerHTML = jsonfile.item[i].name;
						}
						// newResult.innerHTML = jsonfile.item[i].name;
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


	if(document.querySelector('input#media') !== null){
		var image = {
			chooseImageBtn: document.querySelector('input#media'),
			updatePhotoDisplay() {
				var photo = document.querySelector('.image-hover > img');
				var curFile = image.chooseImageBtn.files;
				// console.log(photo);
				// console.log(curFile);
				photo.src = window.URL.createObjectURL(curFile[0]);
			},
			init(){
				image.chooseImageBtn.addEventListener('change', image.updatePhotoDisplay, false);
			}
		}
		image.init();
	}

	//show new photo preview before saving it
	// function updatePhotoDisplay() {
	// 	var photo = document.querySelector('.image-hover > img');
	// 	var curFile = chooseImageBtn.files;
	// 	// console.log(photo);
	// 	// console.log(curFile);
	// 	photo.src = window.URL.createObjectURL(curFile[0]);
	// }
	//USE EVENT LISTENER TO MAKE XHR OBJECT -- look at Marcos class file

	function showItemResults(e){
		var id = e.currentTarget.id;
		var val = e.currentTarget.value;
		var itemResultDiv = document.querySelectorAll(".itemResult");
		// console.log(id);
		var link = "http://localhost:8000/admin/"+id+'/list/search/'+val;
		console.log(link);

		if(val !== "") {

			resultRequest = createRequest();

			// console.log(url);
			resultRequest.onreadystatechange = respRequest;
			resultRequest.open("GET", link, true);
			resultRequest.send(val, null);

			function respRequest() {
				if(resultRequest.readyState === 4 || resultRequest.readyState === "complete"){
					var result = document.querySelector('#searchTables [data-id="'+ id +'"]');
					// debugger;

					while(result.firstChild) {
					 result.removeChild(result.firstChild);
					}
					if(resultRequest.response !== 'not-found'){
						let jsonfile = JSON.parse(resultRequest.responseText);
						for(let i =0; i< jsonfile.item.length; i++){
						result.style.display = "block";
					// debugger;
						var newDiv = document.createElement("div");
						var newResult = document.createElement("p");
						newResult.innerHTML = jsonfile.item[i].name;
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
			for (let i = 0; i<itemResultDiv.length; i++){
			itemResultDiv[i].style.display = 'none';
			}
		}
	}

	nameLink.forEach(function(btn, index) {
		btn.addEventListener('click', showView, false);
	});
	delBtn.forEach(function(btn, index) {
	btn.addEventListener('click', changeDeleteUrl, false);
	});


	for(var i = 0; i<search.length; i++){
		console.log("hi");
		search[i].addEventListener('input', showResults, false);
	}

	for(var i = 0; i<searchfeilds.length; i++){
		searchfeilds[i].addEventListener("input", showItemResults,false);
	}

	// console.log('hi');
	// chooseImageBtn.addEventListener('change', updatePhotoDisplay, false);
})();
