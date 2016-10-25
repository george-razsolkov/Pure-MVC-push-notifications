<?php
use Dao\PostDao;

require_once '../autoload.php';

session_start();
$currentPostId = $_SESSION['showPostId'];

$reservedValue = PostDao::getReserved($currentPostId);

if($reservedValue['reserved'] == 1) {
	echo json_encode('failure');
}else {
	echo json_encode('allowed');
}
