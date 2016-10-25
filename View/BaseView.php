<?php 
namespace View;

class BaseView
{
	public function renderBaseView(){

		$loadPage = new HeaderAndNavigation();
		$loadPage->renderExternals();
		
		echo '<!-- Custom CSS -->
					<link href="assets/css/newSearch.css" rel="stylesheet">
				<!-- AJAX -->
 				    <script type="text/javascript" src="assets/js/ajax.js"></script>
				<!-- Custom JS -->
 				    <script type="text/javascript" src="assets/js/newSearch.js"></script>
			  ';
		
		//TODO admin name
		$loadPage->renderHeader('Petyr');
		$loadPage->renderNav();
		
		echo ' <div id="page-wrapper">
				
				            <div class="container-fluid">
								<h3>Search</h3>
				
								<div id="newSearch">
								
									<form id="f" method="post" action="">				
										
										<p id="error" class="error hidden">Invalid parameters. Please, check your input.</p>
										<label for="brand">Brand</label>
								 		<input type ="text" name="brand" id="brand" />									
								
										<label for="model">Model</label>
								 		<input type ="text" name="model" id="model" />
								
										<label for="color">Color</label>
										<input type ="text" name="color" id="color" />									
								
										<label for="km">Kilometres</label>
								 		<input type="text"  name="km"  id="km"  class="from-to" placeholder="from" />
										<input type="text"  name="km"  id="kmTo"  class="from-to" placeholder="to" />
								
										<label for="hp">Horse Power</label>
								 		<input type="text"  name="hp"  id="hp"  class="from-to" placeholder="from" />									
										<input type="text"  name="hp"  id="hpTo"  class="from-to" placeholder="to" />	
					
										<label for="year">Year</label>
										<input type ="text" name="year" id="year"  class="from-to" placeholder="from" />	
										<input type ="text" name="year" id="yearTo"  class="from-to" placeholder="to" />	
										
										<label for="price">Price</label>
										<input type ="text" name="price" id="price"  class="from-to" placeholder="from" />
										<input type ="text" name="price" id="priceTo"  class="from-to" placeholder="to" />
					
										<button type="button" id="btn-search" class="btn btn-primary fa fa-search">Search</button>
									</form>
				
								</div>				
				            </div>
				
							<div class="col-lg-6">
			                       <h3>Cars</h3>
			                       <div class="table-responsive">
			                            <table  id="result-search" class="table table-bordered table-hover table-striped">
			                                <thead>
			                                   <tr>
												<th>#</th>
			                                    <th>Brand</th>                                        
			                                    <th>Model</th>
												<th>Color</th>                                        
			                                    <th>Price</th>
												<th>Kilometres</th>                                        
			                                    <th>Hourse Powers</th>
												<th>Year</th>  
												<th>Link</th> 
			                                   </tr>
			                               </thead>
			                               <tbody>
							
			                               </tbody>
			                           </table>
									   <p id="no-match" class="error hidden">There is nothing to show.</p>
			                       </div>
	                   		 </div>
									';
		
		$loadPage->renderAssets();
		
	}
	
	
}