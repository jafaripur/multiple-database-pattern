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
class Users extends MySQLOwnClient implements UsersInterface {

    public function __construct($config) {
        parent::__construct($config);
    }

    public function addNewUser(array $fields) {

        $test = \Jafaripur\Models\Factory\Models::getTest(\Jafaripur\Models\Factory\Models::MYSQL);
        
        return parent::prepare("INSERT INTO `users`(`name`, `family`)VALUES(:name, :family)")
                ->execute([
                    'name' => $fields['name'],
                    'family' => $fields['family'],
        ]);
    }

}
