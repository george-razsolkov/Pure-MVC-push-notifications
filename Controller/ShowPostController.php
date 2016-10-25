<?php
namespace Controller;

use Dao\PostDao;
use View\ViewPost;
use View\ErrorView;
use Interfaces\IGetPostCount;
use Interfaces\AllPostsTrait;
/* require '..\Dao\PostDao.php';
require '..\View\ViewPost.php';
 */

if(!isset($_SESSION)){
	session_start();
}
class ShowPostController implements IGetPostCount
{
	protected $showPostId;
	
	
	use AllPostsTrait;
	
	public function __construct()
	{
		$this->ids = [];
	}
	
	public function initSessionPostId($id)
	{
		 $this->showPostId = $id;
	}
	public function setSessionPostId()
	{
		$_SESSION['showPostId'] = $this->showPostId;
	}
	
	
	
	public function showPost()
	{
		$postId = isset($_GET['id']) ?  $_GET['id'] : null;
		$this->initSessionPostId($postId);
		$this->setSessionPostId();
		
		
		$this->getAllIds();
		
		if(!in_array($postId,$this->ids)) {
			$view = new ErrorView();
			$view->render();
			die();
		}
		
		//echo $postId;
		$resultPost = PostDao::showPost($postId);
		$resultPic = PostDao::showPostPictures($postId);
		
		$data['postInfo'] = $resultPost;
		$data['pictures'] = $resultPic;
		
		$title = $data['postInfo']['title_post'];
		$price = $data['postInfo']['price'];
		$description = $data['postInfo']['description_post'];
		$year = $data['postInfo']['year_of_manufacture'];
		$brand = $data['postInfo']['brand'];
		$model = $data['postInfo']['model'];
		$color = $data['postInfo']['color'];
		$km = $data['postInfo']['km'];
		$hp = $data['postInfo']['hp'];
		$isReserved = $data['postInfo']['reserved'];
		$reserved = '' ;
		if($isReserved == 0) {
			$reserved = "";
			$for="hidden";
		}else {
			$reserved = "Reserved for" ;
			$for = 'show';
		}
		
		
		$viewPost = new ViewPost($title, $price, $description, $year, $brand, $model, $color, $km, $hp,$reserved,$for);
		$viewPost->setPictures($data['pictures']);
		
		$viewPost->renderViewPost();
		//print_r($data['pictures'][0]['url_pic']);
	}
	
	
}

