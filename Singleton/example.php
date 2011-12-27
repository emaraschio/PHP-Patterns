<?php

class appConfig {
	private static $appConfig;

	private function __construct() {	
	}
	
	public static function get() {
  		if(NULL === self::$appConfig) {
            self::$appConfig = new appConfig();
        }        

		return self::$appConfig;
	}		
}

//Forma no permitida por el uso de un constructor privado
$appConfig = new appConfig();

//Forma correcta de uso, mediante la llama al metodo estatico "get"
$appConfig = appConfig::get();
