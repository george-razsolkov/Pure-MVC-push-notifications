<?php
require_once '../autoload.php';
if(!isset($_SESSION)){
	session_start();
}

$admin = $_SESSION['admin'];

$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$tel = isset($_POST['tel']) ? $_POST['tel'] : '';

//set new props to admin
$admin->setFirstName($firstName);
$admin->setLastName($lastName);
$admin->setUsername($username);
$admin->setEmail($email);
$admin->setTelephone($tel);

//change db row
$admin->updateDB($firstName, $lastName, $username, $email, $tel, $admin->getIdAdmin());

// echo json_encode($admin->getUsername());