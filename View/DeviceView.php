<?php
namespace View;

class DeviceView
{
	public function renderDevicesView(){
		
		$loadPage = new HeaderAndNavigation();
		$loadPage->renderExternals();
		
 		echo '<!-- AJAX -->
 				    <script type="text/javascript" src="assets/js/ajax.js"></script>
				<!-- Custom JS -->
 				    <script type="text/javascript" src="assets/js/drawTableOfDevice.js"></script>
			  ';
		
		//TODO admin name
		$loadPage->renderHeader('Petyr');
		$loadPage->renderNav();
		
		echo '<div id="page-wrapper">
				<div class="container-fluid">
								
                    <div class="col-lg-6">
                        <h2>Users</h2>
                        <div class="table-responsive">
                            <table id="devices" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
										<th>#</th>
                                        <th>Name</th>                                        
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
				
                                   <!-- <tr >
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                    </tr> -->
									
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
           ';
		
		$loadPage->renderAssets();
		
	}
}