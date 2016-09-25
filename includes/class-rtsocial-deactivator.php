<?php

/**
 * Fired during plugin deactivation
 *
 * @link        https://rtcamp.com/
 *
 * @since       2.3.0
 *
 * @package     RTSocial
 * @subpackage  RTSocial / includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since       2.3.0
 *
 * @package     RTSocial
 * @subpackage  RTSocial / includes
 */
class RTSocial_Deactivator {

	/**
	 * Delete plugin options
	 *
	 * @since   2.3.0
	 */
	public static function deactivate() {

		if ( is_multisite() && is_plugin_active_for_network( 'rtsocial/rtsocial.php' ) ) {
			foreach ( wp_get_sites() as $i => $site ) {
				switch_to_blog( $site['blog_id'] );

				delete_option( 'rtsocial_plugin_options' );

				restore_current_blog();
			}
		} else {
			delete_option( 'rtsocial_plugin_options' );
		}

	}

}
