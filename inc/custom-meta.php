<?php

add_action( 'cmb2_admin_init', 'progression_studios_page_meta_box' );
function progression_studios_page_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_settings',
		'title'         => esc_html__('Page Settings', 'progression-elements-food-truck'),
		'object_types'  => array( 'page' ), // Post type,
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Sub-title', 'progression-elements-food-truck'),
		'id'         => $prefix . 'sub_title',
		'type'       => 'text',
	) );

	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Sidebar Display', 'progression-elements-food-truck'),
		'id'         => $prefix . 'page_sidebar',
		'type'       => 'select',
		'options'     => array(
			'hidden-sidebar'   => esc_html__( 'Hide Sidebar', 'progression-elements-food-truck' ),
			'right-sidebar'    => esc_html__( 'Right Sidebar', 'progression-elements-food-truck' ),
			'left-sidebar'    => esc_html__( 'Left Sidebar', 'progression-elements-food-truck' ),
		),
	) );
	
	$progression_studios_cmb->add_field( array(
		'name' => esc_html__('Page Title Background Image', 'progression-elements-food-truck'),
		'id'         => $prefix . 'header_image',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Disable Page Title', 'progression-elements-food-truck'),
		'id'         => $prefix . 'disable_page_title',
		'type'       => 'checkbox',
	) );
	
}



add_action( 'cmb2_admin_init', 'progression_studios_page_header_meta_box' );
function progression_studios_page_header_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_header',
		'title'         => esc_html__('Header Settings', 'progression-elements-food-truck'),
		'object_types'  => array( 'page' ), // Post type,
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Navigation Text Color', 'progression-elements-food-truck'),
		'id'         => $prefix . 'custom_page_nav_color',
		'type'       => 'select',
		'options'     => array(
			'progression_studios_default_navigation_color'    => esc_html__( 'Default Color', 'progression-elements-food-truck' ),
			'progression_studios_force_dark_navigation_color'    => esc_html__( 'Force Text Black', 'progression-elements-food-truck' ),
			'progression_studios_force_light_navigation_color'   => esc_html__( 'Force Text White', 'progression-elements-food-truck' ), 
		),
	) );

	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Force Transparent Header', 'progression-elements-food-truck'),
		'id'         => $prefix . 'header_transparent_float',
		'type'       => 'checkbox',
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name' => esc_html__('Custom logo for page', 'progression-elements-food-truck'),
		'desc' => esc_html__('Must be same size as the main logo.', 'progression-elements-food-truck'),
		'id'         => $prefix . 'custom_page_logo',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Disable Header', 'progression-elements-food-truck'),
		'id'         => $prefix . 'header_disabled',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Disable Footer', 'progression-elements-food-truck'),
		'id'         => $prefix . 'disable_footer_per_page',
		'type'       => 'checkbox',
	) );


	
}





add_action( 'cmb2_admin_init', 'progression_studios_index_post_meta_box' );
function progression_studios_index_post_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_post',
		'title'         => esc_html__('Post Settings', 'progression-elements-food-truck'),
		'object_types'  => array( 'post' ), // Post type
	) );

	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Featured Image Link', 'progression-elements-food-truck'),
		'id'         => $prefix . 'blog_featured_image_link',
		'type'       => 'select',
		'options'     => array(
			'progression_link_default'   => esc_html__( 'Default link to post', 'progression-elements-food-truck' ), // {#} gets replaced by row number
			'progression_link_lightbox'    => esc_html__( 'Link to image in lightbox pop-up', 'progression-elements-food-truck' ),
			'progression_link_url'    => esc_html__( 'Link to URL', 'progression-elements-food-truck' ),
			'progression_link_url_new_window'    => esc_html__( 'Link to URL (New Window)', 'progression-elements-food-truck' ),
		),

	) );
	

	$progression_studios_cmb->add_field( array(
		'name' => esc_html__('Optional Link', 'progression-elements-food-truck'),
		'desc' => esc_html__('Make your post link to another page', 'progression-elements-food-truck'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Video/Audio', 'progression-elements-food-truck'),
		'desc'       => esc_html__('Paste in your video url or embed code', 'progression-elements-food-truck'),
		'id'         => $prefix . 'video_post',
		'type'       => 'textarea_code',
		'options' => array( 'disable_codemirror' => true )
	) );
	

	
}




add_action( 'cmb2_admin_init', 'progression_studios_location_post_meta_box' );
function progression_studios_location_post_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_locations',
		'title'         => esc_html__('Location Settings', 'progression-elements-food-truck'),
		'object_types'  => array( 'locations' ), // Post type
	) );

	$progression_studios_cmb->add_field( array(
		'name' => esc_html__('Google Maps Address', 'progression-elements-food-truck'),
		'desc' => esc_html__('Add-in address for the location', 'progression-elements-food-truck'),
		'id'         => $prefix . 'location_address',
		'type'       => 'text',
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name' => esc_html__('Location Time', 'progression-elements-food-truck'),
		'desc' => esc_html__('Add-in time for the location', 'progression-elements-food-truck'),
		'id'         => $prefix . 'location_time',
		'type'       => 'text',
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name' => esc_html__('Replace Default Icon', 'progression-elements-food-truck'),
		'id'         => $prefix . 'custom_map_icon',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Open Pin By Default', 'progression-elements-food-truck'),
		'desc' => esc_html__('Check box to open pin by default', 'progression-elements-food-truck'),
		'id'         => $prefix . 'open_pin',
		'type'       => 'checkbox',
	) );

	
}

