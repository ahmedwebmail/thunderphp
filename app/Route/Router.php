<?php

class Router{
	private $controller = "";
	private $method     = "";
	private $param 	    = [];
	private $link 	    = []; 
	private static $instance;

	public function __construct(){

	}

	public function splitURL(){
		$this->link  = $_GET['url'] ?? "home";
		$this->link  = explode( "/", trim( $this->link ) );

		return $this->link;
	}

	public function loadController(){
		$this->link = $this->splitURL();

		if( file_exists ( "../app/controller/".ucfirst( $this->link[0] ).".php" ) && is_readable ( "../app/controller/".ucfirst( $this->link[0] ).".php" )){
			require_once "../app/controller/".ucfirst( $this->link[0] ).".php";
			$this->controller = new $this->link[0];
		}
		unset( $this->link[0] );
	}

	public static function getInstance(){
		self::$instance = new static();
		return self::$instance;
	}
}

function startRouting(){
	Router::getInstance();
}