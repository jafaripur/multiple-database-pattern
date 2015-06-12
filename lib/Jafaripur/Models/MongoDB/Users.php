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
class Users extends MFongoOwnClient implements UsersInterface{
	
	const COLLECTION_NAME = 'users';
	
	protected $properties = [
		'name',
		'family',
	];
	
	protected static $collections = [];
		
	public function __construct() {
		parent::__construct();
	}

	public function addNewUser(array $fields){
		
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
	private function filterInputField(array $fields){
		$newFields = [];
		foreach($fields as $key => $value){
			if (in_array($key, $this->properties)){
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
	 * @param string $db database name default (parent::DB)
	 * @param string $collectionName collection name default (self::COLLECTION_NAME)
	 * @return \MongoCollection
	 */
	public function getCollection($db = parent::DB, $collectionName = self::COLLECTION_NAME){
		$key = $db.$collectionName;
		if (!array_key_exists($key, self::$collections)){
			self::$collections[$key] = parent::selectCollection($db, $collectionName);
		}
		
		return self::$collections[$key];
		
	}
		
}
