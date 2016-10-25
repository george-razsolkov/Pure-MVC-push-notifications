<?php
namespace Controller;

session_start();

use Dao\PostDao;

require_once '../autoload.php';

$identifier = intval(isset($_POST['identifier']) ? $_POST['identifier'] : '' );
$postId = $_SESSION['postId'];

$allPostPictures = PostDao::showPostPictures($postId);

if(count($allPostPictures) > 1) {
	
 $pictures = PostDao::getPictureIds($postId);
PostDao::deletePic($identifier, $postId) ;
}else {
	echo json_encode('failure');
}




echo json_encode('sucess');
	
	



