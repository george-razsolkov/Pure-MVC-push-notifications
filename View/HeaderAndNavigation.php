<?php

namespace View;
if(!isset($_SESSION)){
    session_start();
}

class HeaderAndNavigation
{
	
	public function renderExternals(){
		echo '<!DOCTYPE html>
				<html lang="en">
				
				<head>
				
				    <meta charset="utf-8">
				    <meta http-equiv="X-UA-Compatible" content="IE=edge">
				    <meta name="viewport" content="width=device-width, initial-scale=1">
				    <meta name="description" content="">
				    <meta name="author" content="">
				
				    <title>AvtovozBG</title>
				
					<!-- Reset CSS -->
					<link href="assets/css/reset.css" rel="stylesheet">

				    <!-- Bootstrap Core CSS -->
				    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
				
				    <!-- Custom CSS -->
				    <link href="assets/css/sb-admin.css" rel="stylesheet">
				    
				    <!-- Custom Fonts -->
				    <link href="assets/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">';
	}
	
	public function renderHeader($nameAdmin)
	{
		echo '
								
				</head>
				
				<body>
				
				    <div id="wrapper">
				
				        <!-- Navigation -->
				        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				            <!-- Brand and toggle get grouped for better mobile display -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				                    <span class="sr-only">Toggle navigation</span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                </button>
				                <span id="title" class="navbar-brand">AvtovozBG</span>
				            </div>
				            <!-- Top Menu Items -->
				            <ul class="nav navbar-right top-nav">
				               
				                <li class="dropdown">
				                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  ' . 
										$_SESSION['admin']->getFirstName() . ' <b class="caret"></b></a>
				                    <ul class="dropdown-menu">
				                        <li>
				                            <a href="index.php?controller=profile&action=renderProfileForm"><i class="fa fa-fw fa-user"></i> Profile</a>
				                        </li>
				                        <li class="divider"></li>
				                        <li>
				                            <a href="index.php?controller=login&action=logOut"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
				                        </li>
				                    </ul>
				                </li>
				            </ul>
				
				
				            ';
	}
	
	public function renderNav(){
		$action = $_GET['action'];
		
		echo '<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
				            <div class="collapse navbar-collapse navbar-ex1-collapse">
				                <ul class="nav navbar-nav side-nav">
				                    
				                    <li ' . (($action=='showBaseView') ? 'class="active"' : '') . '>
				                        <a href="index.php?controller=base&action=showBaseView"><i class="fa fa-fw fa-home"></i> Home</a>
				                    </li>
				                    <li ' . (($action=='MakePost') ? 'class="active"' : '') . '>
				                        <a href="index.php?controller=Post&action=MakePost"><i class="fa fa-fw fa-edit"></i> Add Post</a>
				                    </li>
				                    <li ' . (($action=='ShowAll') ? 'class="active"' : '') . '>
				                        <a href="index.php?controller=ShowAll&action=ShowAll"><i class="fa fa-fw fa-desktop"></i> View Posts</a>
				                    </li>
								    <li ' . (($action=='showUsersInfo') ? 'class="active"' : '') . '>
				                        <a href="index.php?controller=device&action=showUsersInfo"><i class="fa fa-fw fa-users"></i> Users</a>
				                    </li>
				                </ul>
				            </div>
				            <!-- /.navbar-collapse -->
				        </nav>
				
				
				   ';
	}
	
	
	public function renderAssets(){
		echo '
				 </div>
				    <!-- /#wrapper -->
				    <!-- jQuery -->
				    <script src="assets/js/jquery.js"></script>
				
				    <!-- Bootstrap Core JavaScript -->
				    <script src="assets/js/bootstrap.min.js"></script>
				
				</body>
				
				</html>';
	}
	
}