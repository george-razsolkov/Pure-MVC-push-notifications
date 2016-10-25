<?php
namespace View;

class ReserveView {
	
	public function render($name,$telephone,$email,$msg,$data)
	{
		$loadPage = new HeaderAndNavigation();
			
		$loadPage->renderExternals();
			
		echo ' <!-- profile -->
				  <link href="assets/css/reservation.css" rel="stylesheet">
				
				<!--JS -->';
 			
 		
 			
		
			
		$loadPage->renderHeader('admin');
		$loadPage->renderNav();
		
		echo '<id="table-container>
				<table>
					<tr>
						<td>Name </td>
						<td>' .htmlentities($name, ENT_QUOTES, 'UTF-8').' </td>
				</tr>
					<tr>
						<td>Email</td>
						<td>' .htmlentities($email, ENT_QUOTES, 'UTF-8').'"</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>' .htmlentities($telephone, ENT_QUOTES, 'UTF-8').'</td>
					</tr>
					<tr>
						<td>Data</td>
						<td>' .htmlentities($data, ENT_QUOTES, 'UTF-8').'</td>	
					</tr>		
					<tr>
						<td>Note</td>
						<td>' .htmlentities($msg, ENT_QUOTES, 'UTF-8').'</td>
					</tr>
					
				</table>' ;
		$loadPage->renderAssets();
	}
	
}