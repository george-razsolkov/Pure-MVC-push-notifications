/**
 * 
 */

document.addEventListener("DOMContentLoaded", function() {
	 document.getElementById('btn-form-change').addEventListener('click', captureForm, false);
  }, false);

function checkInput(content) {
	if(content == ''){
		return false;
	}
	return true;
}


function captureForm(e) {
	var username = document.getElementById('username').value;
	var firstName = document.getElementById('first_name').value;
	var lastName = document.getElementById('last_name').value;
	var email = document.getElementById('email').value;
	var tel = document.getElementById('tel').value;
	
	var boolResultUser = checkInput(username);
	var boolResultFirstName = checkInput(firstName);
	var boolResultLastName = checkInput(lastName);
	var boolResultEmail = checkInput(email);
	var boolResultTel = checkInput(tel);
	
	if (!boolResultFirstName){
		e.preventDefault();
		document.getElementById('error_first_name').className = 'error';
		document.getElementById('first_name').style.borderColor = '#DC143C';
	}else {
		document.getElementById('error_first_name').className = 'error hidden';
		document.getElementById('first_name').style.borderColor = '';
	}
	
	if (!boolResultLastName){
		e.preventDefault();
		document.getElementById('error_last_name').className = 'error';
		document.getElementById('last_name').style.borderColor = '#DC143C';
	}else {
		document.getElementById('error_last_name').className = 'error hidden';
		document.getElementById('last_name').style.borderColor = '';
	}
	
	if (!boolResultUser){
		e.preventDefault();
		document.getElementById('error_username').className = 'error';
		document.getElementById('username').style.borderColor = '#DC143C';
	}else {
		document.getElementById('error_username').className = 'error hidden';
		document.getElementById('username').style.borderColor = '';
	}
	
	if (!boolResultEmail){
		e.preventDefault();
		document.getElementById('error_email').className = 'error';
		document.getElementById('email').style.borderColor = '#DC143C';
	}else {
		document.getElementById('error_email').className = 'error hidden';
		document.getElementById('email').style.borderColor = '';
	}
	
	if (!boolResultTel){
		e.preventDefault();
		document.getElementById('error_tel').className = 'error';
		document.getElementById('tel').style.borderColor = '#DC143C';
	}else {
		document.getElementById('error_tel').className = 'error hidden';
		document.getElementById('tel').style.borderColor = '';
	}
	
	if (boolResultFirstName 
			&& boolResultLastName 
			&& boolResultUser
			&& boolResultEmail 
			&& boolResultTel) {
		document.getElementById('error_first_name').className = 'error hidden';
		document.getElementById('error_last_name').className = 'error hidden';
		document.getElementById('error_username').className = 'error hidden';
		document.getElementById('error_tel').className = 'error hidden';
		document.getElementById('error_email').className = 'error hidden';
		
		Ajax.request('POST', 'Handler/changePersonalInfo.php', true, function (response) {
			
			window.location.href = 'index.php?controller=profile&action=renderSuccessulChange';
			
		}, {username: username, firstName: firstName, lastName: lastName, email: email, tel: tel});
	}
	
}
