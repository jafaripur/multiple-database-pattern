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
    protected $collectionName;

	public function __construct(array $config, $collectionName = null) {
		try {
            
            $this->collectionName = $collectionName;
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
    
    /**
	 * get collection for doing CRUD or quering.
	 * 
	 * @author A.Jafaripur <mjafaripur@yahoo.com>
	 * 
	 * @param string $collectionName collection name default (self::COLLECTION_NAME)
	 * @param string $db database name, if null get the default db name from configuration
	 * @return \MongoCollection
	 */
	public function getCollection($collectionName = null, $db = null) {
		if ($db == null){
			$db = $this->dbName;
		}
        if ($collectionName == null){
            $collectionName = $this->collectionName;
        }
		$key = $db . $collectionName;
		if (!array_key_exists($key, static::$collections)) {
			static::$collections[$key] = parent::selectCollection($db, $collectionName);
		}

		return static::$collections[$key];
	}

}
