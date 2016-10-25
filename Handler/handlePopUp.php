<?php
use Model\Reserve;
use Dao\ReserveDao;
use Dao\PostDao;

require_once '../autoload.php';

session_start();
$errors = [];
$currentPostId = $_SESSION['showPostId'];
if(!empty($_POST)) {
	 $name = isset($_POST['name']) ? $_POST['name'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$phone = intval(isset($_POST['phone']) ? $_POST['phone'] : null);
	$data = isset($_POST['data']) ? $_POST['data'] : null;
	$msg = isset($_POST['msg']) ? $_POST['msg'] : null;
	
	if(strlen($name) < 3 || strlen($email) == 0 || strlen($phone) == 0
			|| strlen($data) == 0) {
		$errors[] = "Fields are mandatory";
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Invalid email format";
	}
	
	if(!preg_match("/([0-9]{2}\/[0-9]{2}\/[0-9]{4})/",$data)) {
		$errors[] = "Invalid Data Format";
	}
	
	if(!is_numeric($phone) && strlen($phone) != 9) {
		$errors[] = "Invalid phone";
	}
	
	if(empty($errors)) {
	$reserve = new Reserve($name, $email, $phone, $msg, $data);
	PostDao::updateReserved($currentPostId);
	ReserveDao::addReserve($reserve, $currentPostId); 
	
	echo json_encode('sucess');
	}
	else {
		echo json_encode($errors);
	}
	
}

