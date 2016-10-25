<?php
namespace Model;

class ValidateCredentials
{
	//TODO validate with more conditions not only for empty fields
	
	public function validate($username, $pass){
		if($username == '' || $pass = ''){
			return false;
		}
		
		return true;
	}
}