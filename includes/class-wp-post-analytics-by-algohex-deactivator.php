<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://algohex.com
 * @since      0.1.0
 *
 * @package    Wp_Post_Analytics_By_Algohex
 * @subpackage Wp_Post_Analytics_By_Algohex/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      0.1.0
 * @package    Wp_Post_Analytics_By_Algohex
 * @subpackage Wp_Post_Analytics_By_Algohex/includes
 * @author     Algohex Web Developer Team <algohex@gmail.com>
 */
class Wp_Post_Analytics_By_Algohex_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    0.1.0
	 */
	public function deactivate() {
		global $wpdb;
		if ( get_option( 'delete_data_when_deactivated', 'no' ) == 'yes' ) {
			$wpdb->query( "DROP table IF EXISTS " . $this->post_analytics_table() );
		}

		delete_option( 'delete_data_when_deactivated' );
	}

	public function post_analytics_table() {
		global $wpdb;
		return $wpdb->prefix . "algo_post_analytics";
	}

}
