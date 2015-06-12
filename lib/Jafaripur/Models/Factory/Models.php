<?php

namespace Jafaripur\Models\Factory;

use Jafaripur\Models\Factory\Factory;

/**
 * Class for load models from requested database mode
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
class Models extends Factory {

	/**
	 * get users model
	 * 
	 * @author A.Jafaripur <mjafaripur@yahoo.com>
	 * 
	 * @param string $database database provider (default MongoDB)
	 * @return Jafaripur\ModelsInterfaces\Users User model
	 */
	public static function getUsers($database = self::MONGO) {
		return self::getClass($database);
	}

}
