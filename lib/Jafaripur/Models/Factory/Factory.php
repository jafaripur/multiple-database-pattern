<?php

namespace Jafaripur\Models\Factory;

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
	 * @param string $namespace
	 * @return Object
	 */
	protected static function getClass($database) {
		$namespace = "Jafaripur\\Models\\{$database}\\Users";
		if (!array_key_exists($namespace, self::$classes)) {
			self::$classes[$namespace] = new $namespace;
		}

		return self::$classes[$namespace];
	}

}
