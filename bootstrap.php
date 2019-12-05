<?php

/**
 * Plugin Name: AAM Cauldron
 * Description: Just a playground for any functionality that is related to AAM
 * Version: 0.0.1
 * Author: Vasyl Martyniuk <vasyl@vasyltech.com>
 * Author URI: https://vasyltech.com
 *
 * -------
 * LICENSE: This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of AAM Protected Media Files source package.
 **/

namespace AAM\AddOn\Cauldron;

/**
 * Main add-on's bootstrap class
 *
 * @package AAM\AddOn\EnhancedAccessPolicy
 * @author Vasyl Martyniuk <vasyl@vasyltech.com>
 * @version 0.0.1
 */
class Bootstrap
{

    /**
     * Activation hook
     *
     * @return void
     *
     * @access public
     * @version 0.0.1
     */
    public static function activate()
    {
        global $wp_version;

        if (version_compare(PHP_VERSION, '5.6.40') === -1) {
            exit(__('PHP 5.6.40 or higher is required.'));
        } elseif (version_compare($wp_version, '4.7.0') === -1) {
            exit(__('WP 4.7.0 or higher is required.'));
        } elseif (!defined('AAM_VERSION') || (version_compare(AAM_VERSION, '6.0.4') === -1)) {
            exit(__('Free Advanced Access Manager plugin 6.0.4 or higher is required.'));
        }
    }

}

if (defined('ABSPATH')) {
    // Activation hooks
    register_activation_hook(__FILE__, __NAMESPACE__ . '\Bootstrap::activate');
}