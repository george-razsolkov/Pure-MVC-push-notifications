<?php
namespace Interfaces;

use Dao\PostDao;

trait AllPostsTrait
{
	protected $ids;
	
	
	
	public function getAllIds()
	{
		$allIds = PostDao::getPostIds();
		for($i = 0; $i < count($allIds); $i++) {
			$this->ids[] = $allIds[$i]['id_post'];
		}
	}
}