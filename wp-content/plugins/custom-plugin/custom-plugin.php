<?php
/*
Plugin Name: Custom Plugin
Plugin URI: #
Description: Just another contact form plugin. Simple but flexible.
Author: Takayuki Miyoshi
Author URI: https://ideasilo.wordpress.com/
Text Domain: plugin-name
Domain Path: /languages/
Version: 1.2.0
*/

defined('ABSPATH') or die('Hey, what are you doing here?');

/**
 * Main Elementor Test Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class CustomPlugin {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'elementor-test-extension' );

	}

	/**
	 * On Plugins Loaded
	 *
	 * Checks if Elementor has loaded, and performs some compatibility checks.
	 * If All checks pass, inits the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_plugins_loaded() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}

	/**
	 * Compatibility Checks
	 *
	 * Checks if the installed version of Elementor meets the plugin's minimum requirement.
	 * Checks if the installed PHP version meets the plugin's minimum requirement.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function is_compatible() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}

		return true;

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {
	
		$this->i18n();
		//add scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		// add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
        add_action( 'elementor/elements/categories_registered', [$this,'add_elementor_widget_categories'] );
		

	}
	public function widget_scripts() {
		
		wp_register_script( 'dropdown', plugins_url( 'js/dropdown.js', __FILE__ ),[ 'jquery', 'dropdown' ] );
	}

    function add_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'foipplandding',
            [
                'title' => __( 'FOIApplanding', 'plugin-name' ),
                'icon' => 'fa fa-plug',
            ]
        );
        // $elements_manager->add_category(
        //     'second-category',
        //     [
        //         'title' => __( 'Second Category', 'plugin-name' ),
        //         'icon' => 'fa fa-plug',
        //     ]
        // );
    
    }
	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files  
        require_once( __DIR__ . '/inc/Elementor_SingleImage_Widget.php' );
        require_once( __DIR__ . '/inc/Elementor_Widget_Test.php' );
        require_once( __DIR__ . '/inc/Elementor_Link_Widget.php' );
        require_once( __DIR__ . '/inc/Elementor_Widget_Special.php' );
        require_once( __DIR__ . '/inc/Elementor_PriceBox_Widget.php' );
        require_once( __DIR__ . '/inc/Elementor_Counter_Widget.php' );
        require_once( __DIR__ . '/inc/Elementor_contactInfo_Widget.php' );
        require_once( __DIR__ . '/inc/Elementor_TextArea_Widget.php' );
        require_once( __DIR__ . '/inc/Elementor_Testimonial_Widget.php' );
        require_once( __DIR__ . '/inc/Elementor_aboutRepeater_Widget.php' );
        require_once( __DIR__ . '/inc/Elementor_Image_With_Text.php' );
        require_once( __DIR__ . '/inc/Elementor_Widget_Carreer.php' );
        require_once( __DIR__ . '/inc/Elementor_Image_With_Text_icon.php' );
        require_once( __DIR__ . '/inc/Elementor_Widget_dropdowncontent.php' );


		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_SingleImage_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Widget_Test() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Link_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Widget_Special() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_PriceBox_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Counter_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_contactInfo_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_TextArea_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Testimonial_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_aboutRepeater_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Image_With_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Widget_Carreer() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Image_With_Text_icon() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Widget_dropdowncontent() );
		
	}
	
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-test-extension' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}


	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-test-extension' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'elementor-test-extension' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

}

CustomPlugin::instance();