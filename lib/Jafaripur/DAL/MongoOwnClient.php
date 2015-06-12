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

	protected $server;
	protected $port;
	protected $username;
	protected $password;
	protected $dbName;

	public function __construct(array $config) {
		try {
			foreach($config as $key => $value){
				if (property_exists($this, $key)){
					$this->$key = $value;
				}
			}
			$options = [
					//'db' => $this->_db,
			];
			if (!empty($this->username)) {
				$options['username'] = $this->username;
			}
			if (!empty($this->password)) {
				$options['password'] = $this->password;
			}
			parent::__construct("mongodb://" . $this->server . ":" . $this->port, $options);
		} catch (\Exception $ex) {
			echo '<p>' . $ex->getMessage() . "</p>";
			echo $ex->getTraceAsString();
			die();
		}
	}

}
