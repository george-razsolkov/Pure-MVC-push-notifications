<?php
namespace View;

class LoginView
{	
	public function renderLoginForm()
	{
		echo "<!DOCTYPE html>
				<html>
					<head>
					<meta charset=\"UTF-8\">
					<title>Log In</title>
					
					<link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/reset.css\" />
					<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
					<link href=\"assets/node_modules/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
				
					<link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/logIn.css\" />
					
					<script type=\"text/javascript\" src=\"assets/js/ajax.js\"></script>	
					<script type=\"text/javascript\" src=\"assets/js/validateLogIn.js\"></script>
					
					</head>
					<body>
					
						<div class=\"wrapper\">
							<form class=\"form-signin\" action=\"\" />       
						    	<h2 class=\"form-signin-heading\">Please login</h2>
						    	
						    	<p id=\"error\" class=\"error hidden\">All fields are required!</p>
								<input type=\"text\" class=\"form-control\" id=\"username\" name=\"username\" placeholder=\"Username\" required autofocus />
								<input type=\"password\" class=\"form-control\" id=\"pass\" name=\"password\" placeholder=\"Password\" required />    
								
								<button id=\"btn-form\" class=\"btn btn-lg btn-primary btn-block\" type=\"button\">Login</button> 
				
								<button id=\"btn-form-google\" class=\"btn btn-lg btn-primary btn-block\" type=\"button\" style=\"background-color:rgb(197,57,41); border-color: rgb(197,57,41);\">
									<a href=\"googleLogin/login.php\" class=\"fa fa-google-plus\" style=\"color:white;\"> Login with Google</a>
								</button>
				
							</form>
						</div>
						
					</body>
				</html>";
	}
}