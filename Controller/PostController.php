<?php

namespace Controller;


use Model\Post;
use Dao\PostDao;
use View\MakePost;
/* require '..\Model/Post.php';
require '..\Dao\PostDao.php';
require '..\View\MakePost.php';
 */

require_once 'makePushNotification.php';
class PostController
{
	protected $errors;
	
	public function __construct()
	{
		$this->errors = [];
	}
	public function makePost()
	{
		$view = new MakePost();
		$view->render();
		
		if(!empty($_POST))	{
			$title = isset($_POST['title']) ? $_POST['title'] : "";
			$year = isset($_POST['year']) ? $_POST['year'] : "";
			$price = isset($_POST['price']) ? $_POST['price'] : "";
			$description = isset($_POST['description']) ? $_POST['description'] : "" ;
			$brand =  isset($_POST['brand']) ? $_POST['brand'] : "" ;
			$model = isset($_POST['model']) ? $_POST['model'] : "" ;
			$color = isset($_POST['color']) ? $_POST['color'] : "" ;
			$km = isset($_POST['km']) ? $_POST['km'] : "" ;
			$hp = isset($_POST['hp']) ? $_POST['hp'] : "" ;
			
			$this->validateFields($title, $year, $price, $description, $brand, $model, $color, $km, $hp);
			$this->validateImages();
			
			
			//var_dump($this->errors);
			if(empty($this->errors)){
				
			$post = new Post($title, $year, $price, $description, $brand, $model, $color, $km, $hp);
			$post->setPictures($this->manageFiles());
			
			$resultPost = PostDao::addPost($post);
			$resultPic = PostDao::addPictures($post->getPictures(), $post->getId());
			//send notification funct here
			makePush();
			}
			
		}
	}
	
	
	public function manageFiles()
	{
		if(!is_dir('assets/images')){
			if(!@mkdir('assets/images')) {
				throw new Exception('Cant make directory');
			}
		}
		
		if(isset($_FILES['file'])) {
		$filesCount = count($_FILES['file']['tmp_name']);
		}else {
			$filesCount = 0;
		}
	
		$images = [];
		
		for($i = 0; $i < $filesCount ; $i++)
		{
			$fileName = str_replace(' ' , '_' , $_FILES['file']['name'][$i]);
			$path_parts = pathinfo($_FILES["file"]["name"][$i]);
				
			//$extension = $path_parts['extension'];
			$extension = isset($path_parts['extension']) ? $path_parts['extension'] : null;
				
			$realName = iconv("utf-8","cp1251" ,substr(uniqid(),2,5) . 
					substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 3). "." . 
					$extension) ;
			$ts = time();
		
			$dest =   'assets/images/'.   $realName;
			$images[] = $dest;
			$currentFile =  $_FILES['file']['tmp_name'][$i];
		
			move_uploaded_file($currentFile, $dest);
			
				
			}
	return $images;
	}
	
	public function isEmpty($string)
	{
		if(strlen($string) == 0)
		{
			return true;
		}
		
		return false;
	}
	
	public function validateFields($title, $year, $price, $description, $brand, $model, $color, $km, $hp)
	{
		if($this->isEmpty($title))
		{
			$this->errors[0] = "Title field is mandatory";
		}
		
		if($this->isEmpty($brand))
		{
			$this->errors[1] = "Brand field is mandatory";
		}
		
		if($this->isEmpty($model))
		{
			$this->errors[2] = "Model field is mandatory";
		}
		
		if($this->isEmpty($color))
		{
			$this->errors[3] = "Color field is mandatory";
		}
		
		if($this->isEmpty($km))
		{
			$this->errors[4] = "Field is mandatory";
		}
		
		if($this->isEmpty($hp))
		{
			$this->errors[5] = "Please enter value for Horse Power Field";
		}
		
		if($this->isEmpty($year))
		{
			$this->errors[6] = "Year field is mandatory";
		}
		if($this->isEmpty($price))
		{
			$this->errors[7] = "Price field is mandatory";
		}
		
		if(!is_numeric($year))
		{
			$this->errors[8] = 'Year must be numeric';
		}
		
		if(!is_numeric($km))
		{
			$this->errors[9] = 'Kilometres field must have  numeric value';
		}
		
		if(!is_numeric($hp))
		{
			$this->errors[10] = 'Horse Power field must have  numeric value';
		}
		if(!is_numeric($price))
		{
			$this->errors[11] = 'Price field must have  numeric value';
		}
	}
	
	public function getErrors()
	{
		return $this->errors;
	}
	
	public function validateImages()
	{
		if(isset($_FILES['file'])) {
			$filesCount = count($_FILES['file']['tmp_name']);
			for($i = 0; $i < $filesCount ; $i++)
			{
					
				$filetype = substr( $_FILES['file']['type'][$i], 0, 6 );
					
				if($filetype !== 'image/') {
					$this->errors['images'][] = "Can upload images only";
				}
			}
		}
	}
	
}




