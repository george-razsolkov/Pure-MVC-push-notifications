<?php
namespace Model;

class Reserve  {
	protected $name;
	protected $email;
	protected $phone;
	protected $msg;
	protected $data;
	protected $id;
	
	public function __construct($name,$email,$phone,$msg,$data) {
		$this->name = $name;
		$this->email = $email;
		$this->phone = $phone;
		$this->data = $data;
		$this->msg = $msg;
	}
	
	public function getData() {
		return $this->data;
	}
	public function getName(){
		return $this->name;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getPhone(){
		return $this->phone;
	}
	
	public function getMsg() {
		return $this->msg;
	}
	
	public function setId($value) {
		$this->id = $value;
	}
}