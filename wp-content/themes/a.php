<?php
/**
 * FOIapplanding functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FOIapplanding
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'foiapplanding_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function foiapplanding_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on FOIapplanding, use a find and replace
		 * to change 'foiapplanding' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'foiapplanding', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'foiapplanding' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'foiapplanding_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'foiapplanding_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function foiapplanding_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'foiapplanding_content_width', 640 );
}
add_action( 'after_setup_theme', 'foiapplanding_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function foiapplanding_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'foiapplanding' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'foiapplanding' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'foiapplanding_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function foiapplanding_scripts() {
	wp_enqueue_style( 'foiapplanding-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'foiapplanding-style', 'rtl', 'replace' );

	wp_enqueue_script( 'foiapplanding-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'foiapplanding_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}





function header_footer_setup($wp_customize){
    
    $wp_customize->add_section( 'header', array(
		'title' => __( 'Header', 'foiapplanding' ),
		'priority' => 100,
	   ));
	
	   $wp_customize->add_setting( 'header_style', array(
		   'capability' => 'edit_theme_options',
		   'default' => 'header_v1',
		   'transport' => 'refresh', // or postMessage	
		 ) );
		 
		 $wp_customize->add_control( 'header_style', array(
		   'type' => 'select',
		   'section' => 'header',
		   'label' => __( 'Custom Select Option' ),
		   'description' => __( 'This is a custom select option.' ),
		   'choices' => array(
			 'header_v1' => __( 'Header V1' ),
			 'header_v2' => __( 'Header V2' ),
			 'header_v3' => __( 'Header V3' ),
		   ),
		 ) );
     $wp_customize->add_setting( "header_heading", array(
         'type' => 'theme_mod',
         'capability' => 'edit_theme_options',

     ));

     $wp_customize->add_control( "header_heading", array(
         'label' =>__( "Header Heading", 'header_heading' ),
         'section' => 'header',
         'type' => 'text',
         
     ));
	 $wp_customize->add_setting( "header_info", array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',

	));

	$wp_customize->add_control( "header_info", array(
		'label' =>__( "Header Information", 'header_info' ),
		'section' => 'header',
		'type' => 'text',
		
	));

	$wp_customize->add_setting( "button_info", array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',

	));

	$wp_customize->add_control( "button_info", array(
		'label' =>__( "Button Started", 'button_info' ),
		'section' => 'header',
		'type' => 'text',
		
	));

	$wp_customize->add_setting( "header_app_title", array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',

	));

	$wp_customize->add_control( "header_app_title", array(
		'label' =>__( "Header App Title", 'header_app_title' ),
		'section' => 'header',
		'type' => 'text',
		
	));
	$wp_customize->add_setting('button_logo1', array(
        'default'  => '',
        'type'     => 'theme_mod',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'button_logo1', array(
        'label' => __( 'Button Logo1', 'unisol' ),
        'section' => 'header',
        'settings' => 'button_logo1',
	)));
	$wp_customize->add_setting('button_logo2', array(
        'default'  => '',
        'type'     => 'theme_mod',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'button_logo2', array(
        'label' => __( 'Button Logo2', 'unisol' ),
        'section' => 'header',
        'settings' => 'button_logo2',
    )));
	$wp_customize->add_setting('app_logo', array(
        'default'  => '',
        'type'     => 'theme_mod',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'app_logo', array(
        'label' => __( 'App Logo', 'unisol' ),
        'section' => 'header',
        'settings' => 'app_logo',
    )));
	$wp_customize->add_setting('header_style', array(
        'default'  => '',
        'type'     => 'theme_mod',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'header_style', array(
        'label' => __( 'Header Logo', 'unisol' ),
        'section' => 'header',
        'settings' => 'header_style',
    )));
	
	}
add_action('customize_register','header_footer_setup');	

