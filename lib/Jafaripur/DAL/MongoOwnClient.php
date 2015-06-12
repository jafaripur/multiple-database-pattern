<?php

namespace Jafaripur\DAL;

/**
 * Abstract Class MongoOwnClient for using MongoDB
 * 
 * Each of model want to use MongoDB should extend from this class
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
abstract class MongoOwnClient extends \Mongo {

	const SERVER = 'localhost';
	const USERNAME = '';
	const PASSWORD = '';
	const DB = 'test';
	const PORT = 27017;

	public function __construct() {
		try {
			$options = [
				//'db' => $this->_db,
			];
			if (!empty(self::USERNAME)) {
				$options['username'] = self::USERNAME;
			}
			if (!empty(self::PASSWORD)) {
				$options['password'] = self::PASSWORD;
			}
			parent::__construct("mongodb://" . self::SERVER . ":" . self::PORT, $options);
		} catch (\Exception $ex) {
			echo '<p>' . $ex->getMessage() . "</p>";
			echo $ex->getTraceAsString();
			die();
		}
	}

}
