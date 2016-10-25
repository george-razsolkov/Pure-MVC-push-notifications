<?php

namespace View;
use View\HeaderAndNavigation;

require 'HeaderAndNavigation.php';

class ViewPost 
{
	protected $title;
	protected $price;
	protected $description;
	protected $year;
	protected $pictures;
	protected $brand;
	protected $model;
	protected $color;
	protected $km;
	protected $hp;
	protected $reserved;
	protected $for;
	
	public function __construct($title,$price,$description,$year,$brand,$model,$color,$km,$hp,$reserved,$for)
	{
		$this->title = $title;
		$this->price = $price;
		$this->description = $description;
		$this->year = $year;
		$this->pictures = [];
		$this->brand = $brand;
		$this->model = $model;
		$this->color = $color;
		$this->km = $km;
		$this->hp = $hp;
		$this->reserved = $reserved;
		$this->for  = $for;
		
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setPictures($array)
	{
		$this->pictures = $array;
	}
	
	public function renderViewPost()
	{
		
		$loadPage = new HeaderAndNavigation();
		$loadPage->renderExternals();
		
		echo '<!-- profile -->
				  <link href="assets/css/posts.css" rel="stylesheet">
				<link href="assets/css/popUpForm.css" rel="stylesheet">
				<!--JS -->
					<script src="assets/js/popup.js"></script> 	
				<script src="assets/js/reserveValidation.js"></script> 
				<script src="assets/js/deletePost.js"></script> 
				
					<script src="assets/js/ajax.js"></script> ';
		
		
		
		$loadPage->renderHeader('admin');
		$loadPage->renderNav();
		echo '	<div class="post-but-div">
				<a  href="index.php?controller=UpdateFile&action=showUpdate&id='.$_GET['id'] . '"  class="post-but-a" >Update Post</a>
					
						
				</div>
						<button id="delete-button" type="submit" >Delete</button>';
		
		echo '<!-- Body Starts Here -->
					<body id="body" style="overflow:scroll;">
					<div id="abc">
					<!-- Popup Div Starts Here -->
					<div id="popupContact">
					<!-- Contact Us Form -->
					<form action="#" id="form" method="post" name="form">
					<img id="close" src="images/3.png" onclick ="div_hide()">
					<h2>Reserve</h2>
					<hr>
					<p id="required" class="error">All fields are required!</p> 
					<input id="name" name="name" placeholder="Name" type="text">
				
					<p id="validemail" class="error">This is not valid email!</p> 
					<input id="email" name="email" placeholder="Email" type="text">
				
				<p id="validphone" class="error">Enter valid phone in format +08xxxxxxxx</p> 
					<input id="phone" name="phone" placeholder="Phone" type="text">
				
				<p id="validata" class="error">Data format must be dd/mm/yy</p> 
					<input id="date" name="data" placeholder="dd/mm/yy" type="text">
				
					<textarea id="msg" name="message" placeholder="Message"></textarea>
				
					<button type="submit" id="pop-up-submit">Reserve</a>
					</form>
					</div>
					<!-- Popup Div Ends Here -->
					</div>
					<!-- Display Popup Button -->
					<button id="popup" type="submit" >Reserve</button>
					</body>';
		
		echo '
 					<h2 id="delete-sucess" class="">Delete is sucessfull</h2>
				
				        <div id="page-wrapper">
				
				            <div class="container-fluid">
		
								<div class="wraper-post-info">
										<table style="height:300px;" >
										<tr>
											<th colspan="2" text-align="center">
								    	<h2 id="show-post-header">' .htmlentities($this->title, ENT_QUOTES, 'UTF-8') . '</h2>
								    		</th>
								    	</tr>
								    	<tr>
								    			<td>
								    			<h4 class="post-label" >Brand</h4>
								    			</td>
								    			<td>
										<p class ="show-post-content">' . htmlentities($this->brand, ENT_QUOTES, 'UTF-8') . '</p>
												<td>
										</tr>
										<tr>
												<td>
										<h4 class="post-label" >Model</h4>
												</td>
												<td>
										<p class ="show-post-content">' . htmlentities($this->model, ENT_QUOTES, 'UTF-8') . '</p>
												</td>
										<tr>
												<td>
										<h4 class="post-label" >Color</h4>
												</td>
												<td>
										<p class ="show-post-content">' . htmlentities($this->color, ENT_QUOTES, 'UTF-8') . '</p>
												</td>
										</tr>
										<tr>
												<td>
										<h4 class="post-label" >Kilometres</h4>
												</td>
												<td>
										<p class ="show-post-content">' . htmlentities($this->km, ENT_QUOTES, 'UTF-8') . '</p>
												</td>
										</tr>
										<tr>
												<td>
										<h4 class="post-label" >HP</h4>
												</td>
												<td>
										<p class ="show-post-content">' . htmlentities($this->hp, ENT_QUOTES, 'UTF-8') . '</p>
												</td>
										</tr>
										<tr>
												<td>
										<h4 class="post-label" >Year</h4>
												</td>
												<td>
										<p class ="show-post-content">' . htmlentities($this->year, ENT_QUOTES, 'UTF-8') . '</p>
												</td>
										<tr>
												<td>
										<h4 class="post-label" >Price</h4>
												</td>
												<td>
										<p class ="show-post-content">' . htmlentities($this->price, ENT_QUOTES, 'UTF-8') . '</p>
												</td>
										</tr>
												
												<tr>
												
												<td >
										<p id="reserved" class ="show-post-content">' . htmlentities($this->reserved, ENT_QUOTES, 'UTF-8') . '</p>
												</td>
												<td>
												<a id="check-reserved" class="' . htmlentities($this->for, ENT_QUOTES, 'UTF-8') . 
												'" href="index.php?controller=Reservation&action=showReservation&id='.$_GET['id'].'">check</a>
												</td>
										</tr>
												
										</table>
										<h3 id="description" class="post-label" >Description</h3>
										<div id="description-div">
										<p class ="show-post-content">' . htmlentities($this->description, ENT_QUOTES, 'UTF-8') . '</p>
											
										</div>
										
								
											
								</div>
												
												'.$this->renderPictures() .  '
				            </div>
		
				        </div>
												
				        <!-- /#page-wrapper -->';
		
		
		$loadPage->renderAssets();
		
		
		
	
		
	}
// 	public function render($data)
// 	{
// 		$title = $data['postInfo']['title_post'];
// 		$price = $data['postInfo']['price'];
// 		$description = $data['postInfo']['description_post'];
// 		$year = $data['postInfo']['year_of_manufacture'];
		
// 		echo "<h1> Prodavam $title </h1>" . PHP_EOL ;
// 		echo "<p> $year proizvedena  </p> ". PHP_EOL ;
// 		echo "<p> description : $description  </p> ". PHP_EOL ;
// 		echo "<p> CENA: $price  </p> ". PHP_EOL ;
		
		
// 		$count = count($data['pictures']);
		
		
// 		for($i = 0; $i < $count ; $i++)
// 		{
// 			echo "<img src= ' "   . $data['pictures'][$i]['url_pic'] . " '  height ='130' .
// 					width='150' . />" . PHP_EOL;
// 		}
// 	}
	
	public function renderPictures()
	{
		$count =  count($this->pictures);
		echo '<div id="post-pictures">';
		echo '<h3 id="pic-h">Pictures</h6>';
		for($i = 0; $i < $count; $i++ ) {
			echo "<img class=\"post-pics\" src= ' "  . $this->pictures[$i]['url_pic'] . " ' . />" . PHP_EOL;
			
		}
		echo '</div>';
	}
}