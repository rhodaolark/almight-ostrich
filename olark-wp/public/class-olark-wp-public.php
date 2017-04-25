<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://olark.com
 * @since      1.0.0
 *
 * @package    Olark_Wp
 * @subpackage Olark_Wp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Olark_Wp
 * @subpackage Olark_Wp/public
 * @author     Rhoda Meek <rhoda@olark.com>
 */
class Olark_Wp_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->olark_options = get_option($this->plugin_name);
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Olark_Wp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Olark_Wp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/olark-wp-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Olark_Wp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Olark_Wp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if(!empty($this->olark_options['enable_olark'])){
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/olark-wp-public.js', array( 'jquery' ), $this->version, false );
		
		$dataToBePassed = array(
		'site_ID'           => $this->olark_options['olark_site_ID'],
		'expand' 			=> $this->olark_options['start_expanded'],
		'float' 			=> $this->olark_options['detached_chat'],
		'lang'				=> $this->olark_options['olark_lang'],
		'api'				=> $this->olark_options['olark_api']
);
		wp_localize_script( $this->plugin_name, 'olark_vars', $dataToBePassed );
				}
	}
}