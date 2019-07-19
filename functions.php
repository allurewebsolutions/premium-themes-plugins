<?php
/**
 * progression functions and definitions
 *
 * @package progression
 * @since progression 1.0
 */


if ( ! function_exists( 'progression_studios_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since progression 1.0
 */
	
function progression_studios_setup() {
	
	// Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	add_image_size('progression-studios-blog-index', 900, 500, true);
	add_image_size('progression-studios-post-title', 1400, 500, true);

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on pro, use a find and replace
	 * to change 'the-food-truck-progression' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'the-food-truck-progression', get_template_directory() . '/languages' );
	
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'progression-studios-primary' => esc_html__( 'Primary Main Menu', 'the-food-truck-progression' ),
		'progression-studios-header-top-left' => esc_html__( 'Secondary Header Top Left Menu', 'the-food-truck-progression' ),
		'progression-studios-header-top-right' => esc_html__( 'Secondary Header Top Right Menu', 'the-food-truck-progression' ),
		'progression-studios-mobile-menu' => esc_html__( 'Mobile Primary Menu', 'the-food-truck-progression' ),
	) );
	
	

}
endif; // progression_studios_setup
add_action( 'after_setup_theme', 'progression_studios_setup' );



/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since pro 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = esc_attr( get_theme_mod('progression_studios_site_width', '1200') ); /* pixels */


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since pro 1.0
 */
function progression_studios_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'the-food-truck-progression' ),
		'description'   => esc_html__('Default sidebar', 'the-food-truck-progression'),
		'id' => 'progression-studios-sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider-pro"></div></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Shop Sidebar', 'the-food-truck-progression' ),
		'description'   => esc_html__('Sidebar on shop pages', 'the-food-truck-progression'),
		'id' => 'progression-studios-sidebar-shop',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider-pro"></div></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	
	register_sidebar( array(
		'name' => esc_html__( 'Header Top Left', 'the-food-truck-progression' ),
		'description'   => esc_html__('Left widget area above the navigation', 'the-food-truck-progression'),
		'id' => 'progression-studios-header-top-left',
		'before_widget' => '<div id="%1$s" class="header-top-item widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Header Top Right', 'the-food-truck-progression' ),
		'description'   => esc_html__('Right widget area above the navigation', 'the-food-truck-progression'),
		'id' => 'progression-studios-header-top-right',
		'before_widget' => '<div id="%1$s" class="header-top-item widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<span class="widget-title">',
		'after_title' => '</span>',
	) );
	
	
	
}
add_action( 'widgets_init', 'progression_studios_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function progression_studios_scripts() {
	wp_enqueue_style(  'the-food-truck-progression-style', get_stylesheet_uri());
	wp_enqueue_style(  'the-food-truck-progression-google-fonts', progression_studios_fonts_url(), array( 'the-food-truck-progression-style' ), '1.0.0' );
	wp_enqueue_style(  'font-awesome', get_template_directory_uri() . '/inc/fonts/font-awesome/css/font-awesome.min.css', array( 'the-food-truck-progression-style' ), '1.0.0' );
	if ( get_theme_mod( 'progression_studios_page_transition' ) == 'transition-on-pro' ) {wp_enqueue_style(  'the-food-truck-progression-preloader', get_template_directory_uri() . '/css/preloader.css', array( 'the-food-truck-progression-style' ), '1.0.0' );}
	wp_enqueue_script( 'the-food-truck-progression-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'scrolltofixed', get_template_directory_uri() . '/js/scrolltofixed.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'the-food-truck-progression-scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20120206', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'wp_enqueue_scripts', 'progression_studios_scripts' );


/**
 * Enqueue google fonts
 */
function progression_studios_fonts_url() {
    $progression_studios_font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'the-food-truck-progression' ) ) {
        $progression_studios_font_url = add_query_arg( 'family', urlencode( 'Amatic SC:400|Roboto:300,400,700|&subset=latin' ), "//fonts.googleapis.com/css" );
    }
	 
    return $progression_studios_font_url;
}





/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/default-customizer.php';

/**
 * Theme Customizer
 */
require get_template_directory() . '/inc/mega-menu/mega-menu-framework.php';


/**
 * Elementor Page Builder Functions
 */
require get_template_directory() . '/inc/elementor-functions.php';

/**
 * WooCommerce Functions
 */
require get_template_directory() . '/inc/woocommerce-functions.php';


/**
 * Load Plugin Activation
 */
require get_template_directory() . '/inc/tgm-plugin-activation/plugin-activation.php';


/**
 * Demo Importer
 */
require get_template_directory() . '/inc/demo/demo-import.php';

