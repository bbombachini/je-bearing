// JavaScript Document
(function() {
	"use strict";

	var resultRequest;
	var delBtn = document.querySelectorAll('.delete');
	var search = document.querySelectorAll('.searchfeild');
	var nameLink = document.querySelectorAll('.itemName');

	var Selections = [];
	Selections['tooling'] = new Array();
	Selections['fixture'] = new Array();
	Selections['material'] = new Array();

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

	function showItemResults(e){
		var id = e.currentTarget.id;
		var val = e.currentTarget.value;
		var itemResultDiv = document.querySelectorAll(".itemResult");
		// console.log(val);
		var link = "http://localhost:8000/admin/"+id+'/list/search/'+val;
		// console.log(link);

		if(val !== "") {

			resultRequest = createRequest();
			resultRequest.onreadystatechange = respRequest;
			resultRequest.open("GET", link, true);
			resultRequest.send(val, null);

			function respRequest() {
				if(resultRequest.readyState === 4 || resultRequest.readyState === "complete"){
					var result = document.querySelector('#searchTables [data-id="'+ id +'"]');
					var itemListId = result.dataset.id;

					while(result.firstChild) {
					 result.removeChild(result.firstChild);
					}
					if(resultRequest.response !== 'not-found'){
						let jsonfile = JSON.parse(resultRequest.responseText);
						var itemList = document.querySelector('.listItem [data-id="'+ itemListId +'List"]').children.length;
						let curList = document.querySelectorAll('.listItem [data-id="'+ itemListId +'List"] li');
						// var curList;
						// console.log(curList);
						// console.log('initial');
						// console.log(jsonfile);
						for(let i =0; i< jsonfile.item.length; i++){
							if(itemList > 0){
								// console.log(curList);
								let jsonId = jsonfile.item[i].id;

								for(let j = 0; j< itemList; j++){
									// console.log(curList[j].dataset[itemListId+"Id"]);
									let compare = curList[j].dataset[itemListId+"Id"];
									if(compare != jsonId){
										// print
										result.style.display = "block";
										let newResult = `<li class=${itemListId} data-id=${jsonfile.item[i].id}>${jsonfile.item[i].name}</li>`;
										result.innerHTML += newResult;
									}
									else {
										// console.log("equal ids");
										// //dont print json item name on SEARCH list
										// console.log('full');
										// console.log(jsonfile);
										jsonfile.item.splice(i, 1);
										delete jsonfile.item[i];
										// console.log('spliced ');
										// console.log(jsonfile);
									}
								}
							} else {
								 // console.log("list is empty");
										result.style.display = "block";
										let newResult = `<li class=${itemListId} data-id=${jsonfile.item[i].id}>${jsonfile.item[i].name}</li>`;

										result.innerHTML += newResult;
										// console.log(curList);
								}
						}
						let searchItems = result.querySelectorAll('li');
						for(let i = 0; i < searchItems.length ; i++) {
							searchItems[i].removeEventListener('click', addItem, false);
							searchItems[i].addEventListener('click', addItem, false);
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

					function addItem(e){
						let itemId = e.currentTarget.dataset.id;
						let itemListName = e.currentTarget.innerHTML;
						let itemList = document.querySelector('.listItem [data-id="'+ itemListId +'List"]');
					//Check if it's already on the list before inserting in it
					let filtered = Selections[itemListId].filter(item => item[0] === itemId);
						if (filtered.length > 0) {
							return;
						} else {
							Selections[itemListId].push([itemId,itemListName]);
						}
						printData(itemListId);
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

		function printData(itemListId){
			let itemList = document.querySelector('.listItem [data-id="'+ itemListId +'List"]');
			while(itemList.firstChild){
				itemList.removeChild(itemList.firstChild);
			}

			Selections[itemListId].forEach((unit) => {
				let newListItem = `<li class="selected" data-id=${unit[0]}><p>${unit[1]}</p><span class="popItem">X</span></li>`;
				itemList.innerHTML += newListItem;
			});
			let curList = itemList.querySelectorAll('li');
			for(let k = 0; k < curList.length ; k++) {
				curList[k].removeEventListener('click', removeUnit, false);
				curList[k].addEventListener('click', removeUnit, false);
			}
		}

		function removeUnit(e){
			let removeId = e.currentTarget.dataset.id;
			console.log(removeId); //Undefined because data-fixture-id - removed from the li
			let parent = e.currentTarget.parentNode.dataset.id.slice(0, -4);
			// Selections[parent]
			let index = Selections[parent].findIndex(item => item[0] == removeId);
			if(index > -1) {
				Selections[parent].splice(index,1);
			}
			console.log(index);
			printData(parent);
		}

		function savePart(e) {
			e.preventDefault();
			let url = '/admin/part/store';
			let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
			let name = document.querySelector('input[name="name"]').value;
			let number = document.querySelector('input[name="number"]').value;
			let form = document.querySelector('#addPart');
			let redirect = '/admin/part/list';

			if (Selections['tooling'].length > 0) {
				var tooling = new Array();
				Selections['tooling'].forEach((item) => {
					let id = item[0];
					tooling.push(id);
				});
			}
			if (Selections['fixture'].length > 0) {
				var fixture = new Array();
				Selections['fixture'].forEach((item) => {
					let id = item[0];
					fixture.push(id);
				});
			}
			if (Selections['material'].length > 0) {
				var material = new Array();
				Selections['material'].forEach((item) => {
					let id = item[0];
					material.push(id);
				});
			}

			fetch(url, {
				headers: {
					"Content-Type": "application/json",
	        "Accept": "application/json, text-plain, */*",
	        "X-Requested-With": "XMLHttpRequest",
					'X-CSRF-TOKEN': token
				},
				method: 'post',
				credentials: "same-origin",
				body: JSON.stringify({
					name: name,
					number: number,
					tooling: tooling,
					fixture: fixture,
					material: material
				})
			 })
				 .then((data) => {
					cleanSearch();
					form.reset();
					window.location.href = redirect;
				 })
				 .catch(function(error) {
          console.log(error);
        });
		}

	function cleanSearch(){
		let searchResult = document.querySelectorAll('.itemResult');
		let listItem = document.querySelectorAll('.listItem');

		for (let w = 0; w < 3; w++){
				searchResult[w].innerHTML = null;
				listItem[w].innerHTML = null;
		}
	}

	nameLink.forEach(function(btn, index) {
		btn.addEventListener('click', showView, false);
	});
	delBtn.forEach(function(btn, index) {
	btn.addEventListener('click', changeDeleteUrl, false);
	});


	for(var i = 0; i<search.length; i++){
		search[i].addEventListener('input', showResults, false);
	}

	for(var i = 0; i<searchfeilds.length; i++){
		searchfeilds[i].addEventListener("input", showItemResults,false);
	}
	if(document.querySelector('.next')){
		var nextBtn = document.querySelector('.next');
		nextBtn.addEventListener('click', savePart, false);
	}

	// chooseImageBtn.addEventListener('change', updatePhotoDisplay, false);
})();
