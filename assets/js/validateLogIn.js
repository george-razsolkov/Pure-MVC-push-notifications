/**
 * 
 */

document.addEventListener("DOMContentLoaded", function() {
	 document.getElementById('btn-form').addEventListener('click', captureForm, false);
  }, false);

function checkInput(content) {
	if(content == ''){
		return false;
	}
	return true;
}


function captureForm(e) {
	var username = document.getElementById('username').value;
	var pass = document.getElementById('pass').value;
	
	var boolResultUser = checkInput(username);
	var boolResultPass = checkInput(pass);
	
	if (!boolResultUser || !boolResultPass){
		e.preventDefault();
		document.getElementById('error').className = 'error';
		document.getElementById('username').style.borderColor = '#DC143C';
		document.getElementById('pass').style.borderColor = '#DC143C';
		return false;
	}else {
		document.getElementById('error').className = 'error hidden';
		document.getElementById('username').style.borderColor = '';
		document.getElementById('pass').style.borderColor = '';
		
		Ajax.request('POST', 'Handler/logIn.php', true, function (response) {
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
}

