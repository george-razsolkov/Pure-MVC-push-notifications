<?php
namespace Model;

class Post
{
	protected $id;
	protected $title;
	protected $year;
	protected $price;
	protected $description;
	protected $pictures;
	protected $brand;
	protected $model;
	protected $color;
	protected $km;
	protected $hp;
	
	public function __construct($title,$year,$price,$description,$brand,$model,$color,$km,$hp)
	{
		$this->title = $title;
		$this->year = $year;
		$this->price = $price;
		$this->description = $description;
		$this->pictures = [];
		$this->brand = $brand;
		$this->model = $model;
		$this->color = $color;
		$this->km = $km;
		$this->hp = $hp;
		
	}
	
	public function getBrand()
	{
		return $this->brand;
	}
	
	public function getModel() 
	{
		return $this->model;
	}
	
	public function getColor()
	{
		return $this->color;
	}
	
	public function getKm()
	{
		return $this->km;
	}
	
	public function getHp()
	{
		return $this->hp;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getYear()
	{
		return $this->year;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function getPictures()
	{
		return $this->pictures;
	}
	
	public function setPictures($array)
	{
		$this->pictures = $array;
	}
	
	public function getMainPicture()
	{
		return isset($this->pictures[0]) ?  $this->pictures[0] : "";
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($value)
	{
		$this->id = $value;
	}
}