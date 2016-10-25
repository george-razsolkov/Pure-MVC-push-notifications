<?php
namespace Controller;
if(!isset($_SESSION)){
    session_start();
}

require_once __DIR__ . '/../googleLogin/config.php';
use View\LoginView;
use Model\Admin;
use Model\ValidateCredentials;

class LoginController
{
	public function showLoginForm()
	{
		$view = new LoginView();
		$view->renderLoginForm();	
	}

	public function login()
	{
		
		if (isset($_POST['username']) && isset($_POST['pass'])) {			
			
			$username = $_POST['username'];
			$pass = $_POST['pass'];		
						
			$validate = new ValidateCredentials();
			
			$result = [];
			
			if ( !$validate->validate($username, $pass) ){
				$result['validUser'] = false;
			} else {
				
				$admin = new Admin($username);
				
				if ($admin->checkCredentials($pass) ){
					$_SESSION['admin'] = $admin;
					$result['validUser'] = true;
					
				} else {
					$result['validUser'] = false;
				}				
			}			 
		}
		
		echo json_encode($result);

	}
	
	public function logOut(){
	
		if(isset($_SESSION["user_id"]))
		{
			session_destroy();
// 			unset($_SESSION["user_id"]);
// 			unset($_SESSION);
			header("location:https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(HOST_URL));
		
		}
		else
		{
			session_destroy();
			$this->showLoginForm();
		}
		
	}
	
}