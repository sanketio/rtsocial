<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link        https://rtcamp.com/
 *
 * @since       2.3.0
 *
 * @package     RTSocial
 * @subpackage  RTSocial / admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to enqueue the admin-specific
 * stylesheet and JavaScript.
 *
 * @since       2.3.0
 *
 * @package     RTSocial
 * @subpackage  RTSocial / admin
 */
class RTSocial_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since   2.3.0
	 *
	 * @access  private
	 *
	 * @var     string  $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since   2.3.0
	 *
	 * @access  private
	 *
	 * @var     string  $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since   2.3.0
	 *
	 * @param   string  $plugin_name    The name of this plugin.
	 * @param   string  $version        The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

}