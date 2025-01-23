<?php

/**
 * ======================================================================
 * LICENSE: This file is subject to the terms and conditions defined in *
 * file 'license.txt', which is part of this source code package.       *
 * ======================================================================
 */

namespace AAM\AddOn\Boilerplate;

/**
 * Project auto-loader
 *
 * @package AAM\AddOn\Boilerplate
 * @version 1.0.0
 */
class Autoloader
{

    /**
     * Namespace prefix we are interested in
     *
     * @version 1.0.0
     */
    const PREFIX = 'AAM\AddOn\Boilerplate\\';

    /**
     * Auto-loader for plugin
     *
     * Try to load a class if prefixed width AAM\AddOn\Boilerplate
     *
     * @param string $class_name
     *
     * @return void
     * @access public
     *
     * @version 1.0.0
     */
    public static function load($class_name)
    {
        if (strpos($class_name, self::PREFIX) === 0) {
            $relative = str_replace([ self::PREFIX, '\\' ], [ '', '/' ], $class_name);
            $filename = realpath(__DIR__ . '/application/' . $relative . '.php');
        }

        if (!empty($filename) && file_exists($filename)) {
            require($filename);
        }
    }

    /**
     * Register auto-loader
     *
     * @return void
     * @access public
     * @static
     *
     * @version 1.0.0
     */
    public static function register()
    {
        spl_autoload_register(__CLASS__ . '::load');
    }

}