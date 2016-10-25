/**
 * 
 */

document.addEventListener("DOMContentLoaded", function() {
	 document.getElementById('btn-search').addEventListener('click', captureForm, false);
  }, false);


function checkInput(content) {
	if(content == ''){
		return false;
	}
	return true;
}

function captureForm(e) {
	var brand = document.getElementById('brand').value;
	var model = document.getElementById('model').value;
	var color = document.getElementById('color').value;
	var km = document.getElementById('km').value;
	var kmTo = document.getElementById('kmTo').value;
	var hp = document.getElementById('hp').value;
	var hpTo = document.getElementById('hpTo').value;
	var year = document.getElementById('year').value;
	var yearTo = document.getElementById('yearTo').value;
	var price = document.getElementById('price').value;
	var priceTo = document.getElementById('priceTo').value;
	
	var boolResultBrand = checkInput(brand);
	var boolResultModel = checkInput(model);
	var boolResultColor = checkInput(color);
	var boolResultKm = checkInput(km);
	var boolResultkmTo = checkInput(kmTo);
	var boolResultHp = checkInput(hp);
	var boolResultHpTo = checkInput(hpTo);
	var boolResultYear = checkInput(year);
	var boolResultYearTo = checkInput(yearTo);
	var boolResultPrice = checkInput(price);
	var boolResultPriceTo = checkInput(priceTo);
	
	if ( !(boolResultBrand || boolResultColor || boolResultModel 
			|| boolResultKm || boolResultkmTo 
			|| boolResultHp || boolResultHpTo
			|| boolResultYear || boolResultYearTo
			|| boolResultPrice || boolResultPriceTo )){	
		console.log('ifa');
		e.preventDefault();
		return false;
	}else {
		console.log('osyshtestvi searcha');
		
		Ajax.request('POST', 'Handler/newSearch.php', true, function (response) {
			//console.log('response   --->' + response);			
			data= JSON.parse(response);			
			console.log(data);	
			
			if (data != 'fail'){
				document.getElementById('error').className = 'error hidden';
				displayCarsInfo(data);
			} else {
				document.getElementById('error').className = 'error';
			}
			
		}, {brand: brand,
				model: model, 
				color: color,
				km: km,
				kmTo: kmTo,
				hp: hp,
				hpTo: hpTo,
				year: year,
				yearTo: yearTo,
				price: price, 
				priceTo: priceTo});
	}
}

function displayCarsInfo(data) {
	var tbody = document.getElementsByTagName('tbody')[0];
	tbody.innerHTML = "";

	for (var i = 0; i < data.length; i++) {
		var noMatch = document.getElementById('no-match');
		noMatch.className = 'error hidden';
		
		var tr = document.createElement('tr');
	
		var tdNumber = document.createElement('td');
		var tdBrand = document.createElement('td');
		var tdModel = document.createElement('td');
		var tdColor = document.createElement('td');
		var tdPrice = document.createElement('td');
		var tdKilometres = document.createElement('td');
		var tdHp = document.createElement('td');
		var tdYear = document.createElement('td');
		var tdlinkToAd = document.createElement('td');
		var a = document.createElement('a');
		
		var idPost =  data[i]['id_post'];
			
		tdNumber.innerHTML = (i+1);
		tdBrand.innerHTML = data[i]['brand'];
		tdModel.innerHTML = data[i]['model'];
		tdColor.innerHTML = data[i]['color'];
		tdPrice.innerHTML = data[i]['price'];
		tdKilometres.innerHTML = data[i]['km'];
		tdHp.innerHTML = data[i]['hp'];
		tdYear.innerHTML = data[i]['year_of_manufacture'];
		
		a.href = 'index.php?controller=ShowPost&action=showPost&id=' + idPost;
		a.className = "fa fa-external-link";
		a.innerHTML = 'Link';
		a.target="_blank";
		
		tdlinkToAd.appendChild(a);
		
		tr.appendChild(tdNumber);
		tr.appendChild(tdBrand);
		tr.appendChild(tdModel);
		tr.appendChild(tdColor);
		tr.appendChild(tdPrice);
		tr.appendChild(tdKilometres);
		tr.appendChild(tdHp);
		tr.appendChild(tdYear);
		tr.appendChild(tdlinkToAd);
		
		tbody.appendChild(tr);
	}
	
	if( data.length == 0) {
		var noMatch = document.getElementById('no-match');
		noMatch.className = 'error';
	
	}
	
}