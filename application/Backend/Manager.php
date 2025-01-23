<?php

/**
 * LICENSE: This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of AAM Protected Media Files source package.
 **/

namespace AAM\AddOn\Boilerplate\Backend;

/**
 * Backend manager
 *
 * @author Vasyl Martyniuk <vasyl@vasyltech.com>
 * @version 1.0.0
 */
class Manager
{

    /**
     * Single instance of itself
     *
     * @var Manager
     * @access private
     * @static
     *
     * @version 1.0.0
     */
    private static $_instance = null;

    /**
     * Constructor
     *
     * @return void
     * @access protected
     *
     * @version 1.0.0
     */
    protected function __construct()
    {
    }

    /**
     * Bootstrap the backend manager
     *
     * @return Manager
     * @access public
     * @static
     *
     * @version 1.0.0
     */
    public static function bootstrap()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

}