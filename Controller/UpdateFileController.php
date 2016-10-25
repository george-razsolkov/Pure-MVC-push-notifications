<?php
namespace Controller;

use View\UpdatePostView;
use Dao\PostDao;
use Interfaces\AllPostsTrait;
use View\ErrorView;
use Interfaces\IGetPostCount;



if(!isset($_SESSION)){
	session_start();
}

class UpdateFileController extends PostController implements IGetPostCount
{
	protected $errors;
	protected $postId;
	protected $pictures;
	protected $proceed;
	protected $isEmptyFile;
	protected $isValidFile;
	
	use AllPostsTrait;
	
	public function __construct()
	{
		$this->errors = [];
		$this->postId = isset($_GET['id']) ?  $_GET['id'] : null;
		$this->pictures = [];
		$this->isValidFile = [] ;
		$this->isEmptyFile = false;
		$this->ids = [] ;
		
	}
	
	public function getPictures()
	{
		return $this->pictures;
	}
	
	public function  setPictures($array) {
		$this->pictures = $array;
	}
	
	
	public function getPostId()
	{
		return $this->postId;
	}
	public function setSessionId()
	{
		$_SESSION['postId'] = $this->postId;
	}
	

	
	
	
	public function showUpdate()
	{
		$postId = $this->postId;
		
		$this->getAllIds();
	 	if(!in_array($postId,$this->ids)) {
			$view = new ErrorView();
			$view->render();
			die();
		} 
		
		$resultPost = PostDao::showPost($postId);
		$resultPic = PostDao::showPostPictures($postId);
		
		
		
		
		$titleOld = $resultPost['title_post'];
		$yearOld = $resultPost['year_of_manufacture'];
		$priceOld = $resultPost['price'];
		$descriptionOld = $resultPost['description_post'];
		$brandOld =  $resultPost['brand'];
		$modelOld =  $resultPost['model'];
		$colorOld =  $resultPost['color'];
		$kmOld =  $resultPost['km'];
		$hpOld = $resultPost['hp'];
		$picOld = $resultPic;
		
		
		$view = new UpdatePostView($titleOld, $yearOld, $priceOld, $descriptionOld, 
				$brandOld, $modelOld, $colorOld, $kmOld, $hpOld,$picOld);
		$view->renderUpdatePost();
		$this->setSessionId($this->postId);
		
	
		if(!empty($_POST)) {
		$title = isset($_POST['title']) ? $_POST['title'] : "";
		$year =intval (isset($_POST['year']) ? $_POST['year'] : "");
		$price = doubleval(isset($_POST['price']) ? $_POST['price'] : "" );
		$description = isset($_POST['description']) ? $_POST['description'] : "" ;
		$brand =  isset($_POST['brand']) ? $_POST['brand'] : "" ;
		$model = isset($_POST['model']) ? $_POST['model'] : "" ;
		$color = isset($_POST['color']) ? $_POST['color'] : "" ;
		$km = doubleval( isset($_POST['km']) ? $_POST['km'] : "" );
		$hp = intval( isset($_POST['hp']) ? $_POST['hp'] : "" );
		
		$this->validateFields($title, $year, $price, $description, $brand, $model, $color, $km, $hp);
		$this->validateImages();
		
		
		if(empty($this->errors)){
			$this->setPictures($this->manageFiles());			
		
			PostDao::updatePost($title, $year, $price, $description, $postId, $brand, $model, $color, $km, $hp);
			if(!$this->isEmptyFile && empty($this->isValidFile)) {
			PostDao::addPictures($this->getPictures(), $this->postId);
			}
			
			}
		}
		
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
			$this->errors[11] = 'Price  field must have  numeric value';
		}
	} 
	
	public function validateImages()
	{
		if(isset($_FILES['file'])) {
			$filesCount = count($_FILES['file']['tmp_name']);
			for($i = 0; $i < $filesCount ; $i++)
			{
				$filetype = substr( $_FILES['file']['type'][$i], 0, 6 );
				if($filetype == "") {
					$this->isEmptyFile = true;
				}else {
					$this->isEmptyFile = false;
				}
					
				if($filetype != 'image/') {
					$this->isValidFile[] = "Can upload images only";
					
				}
			}
		}
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
	
	
	
}

