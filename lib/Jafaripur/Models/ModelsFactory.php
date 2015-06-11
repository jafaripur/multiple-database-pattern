<?php
namespace Jafaripur\Models;

/**
 * Class for load models from requested database mode
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
class ModelsFactory {
	
	const MYSQL = "MySQL";
	const MONGO = "MongoDB";
	
	private static $classes = [];
		
	/**
	 * get class namespace by database provider name.
	 * 
	 * @author A.Jafaripur <mjafaripur@yahoo.com>
	 * 
	 * @param string $database
	 * @return string class namespace path
	 */
	private static function getClassName($database){
		return "Jafaripur\\Models\\{$database}\\Users";
	}
	
	/**
	 * Check a class created before or not.
	 *
	 * @author A.Jafaripur <mjafaripur@yahoo.com>
	 * 
	 * @param string $namespace
	 * @return Object
	 */
	private static function getClass($namespace){
		if (!array_key_exists($namespace, self::$classes)){
			self::$classes[$namespace] = new $namespace;
		}
		
		return self::$classes[$namespace];
	}
	
	/**
	 * get users model
	 * 
	 * @author A.Jafaripur <mjafaripur@yahoo.com>
	 * 
	 * @param string $database database provider (default MongoDB)
	 * @return Jafaripur\ModelsInterfaces\Users User model
	 */
	public static function getUsers($database = self::MONGO){
		$namespace = self::getClassName($database);
		return self::getClass($namespace);
	}
	
}
