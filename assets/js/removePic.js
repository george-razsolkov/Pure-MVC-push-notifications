

document.addEventListener("DOMContentLoaded", function() {
	var picArray = document.getElementsByTagName('img');
	
	for(i = 0; i < picArray.length;i++) {
		var pic = picArray[i];
		pic.addEventListener('click', function(e){
			e.preventDefault();
			
			 var identifier = e.target.id;
			 var flag = confirm('Are you sure you want to delete the picture?');
			 
			 console.log(identifier);
			 if (typeof(identifier) != "undefined" && flag){
				
				 Ajax.request('POST', 'Handler/handleAjaxRequst.php', true, function (response) {
						
					 console.log('response   --->' + response);
						data= JSON.parse(response);
						
						if(data == 'sucess') {
							document.getElementById(identifier).style.display = "none";
						}
						
						console.log(data);	
						
						
						
					}, {identifier: identifier});
				 
			 }
			
			 
			 
		 }, false);
	}
	
  }, false);


/*function checkInput(content) {
	if(content == ''){
		return false;
	}
	return true;
}


function captureForm(e) {
	var input = document.getElementById('input-search').value;
	
	var boolResultInput = checkInput(input);
	
	if (!boolResultInput){		
		e.preventDefault();
		return false;
	}else {
		console.log('osyshtestvi searcha');
		
		Ajax.request('POST', 'Controller/search.php', true, function (response) {
			console.log('response   --->' + response);
			
			//data = JSON.stringify(response);
			data= JSON.parse(response);
			
			console.log(data);	
			
			document.getElementById('result-search').innerHTML = data;
			
		}, {input: input});
	}
}*/