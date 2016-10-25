<?php
namespace Dao;

use Model\Reserve;
use db\DBConnection;

class ReserveDao {
	
	public static function addReserve(Reserve $reserve,$postId)
	{
		try
		{
			$connection = DBConnection::getInstance();
			$queryInsert = "INSERT INTO reserves
							(name, telepfone, email,data,msg,id_post)
							VALUES (:name, :telephone, :email,:data,:msg,:postId);";
			$stm = $connection->prepare($queryInsert);
			$sucess = $stm->execute([
					'name' => $reserve->getName(),
					'telephone' => $reserve->getPhone(),
					'email' => $reserve->getEmail(),
					'data' => $reserve->getData(),
					'msg' => $reserve->getMsg(),
					'postId' => $postId
					
			]);
				
		} catch (PDOException $e) {
			
		}
	}
	
	public static function getReservation($postId)
	{
		try
		{
			$connection = DBConnection::getInstance();
			$queryInsert = "SELECT name,telepfone,email,msg,data FROM reserves
							
							WHERE id_post = :postId;";
			$stm = $connection->prepare($queryInsert);
			$sucess = $stm->execute([
					'postId' => $postId
			]);
			$result = $stm->fetch(\PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			
		}
		return $result;
	}
}