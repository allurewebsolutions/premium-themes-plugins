<?php
/*
Plugin Name: Progression Theme Elements - Food Truck
Plugin URI: https://progressionstudios.com
Description: Theme Elements for Progression Studios Theme
Version: 1.0
Author: Progression Studios
Author URI: https://progressionstudios.com/
Author Email: contact@progressionstudios.com
License: GNU General Public License v3.0
Text Domain: progression-elements-food-truck
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


define( 'PROGRESSION_THEME_ELEMENTS_URL', plugins_url( '/', __FILE__ ) );
define( 'PROGRESSION_THEME_ELEMENTS_PATH', plugin_dir_path( __FILE__ ) );


// Translation Setup
add_action('plugins_loaded', 'progression_theme_elements_food_truck');
function progression_theme_elements_food_truck() {
	load_plugin_textdomain( 'progression-elements-food-truck', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

/**
* Enqueue or de-enqueue third party plugin scripts/styles
*/
function food_truck_progression_theme_elements_styles_scripts() {
	wp_register_script( 'boosted_elements_progression_masonry_js',  PROGRESSION_THEME_ELEMENTS_URL . 'js/masonry.js', '','1.0',true);
	wp_register_script( 'boosted_elements_progression_google_maps',  PROGRESSION_THEME_ELEMENTS_URL . 'js/jquery.gomap-1.3.3.min.js', '','1.0',true);
	wp_dequeue_style( 'boosted-elements-progression-prettyphoto-optional' ); //Removing a script
}
add_action( 'wp_enqueue_scripts', 'food_truck_progression_theme_elements_styles_scripts', 100 );



/**
 * Registering Custom Post Type
 */
add_action('init', 'food_truck_progression_custom_post_type');
function food_truck_progression_custom_post_type() {	
	
	register_post_type(
		'locations',
		array(
			'labels' => array(
				'name' => esc_html__( "Locations", "progression-elements-food-truck" ),
				'singular_name' => esc_html__( "Location", "progression-elements-food-truck" )
			),
			'menu_icon' => 'dashicons-location',
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true,
			'rewrite' => array('slug' => 'food-truck-archive'),
			'supports' => array('title', 'editor', 'thumbnail'),
			'can_export' => true,
		)
	);

	register_taxonomy(
		'food-truck-cat', 'locations', 
		array('hierarchical' => true, 
		'label' => esc_html__( "Location Category", "progression-elements-food-truck" ), 
		'query_var' => true, 
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'food-truck-category'),
		)
	 );
	 

}


/**
* Calling new Page Builder Elements
*/
require_once PROGRESSION_THEME_ELEMENTS_PATH.'inc/elementor-helper.php';

function progression_food_truck_elements_load_elements(){
	require_once PROGRESSION_THEME_ELEMENTS_PATH.'elements/post-element.php';
}
add_action('elementor/widgets/widgets_registered','progression_food_truck_elements_load_elements');


/**
 * Custom Social Icons
 */
require PROGRESSION_THEME_ELEMENTS_PATH.'inc/social-icons.php';


/**
 * Custom Metabox Fields
 */
require PROGRESSION_THEME_ELEMENTS_PATH.'inc/custom-meta.php';

