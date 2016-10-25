<?php
namespace Controller;

use Dao\PostDao;
use View\ViewAll;

/* require '..\Dao\PostDao.php';
require '..\View\ViewAll.php'; */

class ShowAllController 
{
	public function showAll()
	{
		$result = PostDao::showAll();
		
		
		
		$viewAll = new ViewAll();
		$viewAll->setPosts($result);
		$viewAll->renderShowAll();
		
		
	}
}

/* $showAll = new ShowAllController();

$showAll->showAll(); */