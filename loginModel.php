<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginModel
 *
 * @author phalanndwa
 */
class loginModel {
	//put your code here
	private $username = NULL;
	private $password = NULL;
	
	function __construct($username, $password) {
		$this->username = stripslashes($username);
		$this->password = stripslashes($password);
	}

	function getUsername() {
		return $this->username;
	}

	function getPassword() {
		return $this->password;
	}

	function setUsername($username) {
		$this->username = stripslashes($username);
	}

	function setPassword($password) {
		$this->password = stripslashes($password);
	}

	public function getlogin(){

		$Sql = "SELECT username FROM Login WHERE  username = '{$this->getUsername()}'  AND password = '{$this->getPassword()}'"; 
		
		require_once 'DB.php';
		$result = DB::executeQuery($Sql);
		if(empty($result)){
			return false;
		}
		
		return $result;
	   }
}
