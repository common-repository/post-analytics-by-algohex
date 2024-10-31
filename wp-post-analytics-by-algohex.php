<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://algohex.com
 * @since             0.1.0
 * @package           Wp_Post_Analytics_By_Algohex
 *
 * @wordpress-plugin
 * Plugin Name:       Post Analytics by Algohex
 * Description:       Track your post visit.
 * Version:           0.1.1
 * Author:            Algohex Web Developer Team
 * Author URI:        https://algohex.com
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-post-analytics-by-algohex
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.1.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_POST_ANALYTICS_BY_ALGOHEX_VERSION', '0.1.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-post-analytics-by-algohex-activator.php
 */
function activate_wp_post_analytics_by_algohex() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-post-analytics-by-algohex-activator.php';
	$activator = new Wp_Post_Analytics_By_Algohex_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-post-analytics-by-algohex-deactivator.php
 */
function deactivate_wp_post_analytics_by_algohex() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-post-analytics-by-algohex-deactivator.php';
	$deactivator = new Wp_Post_Analytics_By_Algohex_Deactivator();
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_post_analytics_by_algohex' );
register_deactivation_hook( __FILE__, 'deactivate_wp_post_analytics_by_algohex' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-post-analytics-by-algohex.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_wp_post_analytics_by_algohex() {

	$plugin = new Wp_Post_Analytics_By_Algohex();
	$plugin->run();

}
run_wp_post_analytics_by_algohex();
