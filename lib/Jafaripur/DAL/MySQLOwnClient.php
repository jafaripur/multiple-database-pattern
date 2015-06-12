<?php

namespace Jafaripur\DAL;

/**
 * Abstract Class MySQLOwnClient for using MySQL
 * 
 * Each of model want to use MySQL should extend from this class
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
abstract class MySQLOwnClient extends \PDO {

	const SERVER = 'localhost';
	const USERNAME = 'jafaripur';
	const PASSWORD = '123456';
	const DB = 'test';

	public function __construct() {
		try {
			$options = array(
				\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
			);
			parent::__construct("mysql:dbname=" . self::DB . ";host=" . self::SERVER, self::USERNAME, self::PASSWORD, $options);
			$this->exec("SET NAMES utf8");
		} catch (\PDOException $e) {
			echo '<p>' . $ex->getMessage() . "</p>";
			echo $ex->getTraceAsString();
			die();
		}
	}

}
