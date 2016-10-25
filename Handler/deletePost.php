<?php
namespace Handler;



use Dao\PostDao;

require_once '../autoload.php';

session_start();

$currentPostId = $_SESSION['showPostId'];


$array = PostDao::showPostPictures($currentPostId);

$result = PostDao::deletePost($currentPostId);


if($result) {
	for($i = 0; $i < count($array); $i++ ) 
	{
		unlink("../".$array[$i]['url_pic']);
	}
echo json_encode('sucess');
} else  {
	echo json_encode('failure');
}