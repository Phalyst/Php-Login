<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author phalanndwa
 */
class loginController {
	//put your code here
		
	public function getLogin($loginDetails) {

		require_once("loginModel.php");
		$loginModel = new loginModel();
		$loginModel->setUsername($loginDetails['userName']);
		$loginModel->setPassword($loginDetails['password']);
		
        $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		 //header( "Location: http://{$url}" );
		 $result = $loginModel->getlogin();
		 $_SESSION['login_username']=$result['username'];
		 return $result;
		 
		
    }
	
	 function logout(){
		
		session_start(); 
		unset($_SESSION); 
		session_destroy(); 
		echo 'you ve been logged out!!';exit();
		header("Location: index.php");
	
	}

}
