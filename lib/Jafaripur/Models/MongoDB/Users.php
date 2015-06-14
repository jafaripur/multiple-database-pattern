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

	protected $properties = [
		'name',
		'family',
	];
    
	protected static $collections = [];

	public function __construct($config) {
		parent::__construct($config, 'users');
	}

	public function addNewUser(array $fields) {

		$newFields = $this->filterInputField($fields);

		$col = parent::getCollection();
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

}
