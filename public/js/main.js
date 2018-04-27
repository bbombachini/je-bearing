// JavaScript Document
(function() {
	"use strict";

	var resultRequest;
	var delBtn = document.querySelectorAll('.delete');
	var search = document.querySelectorAll('.searchfeild');
	var nameLink = document.querySelectorAll('.itemName');
	var searchfeilds = document.querySelectorAll(".itemsearchfeild");
	var url;

	//Array of arrays created to temporary display and later on save Tooling/Fixture/Materials into a Part.
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

	// Function that calls the quickview modal
	function showView(){
			var bodyarea = document.querySelector('body');
			var quickView = document.querySelector('#dim2');
			var close = quickView.querySelector('.xButt');
			var id = this.dataset.id;
			var curUrl = window.location.href.split('/');
			var section = curUrl[curUrl.length - 2];
			var displayRequest = createRequest();
			var url = '/admin/'+section+'/list/'+id;

		function closeView(){
			quickView.style.display = 'none';
			bodyarea.classList.remove('quickview-enabled');
			quickView.style.opacity = 0;
			document.querySelector('#itemImg > img').src = "";
		}

		close.removeEventListener("click", closeView, false);
		close.addEventListener("click", closeView, false);
		document.querySelector('#dimClick').addEventListener("click", closeView, false);

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
				document.querySelector("#itemname").innerHTML = jsondoc.item[0].name;
				document.querySelector("#number").innerHTML = jsondoc.item[0].number;
				document.querySelector("#desc").innerHTML = jsondoc.item[0].desc;
				document.querySelector("#itemImg > img").src = '../../images/'+jsondoc.item.media_path;
				infoDiv.querySelector(".confirmEdit").href = '/admin/'+section+'/edit/'+ jsondoc.item[0].id;
				quickView.style.display = 'block';
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
		    infoDiv.querySelector(".confirmEdit").href = '/admin/'+section+'/edit/'+ jsondoc.item[0].id;
		    quickView.style.display = 'block';
		    TweenMax.to(quickView, 0.3, {opacity: 1});
		  }
		}
	}

	//Standard live search function
	function showResults(e){
		var str = e.currentTarget.value;
		//If this selector is on screen, search for number field instead of name
		if(document.querySelector('#searchPart')){
			var url = window.location.href+'/search/'+str+'/number';
		} else {
			var url = window.location.href+'/search/'+str;
		}
		//If the field is not empty
		if(str !== "") {
			resultRequest = createRequest();
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
						var newDiv;
						if(url.indexOf('/admin/user/list/search') !== -1) {
							newDiv = `<div><p id="`+jsonfile.item[i].id+`">`+jsonfile.item[i].lname+', '+jsonfile.item[i].fname+`</p></div>`;
						}
						else {
							newDiv = `<div><p class="selectItem" data-id="`+jsonfile.item[i].id+`">`+jsonfile.item[i].name+` - #`+jsonfile.item[i].number+`</p></div>`;
						}
						result.innerHTML += newDiv;
						}
						//Create event listener to quickView -> Not finished/ not working
							let  selectItem = result.querySelectorAll('.selectItem');
							selectItem.forEach((item, index) => {
								if(document.querySelector('#searchPart')){
									//Working but change it to select first result if user do not click on any of the search results
									item.addEventListener('click', selectedItemList, false);
								} else {
									//Not working - do not call the quickView yet
									item.addEventListener('click', showView, false);
								}
							});
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
	//Function runs when you select a Part from livesearch
	function selectedItemList(e){
		let id = e.currentTarget.dataset.id;
		let name = e.currentTarget.innerHTML;
		let searchInput = document.querySelector('#searchPart');
		searchInput.value = name;
		let searchPart = document.querySelector('#nextPart');
		searchPart.href += `/${id}`;
		result.style.display = "none";
	}



	if(document.querySelector('input#media') !== null){
		var image = {
			chooseImageBtn: document.querySelector('input#media'),
			updatePhotoDisplay() {
				var photo = document.querySelector('.image-hover > img');
				var curFile = image.chooseImageBtn.files;
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

	//Dynamic search through tooling/fixtures and materials
	function showItemResults(e){
		var id = e.currentTarget.id;
		var val = e.currentTarget.value;
		var itemResultDiv = document.querySelectorAll(".itemResult");
		var link = "/admin/"+id+'/list/search/'+val;
		if(val !== "") {

			resultRequest = createRequest();
			resultRequest.onreadystatechange = respRequest;
			resultRequest.open("GET", link, true);
			resultRequest.send(val, null);

			function respRequest() {
				if(resultRequest.readyState === 4 || resultRequest.readyState === "complete"){
					//Depending on which input clicked, it will select one of the three sections to look for (Tooling/Fixtures/Materials)
					var result = document.querySelector('#searchTables [data-id="'+ id +'"]');
					var itemListId = result.dataset.id;
					while(result.firstChild) {
					 result.removeChild(result.firstChild);
					}
					if(resultRequest.response !== 'not-found'){
						let jsonfile = JSON.parse(resultRequest.responseText);
						var itemList = document.querySelector('.listItem [data-id="'+ itemListId +'List"]').children.length; //selected result length
						let curList = document.querySelectorAll('.listItem [data-id="'+ itemListId +'List"] li'); //selected result results

						for(let i = 0; i< jsonfile.item.length; i++){
							//TRIAL TO FILTER THROUGH SELECTED ITEMS BEFORE PRINTING THE SEARCH RESULT
							// if(itemList > 0){ // if there's something on selected list
								// let jsonId = jsonfile.item[i].id; //id of the json results

								// curList.forEach((item) => {
								// 	console.log(item.dataset.id);//new id of selected items
								// 	if(item.dataset.id == jsonId){ //compare both ids
								// 		jsonfile.item.splice(i, 1);
								// 		delete jsonfile.item[i];
								// 	}
								// 	else {
								// 		// push to temp array
								// 		tempPrint.push(jsonfile.item[i]);
								// 	}
								// });
								// for(let j = 0; j< itemList; j++){ //selected result length
								// 			let compare = curList[j].dataset.id; // id of the selected items
								// 			// console.log("compare: "+compare);
								// 			// console.log("jsonId: "+jsonId);
								// 			if(compare != jsonId){ //compare both ids
								// 				// push to temp array
								// 				tempPrint.push(jsonfile.item);
								// 				// result.style.display = "block";
								// 				// let newResult = `<li class=${itemListId} data-id=${jsonfile.item[i].id}>${jsonfile.item[i].name}</li>`;
								// 				// result.innerHTML += newResult;
								//
								// 			}
								// 			else {
								// 				jsonfile.item.splice(i, 1);
								// 				delete jsonfile.item[i];
								// 			}
								// }
							result.style.display = "block";
							let newResult = `<li class=${itemListId} data-id=${jsonfile.item[i].id}>${jsonfile.item[i].name}</li>`;
							result.innerHTML += newResult;
							// }
							// else {
							// 	console.log("list is empty");
							// 	result.style.display = "block";
							// 	let newResult = `<li class=${itemListId} data-id=${jsonfile.item[i].id}>${jsonfile.item[i].name}</li>`;
							// 	result.innerHTML += newResult;
							// 	}
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
		//Function to print array of temporary fixtures/toolings/materials when adding a part
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
			let parent = e.currentTarget.parentNode.dataset.id.slice(0, -4);
			let index = Selections[parent].findIndex(item => item[0] == removeId);
			if(index > -1) {
				Selections[parent].splice(index,1);
			}
			printData(parent);
		}

		// Function to populate Tools, Fixture and Material arrays when editing a part
		function populateArrays() {
			let toolingItems = document.querySelectorAll('.listItem.tooling li');
			toolingItems.forEach((item) => {
				let name = item.querySelector('p');
				Selections['tooling'].push([item.dataset.id, name.innerHTML]);
				item.addEventListener('click', removeUnit, false);
			});

			let fixtureItems = document.querySelectorAll('.listItem.fixture li');
			fixtureItems.forEach((item) => {
				let name = item.querySelector('p');
				Selections['fixture'].push([item.dataset.id, name.innerHTML]);
				item.addEventListener('click', removeUnit, false);
			});

			let MaterialItems = document.querySelectorAll('.listItem.material li');
			MaterialItems.forEach((item) => {
				let name = item.querySelector('p');
				Selections['material'].push([item.dataset.id, name.innerHTML]);
				item.addEventListener('click', removeUnit, false);
			});
		}

		//Takes all the three arrays and save into a Part.
		function savePart(e) {
			e.preventDefault();

			var form = document.querySelector('.partForm');
			let url;
			let partId;

			if(form.id === 'addPart') {
				url = '/admin/part/store';
			}
			else if(form.id === 'editPart') {
				let curUrl = location.pathname.split('/');
				partId = curUrl[curUrl.length-1];
				url = '/admin/part/update';
			}

			let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
			let name = document.querySelector('input[name="name"]').value;
			let number = document.querySelector('input[name="number"]').value;
			let category = document.querySelector('select[name="category"]').value;
			let redirect = '/admin/part/add/operation';


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

			if(name != "" && number != "" && category != ""){


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
					id: partId,
					name: name,
					number: number,
					category: category,
					tooling: tooling,
					fixture: fixture,
					material: material
				})
			 })
			 .then((resp) => resp.json())
			 .then((data) => {
				cleanSearch();
				form.reset();
				// debugger;
				window.location.href = redirect + '/' + data.id;
			 })
			 .catch(function(error) {
        console.log(error);
      });
			}
			else {
				// console.log('empty');
				return;
			}
		}

		function saveOperation(e) {
			e.preventDefault();
			let curUrl = location.pathname.split('/');
			let partId = curUrl[curUrl.length-1];
			// debugger;
			let url = '/admin/operation/store';
			let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
			let name = document.querySelector('input[name="name"]').value;
			let photo = document.querySelector('input[name="media"]').files[0];
			// let form = document.querySelector('.addOPer');
			// let redirect = (e.currentTarget.getAttribute('name') === 'continue') ? '/admin/operation/add/step' : '/admin/part/list';

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
					media: photo,
					partId: partId
				})
			 })
			 .then((resp) => resp.json())
				 .then((data) => {
					// console.log(data.id);
					// debugger;
					// cleanSearch();
					// form.reset();
					// console.log(redirect);
					let redirect = (e.currentTarget.getAttribute('name') === 'continue') ? '/admin/operation/add/step/' + data.id: '/admin/part/list';
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

	// // Function to select the progress bar according to the href of the page
	// function activeNav() {
  //   let list = document.querySelector('.progress-bar'),
  //     anchor = list.querySelectorAll('a'),
  //     current = window.location.pathname.split('/')[3];
	// 		if(current == "edit"){
	// 			document.querySelector('#progress-one').classList.add('active');
	// 		}
	// 		else if(current == "add"){
	// 			document.querySelector('#progress-two').classList.add('active');
	// 		}
	// }

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

	//Event Listeners that check first if element is on page
	if(document.querySelector('#editPart')) {
		populateArrays.call();
	}
	if(document.querySelector('#continueButt')){
		var nextBtn = document.querySelector('#continueButt');
		nextBtn.addEventListener('click', savePart, false);
	}
	if(document.querySelector('#searchPart')){
		let searchInput = document.querySelector('#searchPart');
		searchInput.addEventListener('input', showResults, false);
	}
	// if(document.querySelector('.progress-bar')){
	// 	activeNav();
	// }
	// if(document.querySelector('#nextPart')){
	// 	let searchPart = document.querySelector('#nextPart');
	// 	searchPart.addEventListener('click', selectPart, false);
	// }

	// if(document.querySelector('.oper-next')){
	// 	var saveOper = document.querySelectorAll('.oper-next');
	// 	saveOper.forEach((button) => {
	// 		button.addEventListener('click', saveOperation, false);
	// 	});
	// }
})();
