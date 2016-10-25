document.addEventListener("DOMContentLoaded", function() {
	
		var button = document.getElementById('popup');
		button.addEventListener('click', function(e){
			e.preventDefault();
				 Ajax.request('GET', 'Handler/handleReserveValidation.php', true, function (response) {
						
					 console.log('response   --->' + response);
						data= JSON.parse(response);
						
						if(data != 'allowed') {
							alert('It is already reserved.');
						}else {
							document.getElementById('abc').style.display = "block";
						}
						
					});
		 }, false);
  }, false);
