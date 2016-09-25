<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://rtcamp.com/
 *
 * @since             1.0.0
 *
 * @package           RTSocial
 *
 * @wordpress-plugin
 * Plugin Name:       rtSocial
 * Plugin URI:        https://rtcamp.com/rtsocial/
 * Description:       It is the lightest social sharing plugin, uses non-blocking Javascript and a single sprite to get rid of all the clutter that comes along with the sharing buttons.
 * Version:           2.2.0
 * Author:            rtCamp
 * Author URI:        https://rtcamp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rtsocial
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes / class-rtsocial-activator.php
 */
function activate_rtsocial() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rtsocial-activator.php';

	RTSocial_Activator::activate();

}

register_activation_hook( __FILE__, 'activate_rtsocial' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes / class-rtsocial-deactivator.php
 */
function deactivate_rtsocial() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rtsocial-deactivator.php';

	Plugin_Name_Deactivator::deactivate();

}

register_deactivation_hook( __FILE__, 'deactivate_rtsocial' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rtsocial.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.3.0
 */
function run_rtsocial() {

	$rtsocial = new RTSocial();

	$rtsocial->run();

}

run_rtsocial();
