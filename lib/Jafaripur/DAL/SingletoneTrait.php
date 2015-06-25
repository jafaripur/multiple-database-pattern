<?php

namespace Jafaripur\DAL;

use Jafaripur\Models\Factory\Registry;

trait SingletoneTrait {

    public static function getInstance($name, $config) {
        $class = get_called_class();
        if (!Registry::contains($name)) {
            if (DEBUG) {
                echo "***********************************************<br>New: $class<br>";
            }
            $instance = new $class($config);
            Registry::set($name, $instance);
            if (DEBUG) {
                echo '<pre>';
                print_r(new \ReflectionClass($instance));
                echo '</pre>';
                Registry::export();
            }
        }
        return Registry::get($name);
    }

}
