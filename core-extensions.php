<?php
/**
 * Plugin Name: AP Core Extensions
 * Description: This plugin contains extended functionality. <strong>It should always be activated</strong>.
 * Version:     1.1.4
 * Author:      Madeleine Herritage
 * Author URI:  https://madeleine.dev
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.  You may NOT assume that you can use any other
 * version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.
 *
 * @package    APCoreExtensions
 * @since      1.0.0
 * @copyright  Copyright (c) 2025, Madeleine Herritage
 * @license    GPL-2.0+
 */

// Plugin directory
define( 'EA_DIR' , plugin_dir_path( __FILE__ ) );

require_once( EA_DIR . '/inc/cpt-teammember.php' );