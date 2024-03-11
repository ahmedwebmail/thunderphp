<?php

/**
 * Class App
 * The main application class responsible for routing and handling URL requests.
 */
class App{
	private  $controller = '';
    private  $method     = 'index';
    private  $params     = [];
    private  $url;

    /**
     * Constructor
     * Initializes the application by calling the getController method.
     */

    public function __construct(){
    	view("default");
    	$this->getController();
    }
    
    /**
     * getURL method
     * Extracts, sanitizes, and processes the URL from the $_GET superglobal.
     * @return array|null The sanitized URL as an array.
     */

    private function getURL() : array | null{
    	if( isset( $_GET ) && ! empty( $_GET ) ){
    		$this->url = $_GET['url'];
    		$this->url = trim( $this->url );
    		$this->url = filter_var( $this->url, FILTER_SANITIZE_URL );
    		$this->url = explode("/", $this->url );

    		return $this->url;
    	}
    }

    /**
     * getController method
     * Determines the controller based on the URL and instantiates the controller object.
     * If the controller file does not exist, it defaults to 'Home'.
     */
    private function getController(){
    	$this->getURL();

    	if( isset( $this->url[0] ) && ! empty( $this->url[0] ) ){
    		if( file_exists( "../app/controller/".ucfirst($this->url[0]).".php" ) ){
    			require_once "../app/controller/".ucfirst($this->url[0]).".php";
    			$this->controller = new $this->url[0];
    		}

    		$this->getMethod();
    	}
    }

    /**
     * getMethod method
     * Determines the method based on the URL and calls it with the specified parameters.
     * If the method or parameters are not present, it defaults to 'index' and an empty array.
     */

    private function getMethod(){
    	if( isset( $this->url[1] ) && ! empty( $this->url[1] ) ){
    		if( method_exists( $this->controller, $this->url[1] ) ){
    			$this->method = $this->url[1];
    			unset( $this->url[1] );
    		}
    		$this->params = $this->url ? array_values( $this-> url) : [];
        	call_user_func_array( [ $this->controller, $this->method ], $this->params );
    	}
    }
}