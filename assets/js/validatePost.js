/**
 * 
 */

document.addEventListener("DOMContentLoaded", function() {
	 document.getElementById('send-button').addEventListener('click', captureForm, false);
  }, false);

function checkInput(content) {
	if(content == ''){
		return false;
	}
	return true;
}

function allowNumberOnly(string){
	
	var toNum = parseFloat(string);
	
	
	if(!isNaN(string)) {
		return true;
	}else{
		return false;
	}
}

function isEmptyFile(imgValue) {
	if(imgValue == '') {
		return false;
	}
	return true;
}

function isEmptyArray(array) {
	if(array.length == 0) {
		return false;
	}
	
	return true;
}
function captureForm(e) {
	
	var title = document.getElementById('title-make').value;
	var brand = document.getElementById('brand').value;
	var model = document.getElementById('model').value;
	var color = document.getElementById('color').value;
	var km = document.getElementById('km').value;
	var hp = document.getElementById('hp').value;
	var year = document.getElementById('year').value;
	var price = document.getElementById('price').value;
	var files = document.getElementById("fileField").files;

	

	var resultTitle = checkInput(title);
	var resultBrand = checkInput(brand);
	var resultModel = checkInput(model);
	var resultColor = checkInput(color);
	var resultKm = checkInput(km);
	var resultHp = checkInput(hp);
	var resultYear = checkInput(year);
	var resultPrice = checkInput(price);


	var isNumKm = allowNumberOnly(km);
	var isNumPrice  = allowNumberOnly(price);
	var isNumYear = allowNumberOnly(year);
	var isNumHp = allowNumberOnly(hp);
	var resultFileContent = isEmptyArray(files);

	
	var data = new Date();
	var currentYear = data.getFullYear();
	
	var isValidYear = true;

	if(year > currentYear || year < 1930)
		{
		e.preventDefault();
		document.getElementById('error_year_valid').style.display = "block";
		document.getElementById('year').style.borderColor = '#DC143C';
		
		isValidYear = false;
		}
	

	
	if (!resultTitle){
		e.preventDefault();
		document.getElementById('error_title_make').style.display = "block";
		document.getElementById('title-make').style.borderColor = '#DC143C';
	}
	
	if (!resultBrand){
		e.preventDefault();
		document.getElementById('error_brand').style.display = "block";
		document.getElementById('brand').style.borderColor = '#DC143C';

	}
	
	if (!resultModel){
		e.preventDefault();

		document.getElementById('error_model').style.display = "block";
		document.getElementById('model').style.borderColor = '#DC143C';
	}
	
	if (!resultColor){
		e.preventDefault();
		document.getElementById('error_color').style.display = "block";
		document.getElementById('color').style.borderColor = '#DC143C';
	}
	
	if (!resultKm){
		e.preventDefault();
		document.getElementById('error_km').style.display = "block";
		document.getElementById('km').style.borderColor = '#DC143C';
	}
	
	if (!resultHp){
		e.preventDefault();
		document.getElementById('error_hp').style.display = "block";
		document.getElementById('hp').style.borderColor = '#DC143C';
	}
	
	if (!resultYear){
		e.preventDefault();
		document.getElementById('error_year').style.display = "block";
		document.getElementById('year').style.borderColor = '#DC143C';
	}
	
	if (!resultPrice){
		e.preventDefault();
		document.getElementById('error_price').style.display = "block";
		document.getElementById('price').style.borderColor = '#DC143C';
	}
	
	if(!isNumKm) {
		e.preventDefault();
		document.getElementById('error_km_num').style.display = "block";
		document.getElementById('km').style.borderColor = '#DC143C';
	}
	
	if(!isNumHp) {
		e.preventDefault();
		document.getElementById('error_hp_num').style.display = "block";
		document.getElementById('hp').style.borderColor = '#DC143C';
	}
	
	if(!isNumYear) {
		e.preventDefault();
		document.getElementById('error_year_num').style.display = "block";
		document.getElementById('year').style.borderColor = '#DC143C';
	}
	
	if(!isNumPrice) {
		e.preventDefault();
		document.getElementById('error_price_num').style.display = "block";
		document.getElementById('price').style.borderColor = '#DC143C';
	}
	

	if(!resultFileContent) {
		e.preventDefault();
		document.getElementById('error_file').style.display = "block";
		document.getElementById('fileField').style.borderColor = '#DC143C';
	}
	var validUpload = [];
	for (var i = 0; i < files.length; i++){
		var type = files[i].type;
		var res = type.substr(0, 5);
		console.log(res);
	   if(res != 'image') {
		   validUpload[0] = "CANT";
	   }
	}	
	
	console.log(validUpload.length);
	console.log(files.length);
	
	if(files.length != 0 ) {
		console.log('iam duljina');
		if(validUpload.length !== 0){
			console.log('ne sam validen');
			e.preventDefault();
			document.getElementById('error_file_valid').style.display = "block";
		}
	}
	
	
	
	if(isNumPrice && isNumYear && isNumHp &&isNumKm && resultPrice &&  resultYear &&  resultHp &&  resultKm && 
			resultBrand && resultTitle && resultModel && resultColor && isValidYear && resultFileContent 
			&& validUpload.length == 0) {
	

		//document.getElementById('suc').style.display = "block";
	}
}
	