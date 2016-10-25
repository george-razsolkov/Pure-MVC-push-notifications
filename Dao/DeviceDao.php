<?php
namespace Dao;

use db\DBConnection;
use \PDO;

class DeviceDao
{
	public static function getAllDevices()
	{
		try {
			$connection = DBConnection::getInstance();
			$getAllDevices = 'SELECT name, email FROM devices';
			
			$statement = $connection->prepare($getAllDevices);
			
			$statement->execute(array());
			
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}catch (PDOException $e){
			//echo $e->getMessage();
		}
		
	}
}

