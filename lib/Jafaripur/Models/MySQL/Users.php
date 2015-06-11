<?php
namespace Jafaripur\Models\MySQL;

use Jafaripur\DAL\MySQLOwnClient;
use Jafaripur\ModelsInterfaces\Users as UsersInterface;

/**
 * Users model for MySQL
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
class Users extends MySQLOwnClient implements UsersInterface{
			
	public function __construct() {
		parent::__construct();
	}
	
	public function addNewUser(array $fields){
		
		return parent::prepare("INSERT INTO `users`(`name`, `family`)VALUES(:name, :family)")
				->execute([
					'name' => $fields['name'],
					'family' => $fields['family'],
				]);
	}
	
}
