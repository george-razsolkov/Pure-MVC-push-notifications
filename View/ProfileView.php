<?php 

namespace View;

class ProfileView
{
	private $adminFirstName;
	private $adminLastName;
	private $adminUsername;
	private $adminEmail;
	private $adminTel;
	
	public function __construct($firstName, $lastName, $username, $email, $tel){
		$this->adminFirstName = $firstName;
		$this->adminLastName = $lastName;
		$this->adminUsername = $username;
		$this->adminEmail = $email;
		$this->adminTel = $tel;
	}
	
	public function renderProfileForm(){

		$loadPage = new HeaderAndNavigation();
		$loadPage->renderExternals();
		
		echo '<!-- profile -->
					<link rel="stylesheet" type="text/css" href="assets/css/personalInfo.css" />
				<!--JS -->
					<script type="text/javascript" src="assets/js/ajax.js"></script>
					<script type="text/javascript" src="assets/js/changePersonalInfo.js"></script>
			 ';
		
		$loadPage->renderHeader($this->adminFirstName);
		$loadPage->renderNav();
		
		echo '
				        <div id="page-wrapper">
				
				            <div class="container-fluid">
								
								<div class="wrapper-personal-info">
									<form class="form-personal-info" action="">       
								    	<h2 class="form-personal-info-heading">Personal info</h2>
								    	
										<p id="error_first_name" class="error hidden">This field is required!</p>
								    	<label for="first_name">First Name</label>
										<input type="text" class="form-control-profile" id="first_name" name="first_name"
											value = ' .  htmlentities($this->adminFirstName, ENT_QUOTES, 'UTF-8') . ' /> 
											
										<p id="error_last_name" class="error hidden">This field is required!</p>
										<label for="last_name">Last Name</label>
										<input type="text" class="form-control-profile" id="last_name" name="last_name"
											value = ' .   htmlentities($this->adminLastName, ENT_QUOTES, 'UTF-8') . ' /> 
										
										<p id="error_username" class="error hidden">This field is required!</p>
										<label for="username">Username</label>
										<input type="text" class="form-control-profile" id="username" name="username"
												value = ' .  htmlentities($this->adminUsername, ENT_QUOTES, 'UTF-8') . ' /> 
										
										<p id="error_email" class="error hidden">This field is required!</p>
										<label for="email">Email</label>
										<input type="text" class="form-control-profile" id="email" name="email"
													value = ' .  htmlentities($this->adminEmail, ENT_QUOTES, 'UTF-8') . ' />  
										
										<p id="error_tel" class="error hidden">This field is required!</p>
										<label for="tel">Telephone</label>
										<input type="text" class="form-control-profile" id="tel" name="tel" 
												value = ' .  htmlentities($this->adminTel, ENT_QUOTES, 'UTF-8') . ' />  
										
										<button id="btn-form-change" class="btn btn-lg btn-primary btn-block" type="button">Change</button>   
									</form>
								</div>
				            </div>
				
				        </div>
				        <!-- /#page-wrapper -->';
		
		$loadPage->renderAssets();
	}
	
	public function renderSuccesse(){
		
		$loadPage = new HeaderAndNavigation();
		$loadPage->renderExternals();
		$loadPage->renderHeader($this->adminFirstName);
		$loadPage->renderNav();
		
		echo '<h3 style="padding: 50px;"> Your profile information is successfully changed! </h3>';
		
		$loadPage->renderAssets();
	}
}
