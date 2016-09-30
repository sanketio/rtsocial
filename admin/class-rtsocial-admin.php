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

	/**
	 * Register rtSocial admin menu as a sub-menu to Settings menu
	 *
	 * @since   2.3.0
	 *
	 * @access  public
	 */
	public function rts_add_admin_menu() {

		//Add settings page
		$hook = add_options_page(
			'rtSocial Options Page',
			'rtSocial Options',
			'manage_options',
			'rtsocial-options',
			array( $this, 'rts_load_admin_settings_markup' )
		);

		//Enqueue CSS and JS for the options page
		add_action( 'admin_print_scripts-' . $hook, array( $this, 'rtsocial_assets' ) );

	}

	/**
	 * Load admin settings markup
	 *
	 * @since   2.3.0
	 *
	 * @access  private
	 */
	public function rts_load_admin_settings_markup() {

		// Load admin settings markup
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/rtsocial-admin-settings-markup.php';

	}

	/**
	 *
	 */
	public function rtsocial_assets() {

		//Dashboard JS and CSS for admin side only
		wp_enqueue_script( 'dashboard' );
		wp_enqueue_style( 'dashboard' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'rt-fb-share', ( 'https://static.ak.fbcdn.net/connect.php/js/FB.Share' ), '', '', true );

		//Plugin CSS
		wp_enqueue_style( 'styleSheet', plugins_url( 'styles/style.css', dirname( __FILE__ ) ) );
		//Plugin JS
		wp_enqueue_script( 'rtss-main', plugins_url( '/js/rtss-main.js', dirname( __FILE__ ) ), array( 'jquery' ), '1.0', true );
		//Localize Script
		$this->rtsocial_localize_script( 'rtss-main' );

	}

	public function rtsocial_localize_script( $handle ) {
		//Passing arguments to Plugin JS
		$options = get_option( 'rtsocial_plugin_options' );
		$args = array();
		$args[ 'button_style' ] = $options[ 'display_options_set' ];
		$args[ 'hide_count' ] = ( isset( $options[ 'hide_count' ] ) && $options[ 'hide_count' ] == 1 ) ? 1 : 0;
		$args[ 'twitter' ] = false;
		$args[ 'facebook' ] = false;
		$args[ 'pinterest' ] = false;
		$args[ 'linkedin' ] = false;
		$args[ 'gplus' ] = false;

		if ( is_array( $options[ 'active' ] ) ) {
			if ( in_array( 'tw', $options[ 'active' ] ) ) {
				$args[ 'twitter' ] = true;
			}

			if ( in_array( 'fb', $options[ 'active' ] ) ) {
				$args[ 'facebook' ] = true;
			}

			if ( in_array( 'pin', $options[ 'active' ] ) ) {
				$args[ 'pinterest' ] = true;
			}

			if ( in_array( 'lin', $options[ 'active' ] ) ) {
				$args[ 'linkedin' ] = true;
			}

			if ( in_array( 'gplus', $options[ 'active' ] ) ) {
				$args[ 'gplus' ] = true;
			}
		}

		$args[ 'path' ] = plugins_url( 'images/', __FILE__ );

		wp_localize_script( $handle, 'args', $args );
	}

}
