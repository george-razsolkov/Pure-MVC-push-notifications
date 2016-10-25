<?php
require_once 'autoload.php';
use db\DBConnection;

function send_notification ($tokens, $msg) { 
	
	$url = 'https://fcm.googleapis.com/fcm/send';
	
	$fields = array(
			'registration_ids' => $tokens,
			'data' => $msg
	);
	
	$headers = array(
			'Authorization:key = AIzaSyCnNp92Nrb1twO6uUAuIsw-kp170wdGEnM',
	        'Content-Type: application/json'
	);
	
	// Open connection
	$ch = curl_init();
	
	// Set the url, number of POST vars, POST data
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	
	// Execute post
	$result = curl_exec($ch);
	if ($result === FALSE) {
		die('Curl failed: ' . curl_error($ch));
	}
	
	// Close connection
	curl_close($ch);
	
	return $result;
}

function getDevices(){
	//pull tokens from db and save them in array
	try{
		$connection = DBConnection::getInstance();
		
		$sql = 'SELECT device FROM devices';
		$result = $connection->prepare($sql);
		$result->execute();
		
		$tokens = [];
		
		if ($result->rowCount() > 0){
			$r = $result->fetchAll(PDO::FETCH_ASSOC);
		
			foreach( $r as $row ) {
				$tokens[] = $row['device'];
			}
		}
		
		return $tokens;
	}catch (PDOException $e){}
	
}

function getAllPostInfo(){
	//get all posts from db
	try{
		$connection = DBConnection::getInstance();
		
		$query = 'SELECT id_post, brand, model, hp, year_of_manufacture AS year, km, color, price, description_post AS description
				FROM posts ORDER BY id_post DESC';
		$stm = $connection->prepare($query);
		$stm->execute(array());
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}catch (PDOException $e){}
	
}

function getPicForPost($id_post){
	try{
		$connection = DBConnection::getInstance();
		$query = 'SELECT url_pic FROM pictures WHERE id_post = (?)';
		$stm = $connection->prepare($query);
		$stm->execute(array($id_post));
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}catch (PDOException $e){}
	
}

function getInfoAdmin(){
	//get info admin from db
	try{
		$connection = DBConnection::getInstance();
		
		$adminInfo = 'SELECT concat(first_name, " " , last_name) as `name`, telephone as phone FROM admins;';
		$stm = $connection->prepare($adminInfo);
		$stm->execute(array());
		return $stm->fetch(PDO::FETCH_ASSOC);
	}catch (PDOException $e){}
	
}

	
