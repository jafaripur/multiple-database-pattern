<?php

namespace Jafaripur\DAL;

use Jafaripur\DAL\SingletoneTrait;

/**
 * Abstract Class MySQLOwnClient for using MySQL
 * 
 * Each of model want to use MySQL should extend from this class
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
abstract class MySQLOwnClient extends \PDO {

    use SingletoneTrait;
    
    protected $server;
    protected $username;
    protected $password;
    protected $dbName;

    public function __construct(array $config) {
        try {

            foreach ($config as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }

            $options = array(
                \PDO::ATTR_PERSISTENT => true,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            );
            parent::__construct("mysql:dbname=" . $this->dbName . ";host=" . $this->server, $this->username, $this->password, $options);
            $this->exec("SET NAMES utf8");
        } catch (\PDOException $e) {
            echo '<p>' . $ex->getMessage() . "</p>";
            echo $ex->getTraceAsString();
            die();
        }
    }

}
