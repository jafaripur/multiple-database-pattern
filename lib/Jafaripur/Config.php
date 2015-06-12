<?php
namespace Jafaripur;

/**
 * Abstract Class Config for configuration
 * 
 * configuration of application such database connection.
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
abstract class Config{
	
	private static $config = [
		'MongoDB' => [
			'driver' => 'MongoDB',
			'server' => 'localhost',
			'port' => 27017,
			'username' => '',
			'password' => '',
			'dbName' => 'test',
		],
		'MySQL' => [
			'driver' => 'MySQL',
			'server' => 'localhost',
			'username' => 'jafaripur',
			'password' => '123456',
			'dbName' => 'test',
		],
	];
	
	/**
	 * get configuration by name
	 * 
	 * @author A.Jafaripur <mjafaripur@yahoo.com>
	 * 
	 * @param string $name name of the configuration
	 * @return array
	 * @throws \Exception
	 */
	public static function getConfiguration($name){
		if (array_key_exists($name, self::$config)){
			return self::$config[$name];
		}
		
		throw new \Exception("Configration {$name} not exist!");
	}
}