<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *DB class that does Database connectivity and queries
 * @author phalanndwa
 */
class DB {
	//put your code here
	private $DBConnect = NULL;
	
	function __construct(){
		$this->DBConnect = self::DBConnect();		
	}
	
	static function getDBConnect() {
		return self::$DBConnect;
	}
	
	function __destruct(){
		if(!mysqli_connect_errno()){
		    mysqli_close($this->DBConnect);
		}
	}
	
	function __wakeup(){
		$this->DBConnect = $DBConnect;
	}
	

	public static function DBConnect() {
		
		$ErrorMsgs = array();
		$DBConnect = mysqli_connect("localhost", "itrac", "itrac", "Login");

		if(mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else{
			return $DBConnect;
		}
	
	}
	
	public static function  executeQuery($Sql) {
		
		$result = mysqli_query(self::DBConnect(),$Sql);
		$result = mysqli_fetch_assoc($result);

		return($result);
	}
}
