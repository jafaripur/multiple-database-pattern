<?php

namespace Jafaripur\ModelsInterfaces;

/**
 * Interface for Users model
 * 
 * each of user model should implement this interface
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
interface Users {

	/**
	 * add new user
	 * 
	 * @param array $fields
	 * @return boolean
	 */
	public function addNewUser(array $fields);
}
