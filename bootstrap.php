<?php

/**
 * Plugin Name: AAM WordPress Plugin Boilerplate
 * Description: Just a playground for any functionality that is related to AAM
 * Version: 1.0.0
 * Author: Vasyl Martyniuk <vasyl@vasyltech.com>
 * Author URI: https://vasyltech.com
 *
 * -------
 * LICENSE: This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of AAM Protected Media Files source package.
 **/

namespace AAM\AddOn\Boilerplate;

use AAM\AddOn\Boilerplate\Backend\Manager as BackendManager;

/**
 * Main add-on's bootstrap class
 *
 * @package AAM\AddOn\Boilerplate
 * @author Vasyl Martyniuk <vasyl@vasyltech.com>
 * @version 1.0.0
 */
class Bootstrap
{

    /**
     * Single instance of itself
     *
     * @var Bootstrap
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
        if (is_admin()) {
            BackendManager::bootstrap();
        }
    }

    /**
     * Initialize plugin
     *
     * @return void
     * @access public
     * @static
     *
     * @version 1.0.0
     */
    public static function on_init()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self;
        }
    }

    /**
     * Activation hook
     *
     * @return void
     *
     * @access public
     * @version 1.0.0
     */
    public static function activate()
    {
        global $wp_version;

        if (version_compare(PHP_VERSION, '5.6.40') === -1) {
            exit(__('PHP 5.6.40 or higher is required.'));
        } elseif (version_compare($wp_version, '5.8.0') === -1) {
            exit(__('WordPress 5.8.0 or higher is required.'));
        } elseif (!defined('AAM_VERSION')
            || (version_compare(AAM_VERSION, '7.0.0-beta.1') === -1)) {
            exit(__(
                'Advanced Access Manager 7.0.0-beta.1 or higher is required.'
            ));
        }
    }

}

if (defined('ABSPATH')) {
    // Load
    // require __DIR__ . '/vendor/autoload.php';

    // Register autoloader
    require(__DIR__ . '/autoloader.php');
    Autoloader::register();

    // Initialize plugin's functionality
    add_action('init', function() {
        Bootstrap::on_init();
    });

    // Activation hooks
    register_activation_hook(__FILE__, __NAMESPACE__ . '\Bootstrap::activate');
}