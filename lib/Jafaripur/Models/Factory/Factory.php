<?php

namespace Jafaripur\Models\Factory;

use Jafaripur\Config;

/**
 * Abstract class for Models Factory
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
abstract class Factory {

	const MYSQL = "MySQL";
	const MONGO = "MongoDB";

	protected static $classes = [];

	/**
	 * Check a class created before or not.
	 *
	 * @author A.Jafaripur <mjafaripur@yahoo.com>
	 * 
	 * @param string $dbConfigName
	 * @param string $model
	 * @return Object
	 */
	protected static function getClass($dbConfigName, $model) {
		$config = Config::getConfiguration($dbConfigName);
		$namespace = "Jafaripur\\Models\\{$config['driver']}\\{$model}";
		$key = $dbConfigName.$namespace;
		if (!array_key_exists($key, self::$classes)) {
			self::$classes[$key] = new $namespace($config);
		}

		return self::$classes[$key];
	}

}
