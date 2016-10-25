<?php
namespace Controller;
if(!isset($_SESSION)){
	session_start();
}

use View\DeviceView;
use Dao\DeviceDao;

class DeviceController
{
	public function showUsersInfo(){
 		if(!empty($_SESSION['admin'])){	
			
			$view = new DeviceView();
			$view->renderDevicesView();
						
		} else {
			$view = new LoginController();
			$view->showLoginForm();
		}		
	}
	
	public function getDevices(){
		return DeviceDao::getAllDevices();
	}
}