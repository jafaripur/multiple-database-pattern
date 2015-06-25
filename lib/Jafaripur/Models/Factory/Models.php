<?php

namespace Jafaripur\Models\Factory;

use Jafaripur\Models\Factory\Registry;

/**
 * Class for load models from requested database mode
 *
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 *
 */
class Models
{
    const MYSQL = "MySQL";
    const MONGO = "MongoDB";

    /**
     * get categories model
     *
     * @author A.Jafaripur <mjafaripur@yahoo.com>
     *
     * @param string $dbConfigName database configration (default MongoDB)
     * @return Jafaripur\ModelsInterfaces\Users Categories model
     */
    public static function getUsers($dbConfigName = self::MONGO)
    {
        return Registry::getClass($dbConfigName, 'Users');
    }
}