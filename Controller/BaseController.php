<?php
namespace Controller;
if(!isset($_SESSION)){
    session_start();
}

use View\BaseView;

class BaseController
{
	public function showBaseView()
	{
		if(!empty($_SESSION['admin'])){
			$view = new BaseView();
			$view->renderBaseView();
		} else {
			$view = new LoginController();
			$view->showLoginForm();
		}
	}
	
	public function search(){
		echo 'i am in a search method';
		
		if(!empty($_SESSION['admin'])){
			$userSearch = isset($_POST['input-search']) ? $_POST['input-search'] : '';
			
			$admin = $_SESSION['admin'];
			
			$result = $admin->search($userSearch);
			
			var_dump($result);
		} else {
			$view = new LoginController();
			$view->showLoginForm();
		}
	}
}