<?php
namespace View;

require 'HeaderAndNavigation.php';

class MakePost
{
	public function render() {
		$loadPage = new HeaderAndNavigation();
		
		$loadPage->renderExternals();
		
		echo '<!-- profile -->
				  <link href="assets/css/makepost.css" rel="stylesheet">
				<!--JS -->
					<script type="text/javascript" src="assets/js/validatePost.js"></script>	
				
				';
		
		$loadPage->renderHeader('admin');
		$loadPage->renderNav();
		
		
		echo "
					<div id='form-div'>
					<form enctype=\"multipart/form-data\" method='post'  action=''>
					<p id='error_title_make' class='error'>This field is required!</p> 
							<label for='title'>Title</label>
						 <input type ='text' name='title' id='title-make'>
						 
						<p id='error_brand' class='error'>This field is required!</p>
								<label for='brand'>Brand</label>
						 <input type ='text' name='brand' id='brand'>
								
						<p id='error_model' class='error'>This field is required!</p> 		
								<label for='model'>Model</label>
						 <input type ='text' name='model' id='model'>
								
						<p id='error_color' class='error'>This field is required!</p> 
						
								<label for='color'>Color</label>
						 <input type ='text' name='color' id='color'>
								
							<p id='error_km' class='error'>This field is required!</p> 	
							<p id='error_km_num' class='error'>Field must be numeric!</p> 	
						
								<label for='km'>Kilometres</label>
						 <input type='text'  name='km'  id='km'>
								
							<p id='error_hp' class='error'>This field is required!</p> 	
							<p id='error_hp_num' class='error'>Field must be numeric!</p> 	
						
								<label for='hp'>Horse Power</label>
						 <input type='text'  name='hp'  id='hp'>
								
								<p id='error_year' class='error'>This field is required!</p> 	
						<p id='error_year_valid' class='error'>Year is not valid</p> 	
							<p id='error_year_num' class='error'>Field must be numeric!</p> 	
						
						 <label for='year'>Year</label>
						 <input type ='text' name='year' id='year'>
						
								<p id='error_price' class='error'>This field is required!</p> 	
							<p id='error_price_num' class='error'>Field must be numeric!</p> 	
						
						  <label for='price'>Price</label>
						 <input type ='text' name='price' id='price'>
								
						  <label for='description'>Description</label>
						 <textarea  name='description' id='description'> </textarea>
				
				
				<p id='error_file' class='error'>Add atleast 1 picture!</p> 	
				<p id='error_file_valid' class='error'>Not valid file!</p> 		 
				
						 	 <label for='Files'>Add Pics</label>
						 <input type=\"file\" name=\"file[]\" id=\"fileField\" multiple=\"multiple\" accept=\"image/*\"/>
							<button id= \"send-button\" type=\"submit\">Send</button>
					
							</form>";
				
		$loadPage->renderAssets();
	}
}