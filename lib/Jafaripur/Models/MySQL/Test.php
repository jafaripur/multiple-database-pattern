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
class Test extends MySQLOwnClient implements UsersInterface {

    public function __construct($config) {
        parent::__construct($config);
    }

    public function addNewUser(array $fields) {

    }

}
