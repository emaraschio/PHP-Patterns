<?php

class ModelBuilder {
	
	private static $instances = array();
 
	public static function factory($modelName) 	{
		if (array_key_exists($modelName, self::$instances)) {
			return self::$instances[$modelName];
		}
		
		return self::$instances[$modelName] = new $modelName();
	}
}
 
$user = ModelBuilder::factory('User');
$calendar = ModelBuilder::factory('Calendar');
