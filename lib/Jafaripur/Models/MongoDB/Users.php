<?php

namespace Jafaripur\Models\MongoDB;

use Jafaripur\DAL\MongoOwnClient;
use Jafaripur\ModelsInterfaces\Users as UsersInterface;

/**
 * Users model for MongoDB
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
class Users extends MongoOwnClient implements UsersInterface {

	const COLLECTION_NAME = 'users';

	protected $properties = [
		'name',
		'family',
	];
	protected static $collections = [];

	public function __construct($config) {
		parent::__construct($config);
	}

	public function addNewUser(array $fields) {

		$newFields = $this->filterInputField($fields);

		$col = $this->getCollection();
		return $col->insert($newFields);
	}

	/**
	 * Remove undeclared properties from input.
	 * 
	 * @author A.Jafaripur <mjafaripur@yahoo.com>
	 * 
	 * @param array $fields
	 * @return array
	 */
	private function filterInputField(array $fields) {
		$newFields = [];
		foreach ($fields as $key => $value) {
			if (in_array($key, $this->properties)) {
				$newFields[$key] = $value;
			}
		}

		return $newFields;
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
	public function getCollection($collectionName = self::COLLECTION_NAME, $db = null) {
		if ($db == null){
			$db = $this->dbName;
		}
		$key = $db . $collectionName;
		if (!array_key_exists($key, self::$collections)) {
			self::$collections[$key] = parent::selectCollection($db, $collectionName);
		}

		return self::$collections[$key];
	}

}
