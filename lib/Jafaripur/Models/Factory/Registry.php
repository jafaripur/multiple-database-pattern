<?php

namespace Jafaripur\Models\Factory;

use Jafaripur\Config;

/**
 * Abstract class for Models Factory
 * 
 * @author A.Jafaripur <mjafaripur@yahoo.com>
 * 
 */
class Registry {

    private static $classes = [];

    /**
     * Check a class created before or not.
     *
     * @author A.Jafaripur <mjafaripur@yahoo.com>
     *
     * @param string $dbConfigName
     * @param string $model
     * @return Object
     */
    public static function getClass($dbConfigName, $model) {
        $config = Config::getConfiguration($dbConfigName);
        $namespace = "Jafaripur\\Models\\{$config['driver']}\\{$model}";
        $key = strtolower($dbConfigName . $model);

        $instance = call_user_func([$namespace, 'getInstance'], $key, $config);
        return $instance;
    }

    /**
     * Add an object to the registry
     *
     * If you do not specify a name the class name is used
     *
     * @author A.Jafaripur <mjafaripur@yahoo.com>
     *
     * @param string $name Name used to retrieve the object
     * @param mixed $object The object to store
     * @return mixed If overwriting an object, the previous object➥
      will be returned.
     * @throws Exception
     */
    public static function set($name, $object) {
        if (!self::contains($name)) {
            self::$classes[$name] = $object;
        }
    }

    /**
     * Get an object from the registry
     *
     * @param string $name Object name, {@see self::set()}
     * @return mixed
     * @throws Exception
     */
    public static function get($name) {
        if (!self::contains($name)) {
            throw new \Exception("Object does not exist in registry");
        }
        return self::$classes[$name];
    }

    /**
     * Check if an object is in the registry
     *
     * @author A.Jafaripur <mjafaripur@yahoo.com>
     * 
     * @param string $name Object name, {@see self::set()}
     * @return bool
     */
    public static function contains($name) {
        if (!isset(self::$classes[$name])) {
            return false;
        }
        return true;
    }

    /**
     * Remove an object from the registry
     *
     * @author A.Jafaripur <mjafaripur@yahoo.com>
     *
     * @param string $name Object name, {@see self::set()}
     * @returns void
     */
    public function remove($name) {
        if (self::contains($name)) {
            unset(self::$classes[$name]);
        }
    }

    public function export() {
        echo '<pre>';
        print_r(self::$classes);
        echo '</pre>';
    }

}
