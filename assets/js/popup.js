
document.addEventListener("DOMContentLoaded", function() {
	 document.getElementById('pop-up-submit').addEventListener('click', capForm, false);
  }, false);

function div_show() {
	document.getElementById('abc').style.display = "block";
	}
	function div_hide(){
	document.getElementById('abc').style.display = "none";
	}
	
function checkInput(content) {
	if(content == ''){
		return false;
	}
	return true;
}

function validDate(text) {
	var dateArray = text.split('/');
	
	if (dateArray.length != 3) {
		return false;
	}
	
	var day = parseInt(dateArray[0]);
	var month = parseInt(dateArray[1]);
	var year = parseInt(dateArray[2]);
	
	if (dateArray[0].length != 2) {
		return false;
	}
	
	if (day < 1 || day > 31) {
		return false;
	}
	
	if (dateArray[1].length != 2) {
		return false;
	}
	
	if (month < 1 || month > 12) {
		return false;
	}
	
	if (dateArray[2].length != 4) {
		return false;
	}
	
	
	
	return true;
}

////////////////////////////////
function isValidPhone(text) {
	if (isNaN(parseInt(text))) {
		return false;
	}
	if(text.length != 10){
		return false;
	}
	
	return true;
}
////////////////////////////////
function isValidEmail(text) {
	return text.match(/[a-z\.\-\_]+@[a-z\.\-\_]+\.[a-z]{2,4}/) ? true : false;
}




function capForm(e) {
	//e.preventDefault();
	var name = document.getElementById('name').value;
	var email = document.getElementById('email').value;
	var phone = document.getElementById('phone').value;
	var data = document.getElementById('date').value;
	var msg = document.getElementById('msg').value

	var validName = checkInput(name);
	var validEmail = checkInput(email);
	var validPhone = checkInput(phone);
	var validData = checkInput(data);

	var resultEmail = isValidEmail(email);
	var resultPhone = isValidPhone(phone);
	var resultData = validDate(data);


	

	if (!validName || !validEmail || !validPhone || !validData){
		e.preventDefault();
		document.getElementById('required').style.display = 'block';
		console.log('v purvata sam');
		}
	
	if(!resultEmail) {
		e.preventDefault();
		document.getElementById('validemail').style.display = 'block';
		console.log('v email sam');
	}
	
	if(!resultPhone) {
		e.preventDefault();
		document.getElementById('validphone').style.display = 'block';
		console.log('v phone sam');
	}
	
	if(!resultData) {
		e.preventDefault();
		document.getElementById('validata').style.display = 'block';
		console.log('v data sam');
	}

	if(resultData && resultPhone && resultEmail && validEmail && validPhone && validData && validData)
		{
		e.preventDefault();
		
		Ajax.request('POST', 'Handler/handlePopUp.php', true, function (response) {
			console.log('response   --->' + response);
			
			data = JSON.parse(response);
			
			if (data == 'sucess' ) {
				
				document.getElementById('reserved').innerHTML = "Reserved";
				document.getElementById('check-reserved').className = "show";
				div_hide();
			}else{
				document.getElementById('reserved').innerHTML = "Error";				
			}
			
		}, {name: name, email: email, phone: phone, data: data, msg: msg});
		
	}
		
		
		
	
	}
	
	
/*	}else {
		document.getElementById('error').className = 'error hidden';
		document.getElementById('username').style.borderColor = '';
		document.getElementById('pass').style.borderColor = '';
		
		Ajax.request('POST', 'Controller/logIn.php', true, function (response) {
			//console.log('response   --->' + response);
			
			data = JSON.parse(response);
			
			if ( !data.validUser) {
				//alert('Wrong password or username');
				document.getElementById('error').className = 'error';
				document.getElementById('error').innerHTML = 'Wrong username or password!';
				document.getElementById('username').style.borderColor = '#DC143C';
				document.getElementById('pass').style.borderColor = '#DC143C';
			}else{
				window.location.href = 'index.php?controller=base&action=showBaseView';
			}
			//console.log(data);	
			
		}, {username: username, pass: pass});
	}
}*/
//Function To Display Popup
