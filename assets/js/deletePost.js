document.addEventListener("DOMContentLoaded", function() {
	
		var button = document.getElementById('delete-button');
		button.addEventListener('click', function(e){
			e.preventDefault();
			var flag = confirm('Are you sure you want to delete that post?');
			if(flag) {
				 Ajax.request('GET', 'Handler/deletePost.php', true, function (response) {
						
					 console.log('response   --->' + response);
						data= JSON.parse(response);
						
						if(data == 'sucess') {
							document.getElementById('delete-sucess').style.display = "block";
							
							setTimeout(function(){
								 window.location.href = "index.php?controller=ShowAll&action=ShowAll";
								
							}, 800);							
						} else {
							console.log('Not deleted')
						}
				 }); 
			};
		 }, false);
  }, false);
