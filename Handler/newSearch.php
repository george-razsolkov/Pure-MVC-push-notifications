<?php
require_once '../autoload.php';

if(!isset($_SESSION)){
	session_start();
}

$brand = isset($_POST['brand']) ? $_POST['brand'] : '';
$model = isset($_POST['model']) ? $_POST['model'] : '';
$color = isset($_POST['color']) ? $_POST['color'] : '';
$km = isset($_POST['km']) ? $_POST['km'] : '';
$kmTo = isset($_POST['kmTo']) ? $_POST['kmTo'] : '';
$hp = isset($_POST['hp']) ? $_POST['hp'] : '';
$hpTo = isset($_POST['hpTo']) ? $_POST['hpTo'] : '';
$year = isset($_POST['year']) ? $_POST['year'] : '';
$yearTo = isset($_POST['yearTo']) ? $_POST['yearTo'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$priceTo = isset($_POST['priceTo']) ? $_POST['priceTo'] : '';

$admin = $_SESSION['admin'];

$result = $admin->newSearch($brand, $model, $color, $km, $kmTo, $hp, $hpTo, $year, $yearTo, $price, $priceTo);

//echo $result;
echo json_encode($result);