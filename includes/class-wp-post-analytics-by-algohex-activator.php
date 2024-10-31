<?php

/**
 * Fired during plugin activation
 *
 * @link       https://algohex.com
 * @since      0.1.0
 *
 * @package    Wp_Post_Analytics_By_Algohex
 * @subpackage Wp_Post_Analytics_By_Algohex/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.1.0
 * @package    Wp_Post_Analytics_By_Algohex
 * @subpackage Wp_Post_Analytics_By_Algohex/includes
 * @author     Algohex Web Developer Team <algohex@gmail.com>
 */
class Wp_Post_Analytics_By_Algohex_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    0.1.1
	 */
	public function activate() {

		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		if ( count( $wpdb->get_var( "Show table like '" . $this->post_analytics_table() . "'" ) ) == 0 ) {
			$sqlQuery = 'CREATE TABLE `' . $this->post_analytics_table() . '` (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
				visitor_ip VARCHAR(64) NOT NULL ,
				post_id BIGINT(20) UNSIGNED NOT NULL ,
				visit_datetime DATETIME,
				PRIMARY KEY (id),
				FOREIGN KEY (post_id) REFERENCES ' . $wpdb->prefix . "posts" . '(id) ON DELETE CASCADE ON UPDATE CASCADE
			) ' . $charset_collate . ';';

			require_once ( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sqlQuery );
		}

		add_option(
			  "delete_data_when_deactivated"
			, $value      = 'no'
			, $deprecated = ''
			, $autoload   = 'yes'
		);
	}

	public function post_analytics_table() {
		global $wpdb;
		return $wpdb->prefix . "algo_post_analytics";
	}

}
