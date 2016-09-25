<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin so that it is ready for translation.
 *
 * @link        https://rtcamp.com/
 *
 * @since       2.3.0
 *
 * @package     RTSocial
 * @subpackage  RTSocial / includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin so that it is ready for translation.
 *
 * @since       2.3.0
 *
 * @package     RTSocial
 * @subpackage  RTSocial / includes
 */
class RTSocial_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since   2.3.0
	 *
	 * @access  public
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'rtsocial',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}