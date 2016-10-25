<?php

//require_once 'C:\xampp\htdocs\PHP_EXAMPLES\Final_Project\assets\db\DBConnection.php';

namespace Dao;
use db\DBConnection;
use \PDO;

class AdminDao
{	
	public static function getUser($username)
	{
		try {
			$connection = DBConnection::getInstance();
			$getUser = 'SELECT * FROM admins WHERE username = (?)';
			
			$statement = $connection->prepare($getUser);
			
			$statement->execute(array($username));
			
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e){
			//echo $e->getMessage();
		}
		
	}
	
	public static function updateAdminInfo($firstName, $lastName, $username, $email, $telephone, $idAdmin){
		
		try {
			$connection = DBConnection::getInstance();
			$updateAdmin = 'UPDATE admins SET first_name = (?) ,
										last_name = (?),
										telephone = (?),
										email = (?),
										username = (?)
				        WHERE id_admin = (?)';
			
			$statement = $connection->prepare($updateAdmin);
			
			$statement->execute(array($firstName, $lastName, $telephone, $email, $username, $idAdmin));
		} catch (PDOException $e){
			//echo $e->getMessage();
		}
		
	}
	
	public static function newSearch($brand, $model, $color, $km, $kmTo, $hp, $hpTo, $year, $yearTo, $price, $priceTo){
		if( AdminDao::validateFieldsForSearch($year, $yearTo, $price, $priceTo, $km, $hp, $kmTo, $hpTo) ){
			try {
				$connection = DBConnection::getInstance();
				
				$arrParams = [];
				$arrQuery = [];
				$search = "SELECT id_post, brand, model, color, km, hp, year_of_manufacture, price FROM posts WHERE";
				
				if(!empty($brand)){
					//$search .= " brand LIKE (?)";
					$arrQuery[] = " brand LIKE (?)";
					$arrParams[] = $brand;
				}
				if(!empty($model)){
					//$search .= " model LIKE (?)";
					$arrQuery[] = " model LIKE (?)";
					$arrParams[] = $model;
				}
				if(!empty($color)){
					//$search .= " color LIKE (?)";
					$arrQuery[] = " color LIKE (?)";
					$arrParams[] = $color;
				}
				
				if(!empty($km) && !empty($kmTo)){
					//$search .= " ( km BETWEEN (?) AND (?) )";
					$arrQuery[] = " ( km BETWEEN (?) AND (?) )";
					$arrParams[] = $km;
					$arrParams[] = $kmTo;
				}
				
				if(!empty($hp) && !empty($hpTo)){
					//$search .= " ( hp BETWEEN (?) AND (?) )";
					$arrQuery[] = " ( hp BETWEEN (?) AND (?) )";
					$arrParams[] = $hp;
					$arrParams[] = $hpTo;
				}
				
				if(!empty($year) && !empty($yearTo)){
					//$search .= " ( year_of_manufacture BETWEEN (?) AND (?) )";
					$arrQuery[] = " ( year_of_manufacture BETWEEN (?) AND (?) )";
					$arrParams[] = $year;
					$arrParams[] = $yearTo;
				}
				
				if(!empty($price) && !empty($priceTo)){
					//$search .= " ( price BETWEEN (?) AND (?) )";
					$arrQuery[] = " ( price BETWEEN (?) AND (?) )";
					$arrParams[] = $price;
					$arrParams[] = $priceTo;
				}
					
				$search .= $arrQuery[0];
				for ($i = 1; $i< count($arrQuery); $i++){
					$search .= ' AND ' . $arrQuery[$i];
				}
				$statement = $connection->prepare($search);				
				$statement->execute($arrParams);
				
				return $statement->fetchAll(PDO::FETCH_ASSOC);
				
			} catch (PDOException $e){
				//echo $e->getMessage();
			}
		} 
		return 'fail';	
		
	}
	
	private static function validateFieldsForSearch($year, $yearTo, $price, $priceTo, $km, $hp, $kmTo, $hpTo)
	{				
		if( ($year !='' && !is_numeric($year) && $yearTo !='' && !is_numeric($yearTo)) 
				|| ($year !='' && !is_numeric($year) && $yearTo =='') 
				|| ($year !='' && !is_numeric($year) && $yearTo !='')
				|| ($year !='' && is_numeric($year) && $yearTo =='')
				|| ($year !='' && is_numeric($year) && $yearTo !='' && !is_numeric($yearTo))
				|| ($year =='' && $yearTo !='' && !is_numeric($yearTo) )
				|| ($year =='' && $yearTo !='' && is_numeric($yearTo) )
			)
		{
			return false;
		}
	
		if( ($km !='' && !is_numeric($km) && $kmTo !='' && !is_numeric($kmTo)) 
				|| ($km !='' && !is_numeric($km) && $kmTo =='') 
				|| ($km !='' && !is_numeric($km) && $kmTo !='')
				|| ($km !='' && is_numeric($km) && $kmTo =='')
				|| ($km !='' && is_numeric($km) && $kmTo !='' && !is_numeric($kmTo))
				|| ($km =='' && $kmTo !='' && !is_numeric($kmTo) )
				|| ($km =='' && $kmTo !='' && is_numeric($kmTo) )
			)
		{
			return false;
		}
	
		if( ($hp !='' && !is_numeric($hp) && $hpTo !='' && !is_numeric($hpTo)) 
				|| ($hp !='' && !is_numeric($hp) && $hpTo =='') 
				|| ($hp !='' && !is_numeric($hp) && $hpTo !='')
				|| ($hp !='' && is_numeric($hp) && $hpTo =='')
				|| ($hp !='' && is_numeric($hp) && $hpTo !='' && !is_numeric($hpTo))
				|| ($hp =='' && $hpTo !='' && !is_numeric($hpTo) )
				|| ($hp =='' && $hpTo !='' && is_numeric($hpTo) )
			)
		{
			return false;
		}
		if( ($price !='' && !is_numeric($price) && $priceTo !='' && !is_numeric($priceTo)) 
				|| ($price !='' && !is_numeric($price) && $priceTo =='') 
				|| ($price !='' && !is_numeric($price) && $priceTo !='')
				|| ($price !='' && is_numeric($price) && $priceTo =='')
				|| ($price !='' && is_numeric($price) && $priceTo !='' && !is_numeric($priceTo))
				|| ($price =='' && $priceTo !='' && !is_numeric($priceTo) )
				|| ($price =='' && $priceTo !='' && is_numeric($priceTo) )
			)
		{
			return false;
		}
		
		return true;
	}
}