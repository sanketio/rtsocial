<?php

/**
 * Fired during plugin activation
 *
 * @link        https://rtcamp.com/
 *
 * @since       2.3.0
 *
 * @package     RTSocial
 * @subpackage  RTSocial / includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since       2.3.0
 *
 * @package     RTSocial
 * @subpackage  RTSocial / includes
 */
class RTSocial_Activator {

	/**
	 * Function for setting default values
	 *
	 * @since   2.3.0
	 *
	 * @access  public
	 */
	public static function activate() {

		if ( is_multisite() ) {
			foreach ( wp_get_sites() as $i => $site ) {
				switch_to_blog( $site['blog_id'] );

				$defaults = array(
					'fb_style'              => 'like_light',
					'tw_handle'             => '',
					'tw_related_handle'     => '',
					'placement_options_set' => 'bottom',
					'display_options_set'   => 'horizontal',
					'alignment_options_set' => 'right',
					'active'                => array( 'tw', 'fb', 'lin', 'pin' ),
					'inactive'              => array( 'gplus' )
				);

				if ( ! get_option( 'rtsocial_plugin_options' ) ) {
					update_option( 'rtsocial_plugin_options', $defaults );
				}

				restore_current_blog();
			}
		} else {
			$defaults = array(
				'fb_style'              => 'like_light',
				'tw_handle'             => '',
			'tw_related_handle'         => '',
				'placement_options_set' => 'bottom',
				'display_options_set'   => 'horizontal',
				'alignment_options_set' => 'right',
				'active'                => array( 'tw', 'fb', 'lin', 'pin' ),
				'inactive'              => array( 'gplus' )
			);

			if ( ! get_option( 'rtsocial_plugin_options' ) ) {
				update_option( 'rtsocial_plugin_options', $defaults );
			}
		}

	}

}
