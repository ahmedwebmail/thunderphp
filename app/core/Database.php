<?php

defined('URLROOT') OR exit('Access Denied!');

class Database{

	private $credential;
	private $conn;

	public function __construct(){
		echo '';
	}

	public function DbConnect(): object{
		$this->credential = "mysql:hostname=".DBHOST.";dbname=".DBNAME;

		try{
			$this->conn = new PDO( $this->credential, DBUSER, DBPASS );
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		catch( PDOException $e ){
			echo "Connection failed: " . $e->getMessage();
		}
		return $this->conn;
	} 
}