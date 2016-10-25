<?php
namespace Dao;

use Model\Post;
use db\DBConnection;

/*  require '..\db\DBConnection.php';
 */
class PostDao 
{

	public static function addPost(Post $post)
	{
		try
		{
			$connection = DBConnection::getInstance();
			$queryInsert = "INSERT INTO posts
							(title_post, year_of_manufacture, price, 
							description_post,id_admin,	main_picture,
							brand,model,color,km,hp	)
							VALUES (:title, :year, :price,
								:description,:adminId,:mainPicture,
								:brand,:model,:color,:km,:hp
					
								);";
			$stm = $connection->prepare($queryInsert);
			$sucess = $stm->execute([
					'title' => $post->getTitle(),
					'year' => $post->getYear(),
					'price' => $post->getPrice(),
					'description' => $post->getDescription(),
					'adminId' => 1,
					'mainPicture' => $post->getMainPicture(),
					'brand' => $post->getBrand(),
					'model' => $post->getModel(),
					'color' => $post->getColor(),
					'km' => $post->getKm(),
					'hp' => $post->getHp()
			]);
			$postId = $post->setId($connection->lastInsertId());
				
			
		} catch (\PDOException $e) {
			echo "OOps,something went wrong";
		}
		
	
	}
	
	public static function updatePost($title,$year,$price,$description,$id,$brand,$model,$color,$km,$hp) 
	{
		try
		{
			$connection = DBConnection::getInstance();
			$updateQuery = "Update  posts
							SET title_post = :title,
								brand = :brand,
								model = :model,
								color = :color,
								km = :km,
								hp = :hp,
								year_of_manufacture = :year,
								price = :price,
								description_post=:description
								WHERE id_post = :id ;";
			$stm = $connection->prepare($updateQuery);
			$sucess = $stm->execute([
					'title' => $title,
					'brand' => $brand,
					'model' =>$model,
					'color' =>$color,
					'km' =>$km,
					'hp' =>$hp,
					'year' => $year,
					'price' => $price,
					'description' => $description,
					'id' => $id
					
			]);
			
		
		
				
		} catch (\PDOException $e) {
		}
	}
	
	public static function addPictures($array , $id)
	{
		
		try
		{
			$connection = DBConnection::getInstance();
			$insertQuery =  "INSERT INTO pictures
							(url_pic,id_post) VALUES (:url,:id);";
			foreach ($array as $key => $picture)
			{
				$stm=$connection->prepare($insertQuery);
				$sucess = $stm->execute([
						'url' => $picture,
						'id' =>$id
				]);
			}
		}catch (\PDOException $e) {
		}
	}
	
	
	public static function showAll() 
	{
		try
		{
			$connection = DBConnection::getInstance();
			$selectQuery = "SELECT  id_post,title_post,main_picture
					FROM posts";
			$stm = $connection->prepare($selectQuery);
			$sucess = $stm->execute();
				
			$result = $stm->fetchAll(\PDO::FETCH_ASSOC);
		}catch (\PDOException $e)
		{
		}
		return $result;
	}
	
	public static function deletePic($idPicture,$postId)
	{
		try
		{
			$connection = DBConnection::getInstance();
			$deleteQuery = "DELETE FROM pictures WHERE id_post = :postId AND id_picture=:idPicture " ;
			$stm = $connection->prepare($deleteQuery);
			$sucess = $stm->execute([
					"postId" => $postId,
					"idPicture" => $idPicture
	]);
		}catch (\PDOException $e)
		{
		}
		return $sucess;
	}
	
	public static function showPost($postId)
	{
		try 
		{
			$connection = DBConnection::getInstance();
			$selectQuery = "SELECT  title_post,year_of_manufacture,price,
					description_post,brand,model,color,
					km,hp,reserved
					FROM posts WHERE id_post = :id";
			$stm = $connection->prepare($selectQuery);
			$sucess = $stm->execute([
					":id" => $postId
			]);
			
		$result = $stm->fetch(\PDO::FETCH_ASSOC);
		}catch (\PDOException $e)
		{
		}
		return $result;
	}
	
	public static function showPostPictures($postId)
	{
		try 
		{
			$connection = DBConnection::getInstance();
			$selectQuery = "SELECT id_picture, url_pic FROM pictures WHERE id_post = :id";
			$stm = $connection->prepare($selectQuery);
			$sucess  = $stm->execute([
					':id' => $postId
			]);
			
			$result = $stm->fetchAll(\PDO::FETCH_ASSOC);
			
		}catch(\PDOException $e)
		{
		}
		return $result;
	}
	
	public static function getPictureIds($postId){
		try
		{
			$connection = DBConnection::getInstance();
			$selectQuery = "SELECT  id_picture, url_pic
								FROM pictures WHERE id_post = :id";
			$stm = $connection->prepare($selectQuery);
			$sucess = $stm->execute([
					":id" => $postId
			]);
				
			$result = $stm->fetch(\PDO::FETCH_ASSOC);
		}catch (\PDOException $e)
		{
		}
		return $result;
	}
	
	public static function getPostIds() 
	{
		try
		{
			$connection = DBConnection::getInstance();
			$selectQuery = "SELECT  id_post FROM  posts";
			$stm = $connection->prepare($selectQuery);
			$sucess = $stm->execute();
		
			$result = $stm->fetchAll(\PDO::FETCH_ASSOC);
		}catch (\PDOException $e)
		{
		}
		return $result;
	}
	
	public static function updateReserved($postId)
	{
		try
		{
			$connection = DBConnection::getInstance();
			$updateQuery = "Update  posts
							SET reserved = :bool
								WHERE id_post = :id ;";
			$stm = $connection->prepare($updateQuery);
			$sucess = $stm->execute([
					':bool' => true,
					'id' => $postId
			]);
				
		} catch (\PDOException $e) {
		}
	}
	
	public static function getReserved($postId) 
	{
		try
		{
		$connection = DBConnection::getInstance();
		$qeri = "SELECT  reserved FROM posts
								WHERE id_post = :id ;";
		$stm = $connection->prepare($qeri);
		$sucess = $stm->execute([
				'id' => $postId
		]);
		$result = $stm->fetch(\PDO::FETCH_ASSOC);
		} catch (\PDOException $e) {
		}
		
		return $result;
	}
	
	 public static function deletePost($postId)
		{
		try
		{
			$connection = DBConnection::getInstance();
			$deleteQuery = "DELETE   FROM posts
								WHERE id_post = :id ;";
			$stm = $connection->prepare($deleteQuery);
			$sucess = $stm->execute([
					'id' => $postId
			]);
			return $sucess;
			
		} catch (\PDOException $e) {
			
		}
	
	}
	
	
}