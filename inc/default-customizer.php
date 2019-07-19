<?php
/**
 * Progression Theme Customizer
 *
 * @package pro
 */

get_template_part('inc/customizer/new', 'controls');
get_template_part('inc/customizer/typography', 'controls');
get_template_part('inc/customizer/alpha', 'control');// New Alpha Control



/* Remove Default Theme Customizer Panels that aren't useful */
function progression_studios_change_default_customizer_panels ( $wp_customize ) {
	$wp_customize->remove_section("themes"); //Remove Active Theme + Theme Changer
   $wp_customize->remove_section("static_front_page"); // Remove Front Page Section		
}
add_action( "customize_register", "progression_studios_change_default_customizer_panels" );



function progression_studios_customizer( $wp_customize ) {
	
	
	/* Panel - General */
	$wp_customize->add_panel( 'progression_studios_general_panel', array(
		'priority'    => 3,
		'title'       => esc_html__( 'General', 'the-food-truck-progression' ),
		 ) 
 	);
	
	
	/* Section - General - General Layout */
	$wp_customize->add_section( 'progression_studios_section_general_layout', array(
		'title'          => esc_html__( 'General Options', 'the-food-truck-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	

	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_site_boxed' ,array(
		'default' => 'boxed-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_site_boxed', array(
		'label'    => esc_html__( 'Site Layout', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 10,
		'choices'     => array(
			'full-width-pro' => esc_html__( 'Full Width', 'the-food-truck-progression' ),
			'boxed-pro' => esc_html__( 'Boxed', 'the-food-truck-progression' ),
		),
		))
	);

	
	/* Setting - General - General Layout */
	$wp_customize->add_setting('progression_studios_site_width',array(
		'default' => '1200',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_site_width', array(
		'label'    => esc_html__( 'Site Width(px)', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 961,
			'max'  => 4500,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Footer Elementor 
	https://gist.github.com/ajskelton/27369df4a529ac38ec83980f244a7227
	*/
	$progression_studios_elementor_error_library_list =  array(
		'' => 'Choose a template',
	);
	$progression_studios_elementor_404_args = array('post_type' => 'elementor_library', 'posts_per_page' => 99);
	$progression_studios_elementor_404_posts = get_posts( $progression_studios_elementor_404_args );
	foreach($progression_studios_elementor_404_posts as $progression_studios_elementor_404_post) {
	    $progression_studios_elementor_error_library_list[$progression_studios_elementor_404_post->ID] = $progression_studios_elementor_404_post->post_title;
	}
	
	$wp_customize->add_setting( 'progression_studios_error_elementor_library' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_error_elementor_library', array(
	  'type' => 'select',
	'section' => 'progression_studios_section_general_layout',
	  'priority'   => 16,
	  'label'    => esc_html__( '404 Page Elementor Template', 'the-food-truck-progression' ),
	  'description'    => esc_html__( 'You can add/edit your 404 page under ', 'the-food-truck-progression') . '<a href="' . admin_url() . 'edit.php?post_type=elementor_library">Elementor > Templates</a>',
	  'choices'  => 	   $progression_studios_elementor_error_library_list,
	) );
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_select_color', array(
		'label'    => esc_html__( 'Mouse Selection Color', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 20,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_bg', array(
		'default'	=> '#2e3a43',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_select_bg', array(
		'default'	=> '#2e3a43',
		'label'    => esc_html__( 'Mouse Selection Background', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 25,
		)) 
	);
	
	
	
	
	
	
	
	
	/* Section - General - Page Loader */
	$wp_customize->add_section( 'progression_studios_section_page_transition', array(
		'title'          => esc_html__( 'Page Loader', 'the-food-truck-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 26,
		) 
	);

	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_transition' ,array(
		'default' => 'transition-off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_transition', array(
		'label'    => esc_html__( 'Display Page Loader?', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'priority'   => 10,
		'choices'     => array(
			'transition-on-pro' => esc_html__( 'On', 'the-food-truck-progression' ),
			'transition-off-pro' => esc_html__( 'Off', 'the-food-truck-progression' ),
		),
		))
	);
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_transition_loader' ,array(
		'default' => 'circle-loader-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_transition_loader', array(
		'label'    => esc_html__( 'Page Loader Animation', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'type' => 'select',
		'priority'   => 15,
		'choices' => array(
			'circle-loader-pro' => esc_html__( 'Circle Loader Animation', 'the-food-truck-progression' ),
	        'cube-grid-pro' => esc_html__( 'Cube Grid Animation', 'the-food-truck-progression' ),
	        'rotating-plane-pro' => esc_html__( 'Rotating Plane Animation', 'the-food-truck-progression' ),
	        'double-bounce-pro' => esc_html__( 'Doube Bounce Animation', 'the-food-truck-progression' ),
	        'sk-rectangle-pro' => esc_html__( 'Rectangle Animation', 'the-food-truck-progression' ),
			'sk-cube-pro' => esc_html__( 'Wandering Cube Animation', 'the-food-truck-progression' ),
			'sk-chasing-dots-pro' => esc_html__( 'Chasing Dots Animation', 'the-food-truck-progression' ),
			'sk-circle-child-pro' => esc_html__( 'Circle Animation', 'the-food-truck-progression' ),
			'sk-folding-cube' => esc_html__( 'Folding Cube Animation', 'the-food-truck-progression' ),
		
		 ),
		)
	);





	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_text', array(
		'default' => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_text', array(
		'label'    => esc_html__( 'Page Loader Color', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 30,
	) ) 
	);
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_secondary_color', array(
		'default' => '#ededed',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_secondary_color', array(
		'label'    => esc_html__( 'Page Loader Secondary (Circle Loader)', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 31,
	) ) 
	);


	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_bg', array(
		'label'    => esc_html__( 'Page Loader Background', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 35,
	) ) 
	);
	
	
	
	
	
	
	


	/* Section - Footer - Scroll To Top */
	$wp_customize->add_section( 'progression_studios_section_scroll', array(
		'title'          => esc_html__( 'Scroll To Top Button', 'the-food-truck-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 100,
	) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_pro_scroll_top', array(
		'default' => 'scroll-on-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_pro_scroll_top', array(
		'label'    => esc_html__( 'Scroll To Top Button', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 10,
		'choices'     => array(
			'scroll-on-pro' => esc_html__( 'On', 'the-food-truck-progression' ),
			'scroll-off-pro' => esc_html__( 'Off', 'the-food-truck-progression' ),
		),
	) ) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		) 
	);
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_color', array(
		'label'    => esc_html__( 'Color', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 15,
		) ) 
	);


	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_bg_color', array(
		'default' => 'rgba(100,100,100,  0.65)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
		) 
	);
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_bg_color', array(
		'default' => 'rgba(100,100,100,  0.65)',
		'label'    => esc_html__( 'Background', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 20,
		) ) 
	);



	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_color', array(
		'default' => '#3f3f3f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_hvr_color', array(
		'label'    => esc_html__( 'Hover Arrow Color', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 30,
		) ) 
	);
	
	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_bg_color', array(
		'default' => '#f5d500',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_hvr_bg_color', array(
		'default' => '#f5d500',
		'label'    => esc_html__( 'Hover Arrow Background', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 40,
		) ) 
	);


	

	
	
	
	
	
	/* Panel - Header */
	$wp_customize->add_panel( 'progression_studios_header_panel', array(
		'priority'    => 5,
		'title'       => esc_html__( 'Header', 'the-food-truck-progression' ),
		) 
	);
	
	
	/* Section - General - Site Logo */
	$wp_customize->add_section( 'progression_studios_section_logo', array(
		'title'          => esc_html__( 'Logo', 'the-food-truck-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_theme_logo' ,array(
		'default' => get_template_directory_uri().'/images/logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_theme_logo', array(
		'section' => 'progression_studios_section_logo',
		'priority'   => 10,
		))
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_width',array(
		'default' => '260',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_width', array(
		'label'    => esc_html__( 'Logo Width (px)', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_top',array(
		'default' => '30',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_top', array(
		'label'    => esc_html__( 'Logo Margin Top (px)', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_bottom',array(
		'default' => '10',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_bottom', array(
		'label'    => esc_html__( 'Logo Margin Bottom (px)', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	

	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_logo_position' ,array(
		'default' => 'progression-studios-logo-position-center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_logo_position', array(
		'label'    => esc_html__( 'Logo Position', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 50,
		'choices'     => array(
			'progression-studios-logo-position-left' => esc_html__( 'Left', 'the-food-truck-progression' ),
			'progression-studios-logo-position-center' => esc_html__( 'Center (Block)', 'the-food-truck-progression' ),
			'progression-studios-logo-position-right' => esc_html__( 'Right', 'the-food-truck-progression' ),
		),
		))
	);
	


	/* Section - Header - Header Options */
	$wp_customize->add_section( 'progression_studios_section_header_bg', array(
		'title'          => esc_html__( 'Header Options', 'the-food-truck-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 20,
		) 
	);


	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_background_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_header_background_color', array(
		'label'    => esc_html__( 'Header Background Color', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_header_bg',
		'priority'   => 15,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_border_color', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_header_border_color', array(
		'label'    => esc_html__( 'Header Border Color', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_header_bg',
		'priority'   => 16,
		)) 
	);

	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_box_shadow' ,array(
		'default' => 'false',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_box_shadow', array(
		'label'    => esc_html__( 'Header Shadow', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 30,
		'choices'     => array(
			'true' => esc_html__( 'Shadow', 'the-food-truck-progression' ),
			'false' => esc_html__( 'No Shadow', 'the-food-truck-progression' ),
		),
		))
	);

	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_header_bg_image' ,array(	
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_header_bg_image', array(
		'label'    => esc_html__( 'Header Background Image', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 40,
		))
	);
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 50,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'the-food-truck-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'the-food-truck-progression' ),
		),
		))
	);
	
	

	
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_section( 'progression_studios_section_mobile_header', array(
		'title'          => esc_html__( 'Tablet/Mobile Header Options', 'the-food-truck-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 23,
		) 
	);
	
	

	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_transparent' ,array(
		'default' => 'default',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_header_transparent', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Transparent', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 9,
		'choices'     => array(
			'transparent' => esc_html__( 'Transparent', 'the-food-truck-progression' ),
			'default' => esc_html__( 'Default', 'the-food-truck-progression' ),
		),
		))
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_mobile_header_bg', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Background', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 10,
		)) 
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_menu_text' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_menu_text', array(
		'label'    => esc_html__( 'Display "Menu" text for Menu', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 11,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'off' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		),
		))
	);
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_top_bar_left' ,array(
		'default' => 'progression_studios_hide_top_left_bar',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_left', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Top Left', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 12,
		'choices'     => array(
			'on-pro' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'progression_studios_hide_top_left_bar' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		),
		))
	);
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_top_bar_right' ,array(
		'default' => 'progression_studios_hide_top_left_right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_right', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Top Right', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 13,
		'choices'     => array(
			'on-pro' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'progression_studios_hide_top_left_right' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		),
		))
	);

	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_custom_logo_per_page' ,array(
		'default' => 'hide',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_custom_logo_per_page', array(
		'label'    => esc_html__( 'Override Custom Logo Per Page', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 24,
		'choices'     => array(
			'hide' => esc_html__( 'Hide', 'the-food-truck-progression' ),
			'display' => esc_html__( 'Display', 'the-food-truck-progression' ),
		),
		))
	);
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_nav_padding' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_nav_padding', array(
		'label'    => esc_html__( 'Tablet/Mobile Nav Padding', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Optional padding above/below the Navigation. Example: 20', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_width' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_width', array(
		'label'    => esc_html__( 'Tablet/Mobile Logo Width', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Optional logo width. Example: 180', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_margin' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_margin', array(
		'label'    => esc_html__( 'Tablet/Mobile Logo Margin Top/Bottom', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Optional logo margin. Example: 25', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	
	
	
	
	/* Section - Header - Sticky Header
	$wp_customize->add_section( 'progression_studios_section_sticky_header', array(
		'title'          => esc_html__( 'Sticky Header Options', 'the-food-truck-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 25,
		) 
	);
	 */
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_header_sticky' ,array(
		'default' => 'none-sticky-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_sticky', array(
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 10,
		'choices'     => array(
			'sticky-pro' => esc_html__( 'Sticky Header', 'the-food-truck-progression' ),
			'none-sticky-pro' => esc_html__( 'Disable Sticky Header', 'the-food-truck-progression' ),
		),
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_header_background_color', array(
		'default' =>  '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sticky_header_background_color', array(
		'default' =>  '#ffffff',
		'label'    => esc_html__( 'Sticky Header Background', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 15,
		)) 
	);
	



	

	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_logo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_sticky_logo', array(
		'label'    => esc_html__( 'Sticky Logo', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 20,
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_width',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_width', array(
		'label'    => esc_html__( 'Sticky Logo Width (px)', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'the-food-truck-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 30,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_top',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_top', array(
		'label'    => esc_html__( 'Sticky Logo Margin Top (px)', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'the-food-truck-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 40,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_bottom',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_bottom', array(
		'label'    => esc_html__( 'Sticky Logo Margin Bottom (px)', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'the-food-truck-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 50,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_padding',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_nav_padding', array(
		'label'    => esc_html__( 'Sticky Nav Padding Top/Bottom', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 60,
		'choices'     => array(
			'min'  => 0,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color', array(
		'label'    => esc_html__( 'Sticky Nav Font Color', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 70,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color_hover', array(
		'label'    => esc_html__( 'Sticky Nav Font Hover Color', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 80,
		)) 
	);
	
	

	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_bg', array(
		'label'    => esc_html__( 'Sticky Nav Background Color', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 100,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_hover_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_hover_bg', array(
		'label'    => esc_html__( 'Sticky Nav Hover Background', 'the-food-truck-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 105,
		)) 
	);
	
	

	

	
	
	
	
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_align' ,array(
		'default' => 'progression-studios-nav-center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_align', array(
		'label'    => esc_html__( 'Navigation Alignment', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-nav-left' => esc_html__( 'Left', 'the-food-truck-progression' ),
			'progression-studios-nav-center' => esc_html__( 'Center', 'the-food-truck-progression' ),
			'progression-studios-nav-right' => esc_html__( 'Right', 'the-food-truck-progression' ),
		),
		))
	);
	
	


	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_font_size',array(
		'default' => '28',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_font_size', array(
		'label'    => esc_html__( 'Navigation Font Size', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 500,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_padding',array(
		'default' => '26',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_padding', array(
		'label'    => esc_html__( 'Navigation Padding Top/Bottom', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 505,
		'choices'     => array(
			'min'  => 5,
			'max'  => 100,
			'step' => 1
		), ) ) 
	);
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_left_right',array(
		'default' => '28',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_left_right', array(
		'label'    => esc_html__( 'Navigation Padding Left/Right', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 8,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_font_color', array(
		'default'	=> '#ffffff',
		'label'    => esc_html__( 'Navigation Font Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color_hover', array(
		'default'	=> '#d4ca00',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_nav_font_color_hover', array(
		'default'	=> '#d4ca00',
		'label'    => esc_html__( 'Navigation Font Hover Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 530,
		)) 
	);

	

	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_underline', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_underline', array(
		'label'    => esc_html__( 'Navigation Selected Highlight', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Remove by clearing the color.', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 535,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg', array(
		'label'    => esc_html__( 'Navigation Item Background', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg_hover', array(
		'label'    => esc_html__( 'Navigation Item Background Hover', 'the-food-truck-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_letterspacing',array(
		'default' => '-0.01',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_letterspacing', array(
		'label'          => esc_html__( 'Navigation Letter-Spacing', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 540,
		'choices'     => array(
			'min'  => -1,
			'max'  => 1,
			'step' => 0.01
		), ) ) 
	);
	
	

	

	
	
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_border_top', array(
		'default' => '#f5d500',
		'sanitize_callback' => 'sanitize_hex_color',
	) );	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_border_top', array(
		'label'    => esc_html__( 'Sub-Navigation Border Top Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 6,
		)) 
	);
	
	

	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_bg', array(
		'default' => '#242d34',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );	
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_bg', array(
		'default' => '#242d34',
		'label'    => esc_html__( 'Sub-Navigation Background Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 10,
		)) 
	);
	
	
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_font_size',array(
		'default' => '14',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_font_size', array(
		'label'    => esc_html__( 'Sub-Navigation Font Size', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_letterspacing' ,array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_letterspacing', array(
		'label'          => esc_html__( 'Sub-Navigation Letter-Spacing', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 515,
		'choices'     => array(
			'min'  => -1,
			'max'  => 1,
			'step' => 0.01
		), ) ) 
	);

	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_font_color', array(
		'default'	=> 'rgba(255,255,255, 0.7)',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_font_color', array(
		'default'	=> 'rgba(255,255,255, 0.7)',
		'label'    => esc_html__( 'Sub-Navigation Font Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_hover_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_hover_font_color', array(
		'default'	=> '#ffffff',
		'label'    => esc_html__( 'Sub-Navigation Font Hover Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 530,
		)) 
	);
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_border_color', array(
		'default' => 'rgba(255,255,255, 0.1)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_border_color', array(
		'default' => 'rgba(255,255,255, 0.1)',
		'label'    => esc_html__( 'Sub-Navigation Divider Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 540,
		)) 
	);
	




	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_hover_bullet', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_hover_bullet', array(
		'default'	=> '#ffffff',
		'label'    => esc_html__( 'Sub-Navigation Hover Bullet', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 550,
		)) 
	);
	
	
	

	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_sub_nav_bullet_effect' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_sub_nav_bullet_effect', array(
		'label'    => esc_html__( 'Sub-Navigation Hover Effect', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 560,
		'choices'     => array(
			'true' => esc_html__( 'Animate', 'the-food-truck-progression' ),
			'false' => esc_html__( 'No Animation', 'the-food-truck-progression' ),
		),
		))
	);
	

	
	
	

	
	
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_onoff' ,array(
		'default' => 'off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_top_header_onoff', array(
		'label'    => esc_html__( 'Display Top Header Bar?', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 10,
		'choices'     => array(
			'on-pro' => esc_html__( 'On', 'the-food-truck-progression' ),
			'off-pro' => esc_html__( 'Off', 'the-food-truck-progression' ),
		),
		))
	);
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_background', array(
		'default' => '#000000',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_background', array(
		'default' => '#000000',
		'label'    => esc_html__( 'Top Header Background Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 20,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_border_bottom', array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_border_bottom', array(
		'label'    => esc_html__( 'Top Header Border Bottom', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 22,
		)) 
	);
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_top_header_bg_image' ,array(	
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_top_header_bg_image', array(
		'label'    => esc_html__( 'Top Header Background Image', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 23,
		))
	);
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 25,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'the-food-truck-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'the-food-truck-progression' ),
		),
		))
	);
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_font_size', array(
		'label'    => esc_html__( 'Top Header Font Size', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 530,
		'choices'     => array(
			'min'  => 5,
			'max'  => 25,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_padding',array(
		'default' => '16',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_padding', array(
		'label'    => esc_html__( 'Top Header Padding Above/Below', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 535,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_color', array(
		'default' => '#ffffff',
		'label'    => esc_html__( 'Top Header Font/Link Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 550,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_hover_color', array(
		'default' => 'rgba(255,255,255,  0.75)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_hover_color', array(
		'default' => 'rgba(255,255,255,  0.75)',
		'label'    => esc_html__( 'Top Header Font/Link Hover Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 555,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_icon_color', array(
		'default' => '#f5d500',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_icon_color', array(
		'default' => '#f5d500',
		'label'    => esc_html__( 'Top Header Font/Link Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 558,
		)) 
	);
	
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_border_top', array(
		'default' => '#f5d500',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_border_top', array(
		'label'    => esc_html__( 'Sub Navigation Border top', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 560,
		)) 
	);

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_sub_bg', array(
		'default' => '#000000',
		'label'    => esc_html__( 'Sub Navigation Background', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 565,
		)) 
	);

	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_border_clr', array(
		'default' => 'rgba(255,255,255, 0.18)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_sub_border_clr', array(
		'default' => 'rgba(255,255,255, 0.18)',
		'label'    => esc_html__( 'Sub Navigation Border Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 568,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_sub_color', array(
		'default' => '#ffffff',
		'label'    => esc_html__( 'Sub Navigation Font Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 570,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_hover_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_sub_hover_color', array(
		'default' => '#ffffff',
		'label'    => esc_html__( 'Sub Navigation Font Hover Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 575,
		)) 
	);
	
	
	
	
	
	
	
	/* Panel - Body */
	$wp_customize->add_panel( 'progression_studios_body_panel', array(
		'priority'    => 8,
        'title'       => esc_html__( 'Body', 'the-food-truck-progression' ),
    ) );
	 
	 
	 
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_color', array(
 		'default'	=> '#c2b900',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_color', array(
 		'label'    => esc_html__( 'Default Link Color', 'the-food-truck-progression' ),
 		'section'  => 'tt_font_progression-studios-body-font',
 		'priority'   => 500,
 		)) 
 	);

	
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_hover_color', array(
 		'default'	=> '#ad2538',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_hover_color', array(
 		'label'    => esc_html__( 'Default Hover Link Color', 'the-food-truck-progression' ),
 		'section'  => 'tt_font_progression-studios-body-font',
 		'priority'   => 510,
 		)) 
 	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_boxed_background_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_boxed_background_color', array(
		'label'    => esc_html__( 'Boxed Background Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 512,
		)) 
	);

	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_background_color', array(
		'default'	=> '#1d252a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_background_color', array(
		'label'    => esc_html__( 'Body Background Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 513,
		)) 
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image' ,array(		
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_body_bg_image', array(
		'label'    => esc_html__( 'Body Background Image', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 525,
		))
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_body_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 530,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'the-food-truck-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'the-food-truck-progression' ),
		),
		))
	);
	

	

	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_top',array(
		'default' => '120',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_top', array(
		'label'    => esc_html__( 'Page Title Top Padding', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 501,
		'choices'     => array(
			'min'  => 0,
			'max'  => 450,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_bottom',array(
		'default' => '120',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_bottom', array(
		'label'    => esc_html__( 'Page Title Bottom Padding', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 515,
		'choices'     => array(
			'min'  => 0,
			'max'  => 450,
			'step' => 1
		), ) ) 
	);
	
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_page_title_align' ,array(
		'default' => 'center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_title_align', array(
		'label'    => esc_html__( 'Page Title Alignment', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 518,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'the-food-truck-progression' ),
			'center' => esc_html__( 'Center', 'the-food-truck-progression' ),
			'right' => esc_html__( 'Right', 'the-food-truck-progression' ),
		),
		))
	);

	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_page_title_bg_image', array(
		'label'    => esc_html__( 'Page Title Background Image', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-page-title',
		'priority'   => 535,
		))
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_title_image_position', array(
		'section' => 'tt_font_progression-studios-page-title',
		'priority'   => 536,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'the-food-truck-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'the-food-truck-progression' ),
		),
		))
	);
	
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_color', array(
		'default' => '#888888',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_title_bg_color', array(
		'label'    => esc_html__( 'Page Title Background Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 580,
		)) 
	);
	

	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_overlay_color_top', array(
		'default' => 'rgba(0,0,0,0.3)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_page_title_overlay_color_top', array(
		'default' => 'rgba(0,0,0,0.3)',
		'label'    => esc_html__( 'Page Title Gradient Overlay Top', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 600,
		)) 
	);
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_overlay_color', array(
		'default' => 'rgba(0,0,0,0.3)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_page_title_overlay_color', array(
		'default' => 'rgba(0,0,0,0.3)',
		'label'    => esc_html__( 'Page Title Gradient Overlay Bottom', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 600,
		)) 
	);
	
	
	

	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_sidebar_header_border', array(
		'default'	=> '#f2f2f2',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_sidebar_header_border', array(
		'default'	=> '#f2f2f2',
		'label'    => esc_html__( 'Sidebar Heading Border Bottom', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-sidebar-headings',
		'priority'   => 628,
		)) 
	);



	
	
	
	
	/* Section - Blog - Blog Index Post Options */
   $wp_customize->add_section( 'progression_studios_section_blog_index', array(
   	'title'          => esc_html__( 'Blog Archive Options', 'the-food-truck-progression' ),
   	'panel'          => 'progression_studios_blog_panel', // Not typically needed.
   	'priority'       => 20,
   ) 
	);
	
	
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_cat_sidebar' ,array(
		'default' => 'right-sidebar',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_cat_sidebar', array(
		'label'    => esc_html__( 'Archive/Category Sidebar', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 100,
		'choices' => array(
			'left-sidebar' => esc_html__( 'Left', 'the-food-truck-progression' ),
			'right-sidebar' => esc_html__( 'Right', 'the-food-truck-progression' ),
			'no-sidebar' => esc_html__( 'Hidden', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	



	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_index_meta_category_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_index_meta_category_display', array(
		'label'    => esc_html__( 'Category Display', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 332,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_excerpt_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_excerpt_display', array(
		'label'    => esc_html__( 'Excerpt Display', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 333,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_hide' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_hide', array(
		'label'    => esc_html__( 'Display Post Meta', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 334,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	
	
 
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_author_display' ,array(
		'default' => 'false',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_author_display', array(
		'label'    => esc_html__( 'Author Meta', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 335,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_date_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_date_display', array(
		'label'    => esc_html__( 'Date Meta', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 340,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);

	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_comment_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_comment_display', array(
		'label'    => esc_html__( 'Comment Count Meta', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 355,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	
	
	

	
	
	

	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_post_title_padding_top',array(
		'default' => '165',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_post_title_padding_top', array(
		'label'    => esc_html__( 'Post Title Top Padding', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-blog-post-title',
		'priority'   => 520,
		'choices'     => array(
			'min'  => 0,
			'max'  => 450,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_post_title_padding_bottom',array(
		'default' => '165',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_post_title_padding_bottom', array(
		'label'    => esc_html__( 'Post Title Bottom Padding', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-blog-post-title',
		'priority'   => 530,
		'choices'     => array(
			'min'  => 0,
			'max'  => 450,
			'step' => 1
		), ) ) 
	);
	
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_post_title_overlay_color_top', array(
		'default' => 'rgba(0,0,0,0.4)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_post_title_overlay_color_top', array(
		'default' => 'rgba(0,0,0,0.4)',
		'label'    => esc_html__( 'Post Title Gradient Overlay Top', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-blog-post-title',
		'priority'   => 600,
		)) 
	);
	
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_post_title_overlay_color', array(
		'default' => 'rgba(0,0,0,0.4)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_post_title_overlay_color', array(
		'default' => 'rgba(0,0,0,0.4)',
		'label'    => esc_html__( 'Post Title Gradient Overlay Bottom', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-blog-post-title',
		'priority'   => 600,
		)) 
	);
	
  
  
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_post_title_bg_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_post_title_bg_image', array(
		'label'    => esc_html__( 'Post Title Background Image', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-blog-post-title',
		'priority'   => 665,
		))
	);
  



	
   /* Section - Blog - Blog Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_sidebar' ,array(
		'default' => 'none',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_sidebar', array(
		'label'    => esc_html__( 'Blog Post Sidebar', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 10,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'the-food-truck-progression' ),
			'right' => esc_html__( 'Right', 'the-food-truck-progression' ),
			'none' => esc_html__( 'No Sidebar', 'the-food-truck-progression' ),
		),
		))
	);
	
	

	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_index_meta_category_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_index_meta_category_display', array(
		'label'    => esc_html__( 'Category Display', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 20,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_meta_author_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_meta_author_display', array(
		'label'    => esc_html__( 'Author Meta', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 25,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_meta_date_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_meta_date_display', array(
		'label'    => esc_html__( 'Date Meta', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 30,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_meta_comment_display' ,array(
		'default' => 'true',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_meta_comment_display', array(
		'label'    => esc_html__( 'Comment Count Meta', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-blog-post-options',
		'priority'   => 35,
		'choices' => array(
			'true' => esc_html__( 'Display', 'the-food-truck-progression' ),
			'false' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		
		 ),
		))
	);
	
	


	
	
	
	
	

	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font', array(
		'default'	=> '#2e3a43',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font', array(
		'label'    => esc_html__( 'Button Font Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1635,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background', array(
		'default'	=> '#d4ca00',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background', array(
		'label'    => esc_html__( 'Button Background Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1640,
		)) 
	);
	


	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font_hover', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font_hover', array(
		'label'    => esc_html__( 'Button Hover Font Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1650,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background_hover', array(
		'default'	=> '#2e3a43',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background_hover', array(
		'label'    => esc_html__( 'Button Hover Background Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1680,
		)) 
	);
	
	

	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_font_size',array(
		'default' => '14',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_font_size', array(
		'label'    => esc_html__( 'Button Font Size', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1700,
		'choices'     => array(
			'min'  => 4,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_letter_spacing',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_letter_spacing', array(
		'label'    => esc_html__( 'Button Letter Spacing', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1710,
		'choices'     => array(
			'min'  => -2,
			'max'  => 2,
			'step' => 0.01
		), ) ) 
	);


	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_bordr_radius',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_bordr_radius', array(
		'label'    => esc_html__( 'Button Border Radius', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1750,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_ionput_bordr_radius',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_ionput_bordr_radius', array(
		'label'    => esc_html__( 'Input Border Radius', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1750,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_input_background', array(
		'default'	=> '#f2f2f2',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_input_background', array(
		'default'	=> '#f2f2f2',
		'label'    => esc_html__( 'Form Input Background Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1790,
		)) 
	);
	

	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_input_border', array(
		'default'	=> '#f2f2f2',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_input_border', array(
		'default'	=> '#f2f2f2',
		'label'    => esc_html__( 'Form Input Border Color', 'the-food-truck-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1790,
		)) 
	);
	


	/* Panel - Footer Top LEvel
	$wp_customize->add_panel( 'progression_studios_footer_panel', array(
		'priority'    => 11,
        'title'       => esc_html__( 'Footer', 'the-food-truck-progression' ),
    ) 
 	);
	*/
	
	
	/* Section - General - General Layout */
	$wp_customize->add_section( 'progression_studios_section_footer_section', array(
		'title'          => esc_html__( 'Footer', 'the-food-truck-progression' ),
		/* 'panel'          => 'progression_studios_footer_panel',*/  // Not typically needed.
		'priority'       => 11,
		) 
	);
	
	/* Setting - Footer Elementor 
	https://gist.github.com/ajskelton/27369df4a529ac38ec83980f244a7227
	*/
	$progression_studios_elementor_library_list =  array(
		'' => 'Choose a template',
	);
	$progression_studios_elementor_args = array('post_type' => 'elementor_library', 'posts_per_page' => 99);
	$progression_studios_elementor_posts = get_posts( $progression_studios_elementor_args );
	foreach($progression_studios_elementor_posts as $progression_studios_elementor_post) {
	    $progression_studios_elementor_library_list[$progression_studios_elementor_post->ID] = $progression_studios_elementor_post->post_title;
	}
	
	$wp_customize->add_setting( 'progression_studios_footer_elementor_library' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_footer_elementor_library', array(
	  'type' => 'select',
	  'section' => 'progression_studios_section_footer_section',
	  'priority'   => 5,
	  'label'    => esc_html__( 'Footer Elementor Template', 'the-food-truck-progression' ),
	  'description'    => esc_html__( 'You can add/edit your footer under ', 'the-food-truck-progression') . '<a href="' . admin_url() . 'edit.php?post_type=elementor_library">Elementor > Templates</a>',
	  'choices'  => 	   $progression_studios_elementor_library_list,
	) );
	




	
	/* Setting - Footer - Footer Main */
 	$wp_customize->add_setting( 'progression_studios_footer_background', array(
 		'default'	=> '#d4ca00',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_background', array(
 		'label'    => esc_html__( 'Copyright Background', 'the-food-truck-progression' ),
 		'section' => 'progression_studios_section_footer_section',
 		'priority'   => 501,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
 		)) 
 	);



	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_footer_copyright' ,array(
		'default' =>  'All Rights Reserved. Developed by <strong>Progression Studios</strong>',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control( 'progression_studios_footer_copyright', array(
		'label'          => esc_html__( 'Copyright Text', 'the-food-truck-progression' ),
 	  'description'    => esc_html__( 'This default text will be replaced if you use a template above.', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'type' => 'textarea',
		'priority'   => 10,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		)
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_text_color', array(
		'default' => 'rgba(255,255,255,0.7)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_copyright_text_color', array(
		'default' => 'rgba(255,255,255,0.7)',
		'label'    => esc_html__( 'Copyright Text Color', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 525,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		)) 
	);

	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link', array(
		'default' => '#838ba3',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_copyright_link', array(
		'default' => '#838ba3',
		'label'    => esc_html__( 'Copyright Link Color', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 530,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		)) 
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link_hover', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_copyright_link_hover', array(
		'default' => '#ffffff',
		'label'    => esc_html__( 'Copyright Link Hover Color', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 540,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		)) 
	);
	
	

	
 	
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_copyright_location' ,array(
		'default' => 'footer-copyright-align-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_copyright_location', array(
		'label'    => esc_html__( 'Copyright Text Alignment', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 19,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		'choices'     => array(
			'footer-copyright-align-left' => esc_html__( 'Left', 'the-food-truck-progression' ),
			'footer-copyright-align-center' => esc_html__( 'Center', 'the-food-truck-progression' ),
			'footer-copyright-align-right' => esc_html__( 'Right', 'the-food-truck-progression' ),
		),
		))
	);
	
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_top',array(
		'default' => '40',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_top', array(
		'label'    => esc_html__( 'Copyright Padding Top', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 20,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_bottom',array(
		'default' => '40',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_bottom', array(
		'label'    => esc_html__( 'Copyright Padding Bottom', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_footer_section',
		'priority'   => 22,
		'active_callback' => function() use ( $wp_customize ) {
		        return '' === $wp_customize->get_setting( 'progression_studios_footer_elementor_library' )->value();
		    },
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);

  
  
   
	
	
	
	
	/* Panel - Body */
	$wp_customize->add_panel( 'progression_studios_blog_panel', array(
		'priority'    => 9,
        'title'       => esc_html__( 'Blog', 'the-food-truck-progression' ),
    ) );
	
	


	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link', array(
		'default' => '#2e3a43',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link', array(
		'label'    => esc_html__( 'Default Title Color', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 5,
		)) 
	);
	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link_hover', array(
		'default' => '#526471',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link_hover', array(
		'label'    => esc_html__( 'Default Title Hover Color', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 10,
		)) 
	);
	


	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_content_bg', array(
		'default' => '#f2f2f2',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_blog_content_bg', array(
		'default' => '#f2f2f2',
		'label'    => esc_html__( 'Content Background', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 15,
		)) 
	);
	
	

	
	


	

	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_icon_position' ,array(
		'default' => 'header-top-right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_icon_position', array(
		'label'    => esc_html__( 'Display Social Icons?', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_icons_section',
		'priority'   => 2,
		'choices'     => array(
			'default' => esc_html__( 'Nav', 'the-food-truck-progression' ),
			'header-top-left' => esc_html__( 'Top Left', 'the-food-truck-progression' ),
			'header-top-right' => esc_html__( 'Top Right', 'the-food-truck-progression' ),
			'header-top-hidden' => esc_html__( 'Hidden', 'the-food-truck-progression' ),
		),
		))
	);

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_social_icons_margintop',array(
		'default' => '8',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_social_icons_margintop', array(
		'label'    => esc_html__( 'Icon Margin Top', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_icons_section',
		'priority'   => 3,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_social_icons_font_size',array(
		'default' => '19',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_social_icons_font_size', array(
		'label'    => esc_html__( 'Icon Font Size', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_icons_section',
		'priority'   => 4,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1
		), ) ) 
	);
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_social_icons_color', array(
		'default'	=> '#f5d500',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_social_icons_color', array(
		'default'	=> '#f5d500',
		'label'    => esc_html__( 'Icon Color', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_icons_section',
		'priority'   => 5,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_social_icons_bg', array(
		'default'	=> 'rgba(255,255,255,  0)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_social_icons_bg', array(
		'default'	=> 'rgba(255,255,255,  0)',
		'label'    => esc_html__( 'Icon Background', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_icons_section',
		'priority'   => 7,
		)) 
	);
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_social_icons_hover_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_social_icons_hover_color', array(
		'default'	=> '#ffffff',
		'label'    => esc_html__( 'Icon Hover Color', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_icons_section',
		'priority'   => 8,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_social_icons_hover_bg', array(
		'default'	=> 'rgba(255,255,255,  0)',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_social_icons_hover_bg', array(
		'default'	=> 'rgba(255,255,255,  0)',
		'label'    => esc_html__( 'Icon Hover Background', 'the-food-truck-progression' ),
		'section' => 'progression_studios_section_header_icons_section',
		'priority'   => 9,
		)) 
	);
	
	
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_related_products' ,array(
		'default' => 'none',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_related_products', array(
		'label'    => esc_html__( 'Related Products', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-shop-styles',
		'priority'   => 10,
		'choices'     => array(
			'block' => esc_html__( 'Show', 'the-food-truck-progression' ),
			'none' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		),
		))
	);
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_category_count' ,array(
		'default' => 'none',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_category_count', array(
		'label'    => esc_html__( 'Category Index Count', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-shop-styles',
		'priority'   => 10,
		'choices'     => array(
			'block' => esc_html__( 'Show', 'the-food-truck-progression' ),
			'none' => esc_html__( 'Hide', 'the-food-truck-progression' ),
		),
		))
	);
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_tab_highlight', array(
		'default'	=> '#2e3a43',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_shop_post_tab_highlight', array(
		'default'	=> '#2e3a43',
		'label'    => esc_html__( 'Shop Post Tab Highlight', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-shop-styles',
		'priority'   => 2500,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_base_background', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new Progression_Studios_Revised_Alpha_Color_Control($wp_customize, 'progression_studios_shop_post_base_background', array(
		'default'	=> '#ffffff',
		'label'    => esc_html__( 'Shop Post Tab Background', 'the-food-truck-progression' ),
		'section' => 'tt_font_progression-studios-shop-styles',
		'priority'   => 2550,
		)) 
	);
	
	

	
	
}
add_action( 'customize_register', 'progression_studios_customizer' );

//HTML Text
function progression_studios_sanitize_customizer( $input ) {
    return wp_kses( $input, TRUE);
}

//no-HTML text
function progression_studios_sanitize_choices( $input ) {
	return wp_filter_nohtml_kses( $input );
}

function progression_studios_customizer_styles() {
	global $post;
	
	//https://codex.wordpress.org/Function_Reference/wp_add_inline_style
	wp_enqueue_style( 'progression-studios-custom-style', get_template_directory_uri() . '/css/progression_studios_custom_styles.css' );

   if ( get_theme_mod( 'progression_studios_header_bg_image')  ) {
      $progression_studios_header_bg_image = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_header_bg_image' ) ) . ");";
	}	else {
		$progression_studios_header_bg_image = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_bg_image')  ) {
      $progression_studios_top_header_bg_image = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_top_header_bg_image' ) ) . ");";
	}	else {
		$progression_studios_top_header_bg_image = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_bg_image_image_position', 'cover') == 'cover' ) {
      $progression_studios_top_header_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_top_header_bg_cover = "background-repeat:repeat-all; ";
	}
	
	
   if ( get_theme_mod( 'progression_studios_sub_nav_border_top', '#f5d500') ) {
      $progression_studios_sub_nav_brder_top = "ul#progression-studios-panel-login, #progression-checkout-basket, #panel-search-progression, .sf-menu ul {border-top:2px solid " .  esc_attr( get_theme_mod('progression_studios_sub_nav_border_top', '#f5d500') ) . "; }";
	}	else {
		$progression_studios_sub_nav_brder_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_sub_border_top', '#f5d500') ) {
      $progression_studios_top_header_sub_nav_brder_top = "#the-food-truck-progression-header-top .sf-menu ul {border-top:3px solid " .  esc_attr( get_theme_mod('progression_studios_top_header_sub_border_top', '#f5d500') ) . "; }";
	}	else {
		$progression_studios_top_header_sub_nav_brder_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_bg_image_image_position', 'cover') == 'cover' ) {
      $progression_studios_header_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_header_bg_cover = "background-repeat:repeat-all; ";
	}
	
   if ( get_theme_mod( 'progression_studios_body_bg_image') ) {
      $progression_studios_body_bg = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_body_bg_image') ). ");";
	}	else {
		$progression_studios_body_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_page_title_bg_image') ) {
      $progression_studios_page_title_bg = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_page_title_bg_image') ). ");";
	}	else {
		$progression_studios_page_title_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_portfolio_title_bg_image') ) {
      $progression_studios_portfolio_title_bg = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_portfolio_title_bg_image') ). ");";
	}	else {
		$progression_studios_portfolio_title_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_post_title_bg_image') ) {
      $progression_studios_post_title_bg = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_post_title_bg_image') ). ");";
	}	else {
		$progression_studios_post_title_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_body_bg_image_image_position', 'cover') == 'cover') {
      $progression_studios_body_bg_cover = "background-attachment: fixed; background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_body_bg_cover = "background-repeat:repeat-all;";
	}
	
   if ( get_theme_mod( 'progression_studios_page_title_image_position', 'cover') == 'cover' ) {
      $progression_studios_page_tite_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_page_tite_bg_cover = "background-repeat:repeat-all;";
	}
	
	if ( get_theme_mod( 'progression_studios_page_title_vertical_height') ) {
      $progression_studios_page_tite_vertical_height = "height:" .   esc_attr( get_theme_mod('progression_studios_page_title_vertical_height', '80') ). "vh;";
	}	else {
		$progression_studios_page_tite_vertical_height = "";
	}
	
	
   if ( get_theme_mod( 'progression_studios_post_title_bg_color')  ) {
      $progression_studios_post_tite_bg_color = "background-color: " . esc_attr( get_theme_mod('progression_studios_post_title_bg_color', '#000000') ) . ";";
	}	else {
		$progression_studios_post_tite_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_post_page_title_bg_image')  ) {
      $progression_studios_post_tite_bg_image_post = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_post_page_title_bg_image',  get_template_directory_uri().'/images/page-title.jpg' ) ). ");";
	}	else {
		$progression_studios_post_tite_bg_image_post = "";
	}

	
   if ( get_theme_mod( 'progression_studios_page_post_title_image_position', 'cover') == 'cover' ) {
      $progression_studios_post_tite_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_post_tite_bg_cover = "background-repeat:repeat-all;";
	}
	
   if ( get_theme_mod( 'progression_studios_page_title_overlay_color', 'rgba(0,0,0,0.3)') ) {
      $progression_studios_page_tite_overlay_image_cover = "#progression-studios-post-page-title:before, #page-title-pro:before {
			background: -moz-linear-gradient(top, " .  esc_attr( get_theme_mod('progression_studios_page_title_overlay_color_top', 'rgba(0,0,0,0.3)') ) . " 5%, " .  esc_attr( get_theme_mod('progression_studios_page_title_overlay_color', 'rgba(0,0,0,0.3)') ) . " 100%);
			background: -webkit-linear-gradient(top, " .  esc_attr( get_theme_mod('progression_studios_page_title_overlay_color_top', 'rgba(0,0,0,0.3)') ) . " 5%," .  esc_attr( get_theme_mod('progression_studios_page_title_overlay_color', 'rgba(0,0,0,0.3)') ) . " 100%);
			background: linear-gradient(to bottom, " .  esc_attr( get_theme_mod('progression_studios_page_title_overlay_color_top', 'rgba(0,0,0,0.3)') ) . " 5%, " .  esc_attr( get_theme_mod('progression_studios_page_title_overlay_color', 'rgba(0,0,0,0.3)') ) . " 100%);
		}";
	}	else {
		$progression_studios_page_tite_overlay_image_cover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_post_title_overlay_color', 'rgba(0,0,0,0.4)') ) {
      $progression_studios_post_tite_overlay_image_cover = "body.single-post #page-title-pro:before {
			background: -moz-linear-gradient(top, " .  esc_attr( get_theme_mod('progression_studios_post_title_overlay_color_top', 'rgba(0,0,0,0.4)') ) . " 5%, " .  esc_attr( get_theme_mod('progression_studios_post_title_overlay_color', 'rgba(0,0,0,0.4)') ) . " 100%);
			background: -webkit-linear-gradient(top, " .  esc_attr( get_theme_mod('progression_studios_post_title_overlay_color_top', 'rgba(0,0,0,0.4)') ) . " 5%," .  esc_attr( get_theme_mod('progression_studios_post_title_overlay_color', 'rgba(0,0,0,0.4)') ) . " 100%);
			background: linear-gradient(to bottom, " .  esc_attr( get_theme_mod('progression_studios_post_title_overlay_color_top', 'rgba(0,0,0,0.4)') ) . " 5%, " .  esc_attr( get_theme_mod('progression_studios_post_title_overlay_color', 'rgba(0,0,0,0.4)') ) . " 100%);
		}";
	}	else {
		$progression_studios_post_tite_overlay_image_cover = "";
	}
	
	


   if ( get_theme_mod( 'progression_studios_sticky_logo_width', '0') != '0' ) {
      $progression_studios_sticky_logo_width = "width:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_width', '70') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_width = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_margin_top', '0') != '0' ) {
      $progression_studios_sticky_logo_top = "padding-top:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_top', '31') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_margin_bottom', '0') != '0' ) {
      $progression_studios_sticky_logo_bottom = "padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_bottom', '31') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_bottom = "";
	}
	

   if ( get_theme_mod( 'progression_studios_sticky_nav_padding', '0') != '0' ) {
      $progression_studios_sticky_nav_padding = "
		.progression-sticky-scrolled .progression-mini-banner-icon {
			top:" . esc_attr( (get_theme_mod('progression_studios_sticky_nav_padding') - get_theme_mod('progression_studios_nav_font_size', '28')) - 4 ). "px;
		}
		.progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a {
			margin-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 7 ). "px;
			margin-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 8 ). "px;
		}
		.progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count { top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px; }
		.progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 4  ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 4 ). "px;
		}
		.progression-sticky-scrolled #progression-studios-header-search-icon .progression-icon-search {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 4  ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 4 ). "px;
		}
		.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon {
					padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 5  ). "px;
					padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 5 ). "px;
		}
		.progression-sticky-scrolled .sf-menu a {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px;
		}
			";
	}	else {
		$progression_studios_sticky_nav_padding = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_underline') ) {
      $progression_studios_sticky_nav_underline = "
		.progression-sticky-scrolled .sf-menu a:before {
			background:". esc_attr( get_theme_mod('progression_studios_sticky_nav_underline') ). ";
		}
		.progression-sticky-scrolled .sf-menu a:hover:before, .progression-sticky-scrolled .sf-menu li.sfHover a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:". esc_attr( get_theme_mod('progression_studios_sticky_nav_underline') ). ";
		}
			";
	}	else {
		$progression_studios_sticky_nav_underline = "";
	}
	
   if (  get_theme_mod( 'progression_studios_sticky_nav_font_color') ) {
      $progression_studios_sticky_nav_option_font_color = "
			body .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a, 
			body .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a, 
			body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a,
			body .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon,
			body .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a .shopping-cart-header-icon, 
			body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon,
			body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a .shopping-cart-header-icon,
			.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon,
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon,
			.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon,
			.progression-sticky-scrolled .active-mobile-icon-pro .mobile-menu-icon-pro, .progression-sticky-scrolled .mobile-menu-icon-pro,  .progression-sticky-scrolled .mobile-menu-icon-pro:hover,
			.progression-sticky-scrolled  #progression-studios-header-login-container a.progresion-studios-login-icon,
	.progression-sticky-scrolled #progression-studios-header-search-icon .progression-icon-search,
	.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression-sticky-scrolled .sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ) . ";
	}";
	}	else {
		$progression_studios_sticky_nav_option_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover') ) {
      $progression_studios_optional_sticky_nav_font_hover = "
			body .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a:hover,
			body .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a:hover, 
			body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a:hover,
			body .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon:hover,
			body .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a .shopping-cart-header-icon:hover,
			body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon:hover,
			body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a .shopping-cart-header-icon:hover,
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon:hover,
			.progression_studios_force_light_navigation_color .progression-sticky-scrolled  .activated-class #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon,
			.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon:hover,
			.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  .activated-class #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon,
		.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon:hover,
		.progression-sticky-scrolled .activated-class #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon,
		.progression-sticky-scrolled #progression-studios-header-search-icon:hover .progression-icon-search, .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro .progression-icon-search, .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, .progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
	}";
	}	else {
		$progression_studios_optional_sticky_nav_font_hover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_nav_bg') ) {
      $progression_studios_optional_nav_bg = "background:" . esc_attr( get_theme_mod('progression_studios_nav_bg') ). ";";
	}	else {
		$progression_studios_optional_nav_bg = "";
	}
	

	
	
   if ( get_theme_mod( 'progression_studios_nav_underline') ) {
      $progression_studios_sticky_nav_underline_default = "
		.sf-menu a:before {
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline', '#f5d500') ). ";
		}
		.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline', '#f5d500') ). ";
		}
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before,
	
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline', '#f5d500') ). ";
		}
			";
	}	else {
		$progression_studios_sticky_nav_underline_default = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_onoff', 'off-pro') == 'off-pro' ) {
      $progression_studios_top_header_off_on_display = "display:none;";
	}	else {
		$progression_studios_top_header_off_on_display = "";
	}
	
   if ( get_theme_mod( 'progression_studios_pro_scroll_top', 'scroll-on-pro') == "scroll-off-pro" ) {
      $progression_studios_scroll_top_disable = "display:none !important;";
	}	else {
		$progression_studios_scroll_top_disable = "";
	}

	
   if ( get_theme_mod( 'progression_studios_nav_bg_hover') ) {
      $progression_studios_optiona_nav_bg_hover = ".sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a { background:".  esc_attr( get_theme_mod('progression_studios_nav_bg_hover') ). "; }";
	}	else {
		$progression_studios_optiona_nav_bg_hover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_bg') ) {
      $progression_studios_optiona_sticky_nav_font_bg = ".progression-sticky-scrolled .sf-menu a { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_font_bg') ). "; }";
	}	else {
		$progression_studios_optiona_sticky_nav_font_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_hover_bg') ) {
      $progression_studios_optiona_sticky_nav_hover_bg = ".progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_font_hover_bg') ). "; }";
	}	else {
		$progression_studios_optiona_sticky_nav_hover_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color') ) {
      $progression_studios_option_sticky_nav_font_color = ".progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon .progression-icon-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon .progression-icon-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a {
		color:". esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ). ";
	}";
	}	else {
		$progression_studios_option_sticky_nav_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover') ) {
      $progression_studios_option_stickY_nav_font_hover_color = ".progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover .progression-icon-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro .progression-icon-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover .progression-icon-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro .progression-icon-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
	}";
	}	else {
		$progression_studios_option_stickY_nav_font_hover_color = "";
	}
	


	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_font') ) {
      $progression_studios_option_sticky_hightlight_font_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.sfHover.highlight-button a, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover { color:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_font') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_button') ) {
      $progression_studios_option_sticky_hightlight_bg_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:before { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_button') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_button_hover') ) {
      $progression_studios_option_sticky_hightlight_bg_color_hover = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,  body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,
	body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_button_hover') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_bg_color_hover = "";
	}

   if ( get_theme_mod( 'progression_studios_mobile_header_bg') ) {
      $progression_studios_mobile_header_bg_color = ".progression-studios-transparent-header header#masthead-pro, header#masthead-pro {background:". esc_attr( get_theme_mod('progression_studios_mobile_header_bg') ) . ";  }";
	}	else {
		$progression_studios_mobile_header_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_logo_width') ) {
      $progression_studios_mobile_header_logo_width = "body #logo-pro img { width:" . esc_attr( get_theme_mod('progression_studios_mobile_header_logo_width') ). "px; } ";
	}	else {
		$progression_studios_mobile_header_logo_width = "";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_logo_margin') ) {
      $progression_studios_mobile_header_logo_margin_top = " body #logo-pro img { padding-top:". esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ). "px; padding-bottom:". esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ). "px; }";
	}	else {
		$progression_studios_mobile_header_logo_margin_top = "";
	}

	
   if ( get_theme_mod( 'progression_studios_header_background_color') ) {
      $progression_studios_header_bg_optional = "
		 header#masthead-pro { background-color:" . esc_attr( get_theme_mod('progression_studios_header_background_color', '#ffffff' ) ) . ";
	}";
	}	else {
		$progression_studios_header_bg_optional = "";
	}

	
   if ( get_theme_mod( 'progression_studios_header_border_color') ) {
      $progression_studios_header_border_optional = "
		 header#masthead-pro:after { display:block; background-color:" . esc_attr( get_theme_mod('progression_studios_header_border_color') ) . ";
	}";
	}	else {
		$progression_studios_header_border_optional = "";
	}

	
   if ( get_theme_mod( 'progression_studios_mobile_header_nav_padding') ) {
      $progression_studios_mobile_header_nav_padding_top = "		body header#masthead-pro #progression-shopping-cart-count span.progression-cart-count {top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding')  ) . "px;}
		body header#masthead-pro .mobile-menu-icon-pro {padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 3 ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px; }
		body header#masthead-pro #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px;
		}";
	}	else {
		$progression_studios_mobile_header_nav_padding_top = "";
	}
	

   if (  function_exists('z_taxonomy_image_url') && z_taxonomy_image_url() ) {
      $progression_studios_custom_tax_page_title_img = "body #page-title-overlay-image {background-image:url('" . esc_url( z_taxonomy_image_url() ) . "'); }";
	}	else {
		$progression_studios_custom_tax_page_title_img = "";
	}
	
   if ( is_singular('portfolio_commotion') && get_post_meta($post->ID, 'progression_studios_header_post_image', true ) ) {
      $progression_studios_custom_portfolio_title_img = "body #page-title-overlay-image {background-image:url('" . esc_url( get_post_meta($post->ID, 'progression_studios_header_post_image', true)) . "'); }";
	}	else {
		$progression_studios_custom_portfolio_title_img = "";
	}
	
   if ( is_page() && get_post_meta($post->ID, 'progression_studios_header_image', true ) ) {
      $progression_studios_custom_page_title_img = "body #page-title-overlay-image {background-image:url('" . esc_url( get_post_meta($post->ID, 'progression_studios_header_image', true)) . "'); }";
	}	else {
		$progression_studios_custom_page_title_img = "";
	}
   if ( class_exists('Woocommerce') ) {
		global $woocommerce;
		$your_shop_page = get_post( wc_get_page_id( 'shop' ) );
		if ( 
		
		is_shop() && $your_shop_page || is_singular( 'product') && $your_shop_page  || is_tax( 'product_cat') && $your_shop_page  || is_tax( 'product_tag') && $your_shop_page ) {
			
			if ( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true ) ) {
				$progression_studios_woo_page_title = "body #page-title-overlay-image {background-image:url('" .  esc_url( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true) ). "'); }";
			} else {
		$progression_studios_woo_page_title = "";
		}
		} else {
		$progression_studios_woo_page_title = "";
	}
	}	else {
		$progression_studios_woo_page_title = "";
	}
   if ( get_option( 'page_for_posts' ) ) {
		$cover_page = get_page( get_option( 'page_for_posts' ));
		 if ( is_home() && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) || is_singular( 'post') && get_post_meta($cover_page->ID, 'progression_studios_header_image', true)|| is_category( ) && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ) {
			$progression_studios_blog_header_img = "body #page-title-overlay-image {background-image:url('" .  esc_url( get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ). "'); }";
		} else {
		$progression_studios_blog_header_img = ""; }
	}	else {
		$progression_studios_blog_header_img = "";
	}


   if ( get_theme_mod( 'progression_studios_header_icon_bg_color') ) {
      $progression_studios_top_header_icon_bg = "background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color') )  . ";";
	}	else {
		$progression_studios_top_header_icon_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_background', '#000000') ) {
      $progression_studios_top_header_background_option = "background-color:" . esc_attr( get_theme_mod('progression_studios_top_header_background', '#000000') )  . ";";
	}	else {
		$progression_studios_top_header_background_option = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_border_bottom') ) {
      $progression_studios_top_header_border_bottom_option = "border-bottom:1px solid " . esc_attr( get_theme_mod('progression_studios_top_header_border_bottom', 'rgba(255,255,255, 0.10)') )  . ";";
	}	else {
		$progression_studios_top_header_border_bottom_option = "";
	}
	


	
 if ( get_theme_mod( 'progression_studios_site_boxed', 'boxed-pro') == 'boxed-pro' ) {
	 $progression_studios_boxed_layout = "
	 	#boxed-layout-pro {
	 		position:relative;
	 		width:". esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;
	 		margin-left:auto; margin-right:auto; 
	 		background-color:". esc_attr( get_theme_mod('progression_studios_boxed_background_color', '#ffffff') ) . ";
	 		box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.15);
	 	}
 	#boxed-layout-pro .width-container-pro { width:90%; }
 	
 	@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) {
		body #boxed-layout-pro{width:92%;}
	}
	
	";
 }	else {
		$progression_studios_boxed_layout = "";
	}
	
	$progression_studios_custom_css = "
	$progression_studios_custom_portfolio_title_img
	$progression_studios_custom_page_title_img
	$progression_studios_woo_page_title
	$progression_studios_custom_tax_page_title_img
	$progression_studios_blog_header_img
	body #logo-pro img {
		width:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_width', '260') ) . "px;
		padding-top:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_margin_top', '30') ) . "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_margin_bottom', '10') ) . "px;
	}
	#progression-studios-woocommerce-single-top .product_meta a:hover,
	a, ul.progression-post-meta a:hover {
		color:" .  esc_attr( get_theme_mod('progression_studios_default_link_color', '#c2b900') ) . ";
	}
	a:hover {
		color:" .  esc_attr( get_theme_mod('progression_studios_default_link_hover_color', '#898300') ). ";
	}
	#the-food-truck-progression-header-top .sf-mega, header ul .sf-mega {margin-left:-" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') / 2 ) . "px; width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;}
	body .elementor-section.elementor-section-boxed > .elementor-container {max-width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;}
	.width-container-pro {  width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px; }
	$progression_studios_header_bg_optional
	$progression_studios_header_border_optional
	body.progression-studios-header-sidebar-before #progression-inline-icons .progression-studios-social-icons, body.progression-studios-header-sidebar-before:before, header#masthead-pro {
		$progression_studios_header_bg_image
		$progression_studios_header_bg_cover
	}
	body {
		background-color:" .   esc_attr( get_theme_mod('progression_studios_background_color', '#1d252a') ). ";
		$progression_studios_body_bg
		$progression_studios_body_bg_cover
	}
	#page-title-pro {
		background-color:" .   esc_attr( get_theme_mod('progression_studios_page_title_bg_color', '#888888') ). ";
		$progression_studios_page_tite_vertical_height
	}
	#page-title-overlay-image {
		$progression_studios_page_title_bg
		$progression_studios_page_tite_bg_cover
	}
	body.single-portfolio_sinew_progression #page-title-overlay-image {
		$progression_studios_portfolio_title_bg
	}
	body.single-post #page-title-overlay-image { 
		$progression_studios_post_title_bg 
		$progression_studios_page_tite_bg_cover
	}
	#progression-studios-page-title-container {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '120') ). "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '120') ). "px;
		text-align:" .  esc_attr( get_theme_mod('progression_studios_page_title_align', 'center') ). ";
	}
	body.single-post #progression-studios-page-title-container {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_post_title_padding_top', '165') ). "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_post_title_padding_bottom', '165') ). "px;
	}
	#progression-studios-post-page-title {
		background-color:" .   esc_attr( get_theme_mod('progression_studios_page_title_bg_color', '#888888') ). ";
		$progression_studios_page_title_bg
		$progression_studios_page_tite_bg_cover
		padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title__postpadding_top', '130') ). "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_page_title_post_padding_bottom', '125') ). "px;
	}
	$progression_studios_page_tite_overlay_image_cover
	$progression_studios_post_tite_overlay_image_cover
	.sidebar h4.widget-title:after { background-color:" .   esc_attr( get_theme_mod('progression_studios_sidebar_header_border', '#f2f2f2') ). "; }
	ul.progression-studios-header-social-icons li a {
		font-size:". esc_attr( get_theme_mod('progression_studios_social_icons_font_size', '19') ) . "px;
		margin-top:". esc_attr( get_theme_mod('progression_studios_social_icons_margintop', '8') ) . "px;
		margin-bottom:". esc_attr( get_theme_mod('progression_studios_social_icons_margintop', '8') - 4 ) . "px;
		background:". esc_attr( get_theme_mod('progression_studios_social_icons_bg', 'rgba(255,255,255,  0)') ) . ";
		color:". esc_attr( get_theme_mod('progression_studios_social_icons_color', '#f5d500') ) . ";
		width:". esc_attr( get_theme_mod('progression_studios_social_icons_font_size', '19') + 10 ) . "px;
		height:". esc_attr( get_theme_mod('progression_studios_social_icons_font_size', '19') + 10 ) . "px;
		line-height:". esc_attr( get_theme_mod('progression_studios_social_icons_font_size', '19') + 10 ) . "px;
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a {
		color:". esc_attr( get_theme_mod('progression_studios_social_icons_color', '#f5d500') ) . ";
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-header-icons-inline-display ul.progression-studios-header-social-icons li a:hover {
		color:". esc_attr( get_theme_mod('progression_studios_social_icons_hover_color', '#ffffff') ) . ";
	}
	#the-food-truck-progression-header-top ul.progression-studios-header-social-icons li a {
		background:". esc_attr( get_theme_mod('progression_studios_social_icons_bg', 'rgba(255,255,255,  0)') ) . ";
		color:". esc_attr( get_theme_mod('progression_studios_social_icons_color', '#f5d500') ) . ";
	}
	#the-food-truck-progression-header-top ul.progression-studios-header-social-icons li a:hover,
	ul.progression-studios-header-social-icons li a:hover {
		background:". esc_attr( get_theme_mod('progression_studios_social_icons_hover_bg', 'rgba(255,255,255,  0)') ) . ";
		color:". esc_attr( get_theme_mod('progression_studios_social_icons_hover_color', '#ffffff') ) . ";
	}
	/* START PORTFOLIO STYLES */
	.progression-portfolio-content {
		background:" . esc_attr( get_theme_mod('progression_studios_portfolio_content_bg', '#ffffff') ) . ";
		border-color:" . esc_attr( get_theme_mod('progression_studios_portfolio_content_border', '#e7e7e7') ) . ";
	}
	.progression-portfolio-vertical-align {
		vertical-align:" . esc_attr( get_theme_mod('progression_studios_portfolio_index_vertical', 'middle') ) . ";
	}
	.progression-studios-overlay-portfolio:hover .progression-portfolio-overlay-hover {
		background:" . esc_attr( get_theme_mod('progression_studios_portfolio_overlay_image_color', 'rgba(32,217,153, 0.95)') ) . ";
	}
	/* END PORTFOLIO STYLES */	
	/* START BLOG STYLES */	
	#page-title-pro.page-title-pro-post-page {
		$progression_studios_post_tite_bg_color
		$progression_studios_post_tite_bg_image_post
		$progression_studios_post_tite_bg_cover
	}
	.progression-blog-content {
		background:" . esc_attr( get_theme_mod('progression_studios_blog_content_bg', '#f2f2f2') ) . ";
	}
	h2.progression-blog-title a {color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link', '#2e3a43') ) . ";}
	h2.progression-blog-title a:hover {color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link_hover', '#526471') ) . ";}
	.progression-portfolio-post-content {background:" . esc_attr( get_theme_mod('progression_studios_portfolio_post_bg', '#ffffff') ) . ";}
	a.progression-studios-overlay-blog-index:before {
		background:" . esc_attr( get_theme_mod('progression_studios_blog_overlay_image_color', 'rgba(0,0,0, 0.5)') ) . ";
	}
	a.progression-studios-overlay-blog-index:hover:before {
		background:" . esc_attr( get_theme_mod('progression_studios_blog_overlay_image_color_hover', 'rgba(32,217,153, 0.95)') ) . ";
	}
	a.progression-studios-overlay-blog-index ul.progression-post-meta {
		border-color:" . esc_attr( get_theme_mod('progression_studios_blog_overlay_meta_divider', 'rgba(255,255,255,0.25)') ) . ";
	}
	.progression-overlay-centering {
		vertical-align:" . esc_attr( get_theme_mod('progression_studios_blog_index_vertical', 'bottom') ) . ";
	}
	.progression-overlay-container {
		height:" . esc_attr( get_theme_mod('progression_studios_blog_overlay_height', '360') ) . "px;
	}
	/* END BLOG STYLES */
	/* START SHOP STYLES */
	#progression-studios-woocommerce-single-bottom .related.products {
			display:" .  esc_attr( get_theme_mod('progression_studios_related_products', 'none') ) . ";
	}
	#content-pro ul.products h2.woocommerce-loop-category__title mark {
			display:" .  esc_attr( get_theme_mod('progression_studios_category_count', 'none') ) . ";
	}
	#progression-studios-woocommerce-single-bottom .woocommerce-tabs ul.wc-tabs li.active a {
			color:" .  esc_attr( get_theme_mod('progression_studios_shop_post_tab_highlight', '#2e3a43') ) . ";
	}
	#progression-studios-woocommerce-single-bottom .woocommerce-tabs ul.wc-tabs li.active {
		border-top-color:" .  esc_attr( get_theme_mod('progression_studios_shop_post_tab_highlight', '#2e3a43') ) . ";
	}
	#progression-studios-woocommerce-single-bottom .woocommerce-tabs ul.wc-tabs li.active,
	#progression-studios-woocommerce-single-bottom {
		background:" .  esc_attr( get_theme_mod('progression_studios_shop_post_base_background', '#ffffff') ) . ";
	}
	/* END SHOP STYLES */
	/* START BUTTON STYLES */
	#content-pro .woocommerce table.shop_table .coupon input#coupon_code, #content-pro .woocommerce table.shop_table input, form.checkout.woocommerce-checkout textarea.input-text, form.checkout.woocommerce-checkout input.input-text,
	.post-password-form input, .search-form input.search-field, .wpcf7 select, #respond textarea, #respond input, .wpcf7-form input, .wpcf7-form textarea {
		background-color:" . esc_attr( get_theme_mod('progression_studios_input_background', '#f2f2f2') ) . ";
		border-color:" . esc_attr( get_theme_mod('progression_studios_input_border', '#f2f2f2') ) . ";
	}
	#progression-studios-woocommerce-single-top .quantity input {
		border-color:" . esc_attr( get_theme_mod('progression_studios_input_border', '#f2f2f2') ) . ";
	}
	.progression-studios-shop-overlay-buttons a.added_to_cart, .wp-block-button a.wp-block-button__link, .post-password-form input[type=submit], #respond input.submit, .wpcf7-form input.wpcf7-submit,
	.infinite-nav-pro a, #boxed-layout-pro .woocommerce .shop_table input.button, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro #customer_login input.button, #boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button  {
		font-size:" . esc_attr( get_theme_mod('progression_studios_button_font_size', '14') ) . "px;
	}
	
	.search-form input.search-field,
	.wp-block-button a.wp-block-button__link,
	.wpcf7 select, .post-password-form input, #respond textarea, #respond input, .wpcf7-form input, .wpcf7-form textarea {
		border-radius:" . esc_attr( get_theme_mod('progression_studios_ionput_bordr_radius', '0') ) . "px;
	}
	#helpmeeout-login-form:before {
		border-bottom: 8px solid " . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
	}
	.wp-block-button.is-style-outline a.wp-block-button__link {
		border-color: " . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
		color: " . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
	}
	.wp-block-button.is-style-outline a.wp-block-button__link:hover {
		background: " . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
	}
	.progression-page-nav a:hover, .progression-page-nav span, #content-pro ul.page-numbers li a:hover, #content-pro ul.page-numbers li span.current {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#2e3a43') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
	}
	.progression-page-nav a:hover span {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#2e3a43') ) . ";
	}
	.flex-direction-nav a:hover, #boxed-layout-pro .woocommerce-shop-single .summary button.button,
	#boxed-layout-pro .woocommerce-shop-single .summary a.button {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#2e3a43') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
	}
	
	.progression-sticky-scrolled header#masthead-pro #progression-checkout-basket a.cart-button-header-cart, #progression-checkout-basket a.cart-button-header-cart, .progression-studios-shop-overlay-buttons a.added_to_cart, .infinite-nav-pro a, .wp-block-button a.wp-block-button__link, .woocommerce form input.button, .woocommerce form input.woocommerce-Button, button.wpneo_donate_button, .sidebar ul.progression-studios-social-widget li a, footer#site-footer .tagcloud a, .tagcloud a, body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a, .post-password-form input[type=submit], #respond input.submit, .wpcf7-form input.wpcf7-submit, #boxed-layout-pro .woocommerce .shop_table input.button, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro #customer_login input.button, #boxed-layout-pro .woocommerce-checkout-payment input.button, #boxed-layout-pro button.button, #boxed-layout-pro a.button {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#2e3a43') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
		border-radius:" . esc_attr( get_theme_mod('progression_studios_button_bordr_radius', '0') ) . "px;
		letter-spacing:" . esc_attr( get_theme_mod('progression_studios_button_letter_spacing', '0') ) . "em;
	}
	.mobile-menu-icon-pro span.progression-mobile-menu-text,
	#boxed-layout-pro .woocommerce-shop-single .summary button.button,
	#boxed-layout-pro .woocommerce-shop-single .summary a.button {
		letter-spacing:" . esc_attr( get_theme_mod('progression_studios_button_letter_spacing', '0') ) . "em;
	}
	body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a { border-radius:0px; }
	
	body .mc4wp-form input[type='submit']:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font_hover', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background_hover', '#2e3a43') ) . ";
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background_hover', '#2e3a43') ) . ";
	}
	
	
	#respond select:focus,
	body #content-pro .width-container-pro .woocommerce textarea:focus, body #content-pro .width-container-pro .woocommerce .shop_table input#coupon_code:focus[type=text], body #content-pro .width-container-pro .woocommerce input:focus[type=text], body #content-pro .width-container-pro .woocommerce input:focus[type=password], body #content-pro .width-container-pro .woocommerce input:focus[type=url], body #content-pro .width-container-pro .woocommerce input:focus[type=tel],body #content-pro .width-container-pro .woocommerce input:focus[type=number], 	body #content-pro .width-container-pro .woocommerce input:focus[type=color], body #content-pro .width-container-pro .woocommerce input:focus[type=email],
	#progression-studios-woocommerce-single-top table.variations td.value select:focus,
	.woocommerce-page form.woocommerce-ordering select:focus,
	#panel-search-progression .search-form input.search-field:focus, body .woocommerce-shop-single table.variations td.value select:focus,  form#mc-embedded-subscribe-form  .mc-field-group input:focus, .wpcf7-form select:focus, .post-password-form input:focus, .search-form input.search-field:focus, #respond textarea:focus, #respond input:focus, .wpcf7-form input:focus, .wpcf7-form textarea:focus,
	.widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-handle {
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
		outline:none;
	}
	#progression-studios-woocommerce-single-top .quantity input:focus, .widget select:focus {
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
		outline:none;
	}
	.rtl blockquote, blockquote, blockquote.alignleft, blockquote.alignright {
		border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
	}
	body .woocommerce .woocommerce-MyAccount-content {
		border-left-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
	}
	body #progression-studios-woocommerce-single-top span.onsale:before, #boxed-layout-pro ul.products li.product span.onsale:before,
	.widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-range {		
		background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
	}
	body #progression-studios-woocommerce-single-top span.onsale, #boxed-layout-pro ul.products li.product span.onsale {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#2e3a43') ) . ";
	}
	.progression-studios-shop-overlay-buttons a.added_to_cart:hover, .infinite-nav-pro a:hover, .wp-block-button a.wp-block-button__link:hover, .woocommerce form input.button:hover, .woocommerce form input.woocommerce-Button:hover, .progression-sticky-scrolled header#masthead-pro #progression-checkout-basket a.cart-button-header-cart:hover, body #progression-checkout-basket a.cart-button-header-cart:hover, #boxed-layout-pro .woocommerce-shop-single .summary button.button:hover, #boxed-layout-pro .woocommerce-shop-single .summary a.button:hover, .progression-studios-blog-cat-overlay a, .progression-studios-blog-cat-overlay a:hover, .sidebar ul.progression-studios-social-widget li a:hover, .tagcloud a:hover, #boxed-layout-pro .woocommerce .shop_table input.button:hover, #boxed-layout-pro .form-submit input#submit:hover, #boxed-layout-pro #customer_login input.button:hover, #boxed-layout-pro .woocommerce-checkout-payment input.button:hover, #boxed-layout-pro button.button:hover, #boxed-layout-pro a.button:hover, .post-password-form input[type=submit]:hover, #respond input.submit:hover, .wpcf7-form input.wpcf7-submit:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_button_font_hover', '#ffffff') ) . ";
		background:" . esc_attr( get_theme_mod('progression_studios_button_background_hover', '#2e3a43') ) . ";
	}
	.sidebar .star-rating, .sidebar .star-rating:before, .comment-form-rating .stars a, .comment-form-rating .stars a:before, .commentlist .star-rating, .commentlist .star-rating:before, #progression-studios-woocommerce-single-top .star-rating, #progression-studios-woocommerce-single-top .star-rating:before, #content-pro ul.products .star-rating, #content-pro ul.products .star-rating:before {
		color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#d4ca00') ) . ";
	}

	.highlight-pro:before {
		background:" . esc_attr( get_theme_mod('progression_studios_button_background_hover', '#2e3a43') ) . ";
	}
	/* END BUTTON STYLES */
	/* START Sticky Nav Styles */
	body.single-post .progression-sticky-scrolled header#masthead-pro, .progression-sticky-scrolled header#masthead-pro, .progression-studios-transparent-header .progression-sticky-scrolled header#masthead-pro { background-color:" .   esc_attr( get_theme_mod('progression_studios_sticky_header_background_color', '#ffffff') ) ."; }
	body .progression-sticky-scrolled #logo-pro img {
		$progression_studios_sticky_logo_width
		$progression_studios_sticky_logo_top
		$progression_studios_sticky_logo_bottom
	}
	$progression_studios_sticky_nav_padding
	$progression_studios_sticky_nav_option_font_color	
	$progression_studios_optional_sticky_nav_font_hover
	$progression_studios_sticky_nav_underline
	/* END Sticky Nav Styles */
	/* START Main Navigation Customizer Styles */
	#progression-shopping-cart-count a.progression-count-icon-nav, nav#site-navigation { letter-spacing: ". esc_attr( get_theme_mod('progression_studios_nav_letterspacing', '-0.01') ). "em; }
	#progression-inline-icons .progression-studios-social-icons a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26') - 3 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26') - 3 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') + 3 ). "px;
	}
	.mobile-menu-icon-pro {
		min-width:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') + 6 ). "px;
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ) . ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26') - 3 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26') - 5 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') + 6 ). "px;
	}
	.mobile-menu-icon-pro:hover {
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ) . ";
	}
	.active-mobile-icon-pro .mobile-menu-icon-pro {
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color_hover', '#d4ca00') ) . ";
	}
	.mobile-menu-icon-pro span.progression-mobile-menu-text {
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') ). "px;
	}
	#progression-shopping-cart-count span.progression-cart-count {
		top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26') - 1). "px;
	}
	#progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26') - 5 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26') - 5 ). "px;
		height:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') + 10 ). "px;
		line-height:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') + 10 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') + 10 ). "px;
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a .shopping-cart-header-icon,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a .shopping-cart-header-icon {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a .shopping-cart-header-icon:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a .shopping-cart-header-icon:hover, .activated-class #progression-shopping-cart-count a.progression-count-icon-nav .shopping-cart-header-icon, #progression-shopping-cart-count a.progression-count-icon-nav:hover .shopping-cart-header-icon {
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color_hover', '#d4ca00') ) . ";
	}
	#progression-studios-header-search-icon .progression-icon-search {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26')  - 4 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26') - 4 ). "px;
		height:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') + 8 ). "px;
		line-height:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') + 8 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') + 8 ). "px;
	}
	nav#site-navigation {
	}
	.sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26')   ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '26') ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '28') ). "px;
		$progression_studios_optional_nav_bg
	}
	.sf-menu li li a {
		margin-top:auto;
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon .progression-icon-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon .progression-icon-search,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container a.progresion-studios-login-icon, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a  {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#ffffff') ). ";
	}
	$progression_studios_sticky_nav_underline_default
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover .progression-icon-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro .progression-icon-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container:hover a.progresion-studios-login-icon, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container.helpmeout-activated-class a.progresion-studios-login-icon, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover .progression-icon-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro .progression-icon-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container:hover a.progresion-studios-login-icon, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-login-container.helpmeout-activated-class a.progresion-studios-login-icon, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	#progression-studios-header-login-container:hover a.progresion-studios-login-icon, #progression-studios-header-login-container.helpmeout-activated-class a.progresion-studios-login-icon,
	#progression-studios-header-search-icon:hover .progression-icon-search, #progression-studios-header-search-icon.active-search-icon-pro .progression-icon-search, #progression-inline-icons .progression-studios-social-icons a:hover, #progression-shopping-cart-count a.progression-count-icon-nav:hover, .sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a {
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color_hover', '#d4ca00') ) . ";
	}
	ul#progression-studios-panel-login, #progression-checkout-basket, #panel-search-progression, .sf-menu ul {
		background:".  esc_attr( get_theme_mod('progression_studios_sub_nav_bg', '#242d34') ). ";
	}
	$progression_studios_top_header_sub_nav_brder_top
	$progression_studios_sub_nav_brder_top
	#main-nav-mobile { background:".  esc_attr( get_theme_mod('progression_studios_sub_nav_bg', '#242d34') ). "; }
	ul.mobile-menu-pro li a { color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_hover_font_color', '#ffffff') ) . "; }
	ul.mobile-menu-pro li a {
		letter-spacing:".  esc_attr( get_theme_mod('progression_studios_sub_nav_letterspacing', '0') ). "em;
	}
	ul#progression-studios-panel-login li a, .sf-menu li li a { 
		letter-spacing:".  esc_attr( get_theme_mod('progression_studios_sub_nav_letterspacing', '0') ). "em;
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '14') ). "px;
	}
	ul#progression-studios-panel-login, #panel-search-progression input, #progression-checkout-basket ul#progression-cart-small li.empty { 
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '14' ) ). "px;
	}
	ul#progression-studios-panel-login a,
	.progression-sticky-scrolled #progression-checkout-basket, .progression-sticky-scrolled #progression-checkout-basket a, .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #panel-search-progression .search-form input.search-field, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover.highlight-button li a, .sf-menu li.current-menu-item.highlight-button li a, .progression-sticky-scrolled #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket, #progression-checkout-basket a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_font_color', 'rgba(255,255,255, 0.7)') ) . ";
	}
	.sf-menu li li .progression-studios-menu-title:before { background:" . esc_attr( get_theme_mod('progression_studios_sub_nav_hover_bullet', '#ffffff') ) . "; }
	.progression-sticky-scrolled ul#progression-studios-panel-login li a:hover, .progression-sticky-scrolled .sf-menu li li a:hover,  .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.current-menu-item li a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a { 
		background:none;
	}
	ul.mobile-menu-pro li a, ul.mobile-menu-pro .sf-mega h2.mega-menu-heading,
	body #progression-sticky-header header ul.mobile-menu-pro h2.mega-menu-heading a,
	ul.mobile-menu-pro .sf-mega h2.mega-menu-heading a, ul.mobile-menu-pro .sf-mega h2.mega-menu-heading,
	ody #progression-sticky-header header ul.mobile-menu-pro h2.mega-menu-heading a,
	body header ul.mobile-menu-pro .sf-mega h2.mega-menu-heading a,
	.progression-sticky-scrolled #progression-checkout-basket a:hover, .progression-sticky-scrolled #progression-checkout-basket ul#progression-cart-small li h6, .progression-sticky-scrolled #progression-checkout-basket .progression-sub-total span.total-number-add, .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover.highlight-button li a:hover, .sf-menu li.current-menu-item.highlight-button li a:hover, #progression-checkout-basket a.checkout-button-header-cart, #progression-checkout-basket a:hover, #progression-checkout-basket ul#progression-cart-small li h6, #progression-checkout-basket .progression-sub-total span.total-number-add, .sf-menu li.sfHover li a:hover, .sf-menu li.sfHover li.sfHover a, .sf-menu li.sfHover li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a { 
		color:". esc_attr( get_theme_mod('progression_studios_sub_nav_hover_font_color', '#ffffff') ) . ";
	}
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	#progression-shopping-cart-count span.progression-cart-count { 
		background:" . esc_attr( get_theme_mod('progression_studios_nav_cart_background', '#f5d500') ) . "; 
		color:" . esc_attr( get_theme_mod('progression_studios_nav_cart_color', '#3f3f3f') ) . ";
	}
	ul.mobile-menu-pro .sf-mega .sf-mega-section li a, ul.mobile-menu-pro .sf-mega .sf-mega-section, ul.mobile-menu-pro.collapsed li a,
	ul#progression-studios-panel-login li a, #progression-checkout-basket ul#progression-cart-small li, #progression-checkout-basket .progression-sub-total, #panel-search-progression .search-form input.search-field, .sf-mega li:last-child li a, body header .sf-mega li:last-child li a, .sf-menu li li a, .sf-mega h2.mega-menu-heading, .sf-mega ul, body .sf-mega ul, #progression-checkout-basket .progression-sub-total, #progression-checkout-basket ul#progression-cart-small li { 
		border-color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_border_color', 'rgba(255,255,255, 0.1)') ) . ";
	}
	#progression-inline-icons .progression-studios-social-icons a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') -  7 ). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 7 ). "px;
	}
	#progression-inline-icons .progression-studios-social-icons {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 7 ). "px;
	}
	.sf-menu a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') ). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') ). "px;
	}
	.sf-arrows .sf-with-ul {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') + 15 ) . "px;
	}
	.sf-arrows .sf-with-ul:after { 
		right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') + 9 ) . "px;
	}
	.rtl .sf-arrows .sf-with-ul {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28')  ) . "px;
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') + 15 ) . "px;
	}
	.rtl  .sf-arrows ul .sf-with-ul {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28')  ) . "px;
		padding-right:0px;
	}
	.rtl  .sf-arrows .sf-with-ul:after { 
		right:auto;
		left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28')  ) . "px;
	}
	.rtl  .sf-arrows ul .sf-with-ul:after { 
		right:auto;
		left:8px;
	}
	@media only screen and (min-width: 960px) and (max-width: 1300px) {
		.sf-menu a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 4 ). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 4 ). "px;
		}
		.sf-menu li.highlight-button { 
			margin-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 12 ). "px;
			margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 12 ). "px;
		}
		.sf-menu li.highlight-button a {
			padding-right:". esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 12 ) . "px;
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 12 ) . "px;
		}
		.sf-arrows .sf-with-ul {
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') + 13 ). "px;
		}
		.sf-arrows .sf-with-ul:after { 
			right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') + 7 ). "px;
		}
		.rtl  .sf-arrows .sf-with-ul:after { 
			right:auto;
			left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') + 7  ) . "px;
		}
		.rtl .sf-arrows .sf-with-ul {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28')  ). "px;
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') + 13 ). "px;
		}
		.rtl .sf-arrows .sf-with-ul:after { 
			right:auto;
			left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') + 7 ). "px;
		}
		#progression-inline-icons .progression-studios-social-icons a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') -  12 ). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 12 ). "px;
		}
		#progression-inline-icons .progression-studios-social-icons {
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '28') - 12 ). "px;
		}
	}
	$progression_studios_optiona_nav_bg_hover
	$progression_studios_optiona_sticky_nav_font_bg	
	$progression_studios_optiona_sticky_nav_hover_bg
	$progression_studios_option_sticky_nav_font_color	
	$progression_studios_option_stickY_nav_font_hover_color
	$progression_studios_option_sticky_hightlight_bg_color
	$progression_studios_option_sticky_hightlight_font_color
	$progression_studios_option_sticky_hightlight_bg_color_hover
	/* END Main Navigation Customizer Styles */
	/* START Top Header Top Styles */
	#the-food-truck-progression-header-top {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') ) . "px;
		$progression_studios_top_header_off_on_display
		$progression_studios_top_header_bg_image
		$progression_studios_top_header_bg_cover
	}
	#the-food-truck-progression-header-top .sf-menu a {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '13') ) . "px;
	}
	.progression-studios-header-left .widget, .progression-studios-header-right .widget {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '16')  ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '16') ) . "px;
	}
	#the-food-truck-progression-header-top .sf-menu a {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '16') + 1  ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '16') + 1 ) . "px;
	}
	#the-food-truck-progression-header-top a, #the-food-truck-progression-header-top .sf-menu a, #the-food-truck-progression-header-top {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_color', '#ffffff') ) . ";
	}
	#the-food-truck-progression-header-top .widget i {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_icon_color', '#f5d500') ) . ";
	}
	#the-food-truck-progression-header-top a:hover, #the-food-truck-progression-header-top .sf-menu a:hover, #the-food-truck-progression-header-top .sf-menu li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_hover_color', 'rgba(255,255,255,  0.75)') ) . ";
	}
	#the-food-truck-progression-header-top .sf-menu ul {
		background:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_bg', '#000000') ) . ";
	}
	#the-food-truck-progression-header-top .sf-menu ul li a { 
		border-color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_border_clr', 'rgba(255,255,255, 0.18)') ) . ";
	}
	.progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #the-food-truck-progression-header-top .sf-menu li.sfHover li a, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li a, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_color', '#ffffff') ) . "; }
	.progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #the-food-truck-progression-header-top .sf-menu li.sfHover li a:hover, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover a, #the-food-truck-progression-header-top .sf-menu li.sfHover li li a:hover, #the-food-truck-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, #the-food-truck-progression-header-top .sf-menu li.sfHover li li li a:hover, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, #the-food-truck-progression-header-top .sf-menu li.sfHover li li li li a:hover, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #the-food-truck-progression-header-top .sf-menu li.sfHover li li li li li a:hover, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #the-food-truck-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_hover_color', '#ffffff') ) . ";
	}
	#the-food-truck-progression-header-top {
		$progression_studios_top_header_background_option
	}
	#progression-studios-header-top-border-bottom {
		$progression_studios_top_header_border_bottom_option
	}
	/* END Top Header Top Styles */
	/* START FOOTER STYLES */
	footer#site-footer {
		background: " . esc_attr(get_theme_mod('progression_studios_footer_background', '#d4ca00')) . ";
	}
	#pro-scroll-top:hover {   color: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_color', '#3f3f3f')) . ";    background: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_bg_color', '#f5d500')) . ";  }
	#copyright-text strong, footer#site-footer #copyright-text {  color: " . esc_attr(get_theme_mod('progression_studios_copyright_text_color', 'rgba(255,255,255,0.7)')) . ";}
	footer#site-footer #progression-studios-copyright a {  color: " . esc_attr(get_theme_mod('progression_studios_copyright_link', '#838ba3')) . ";}
	footer#site-footer #progression-studios-copyright a:hover { color: " . esc_attr(get_theme_mod('progression_studios_copyright_link_hover', '#ffffff')) . "; }
	#pro-scroll-top { $progression_studios_scroll_top_disable color:" . esc_attr(get_theme_mod('progression_studios_scroll_color', '#ffffff')) . ";  background: " . esc_attr(get_theme_mod('progression_studios_scroll_bg_color', 'rgba(100,100,100,  0.65)')) . ";  }
	#copyright-text { padding:" . esc_attr(get_theme_mod('progression_studios_copyright_margin_top', '40')) . "px 0px " . esc_attr(get_theme_mod('progression_studios_copyright_margin_bottom', '40')) . "px 0px; }
	#progression-studios-footer-logo { max-width:" . esc_attr( get_theme_mod('progression_studios_footer_logo_width', '250') ) . "px; padding-top:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_top', '45') ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_bottom', '0') ) . "px; padding-right:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_right', '0') ) . "px; padding-left:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_left', '0') ) . "px; }
	/* END FOOTER STYLES */
	@media only screen and (max-width: 959px) { 
		#progression-studios-page-title-container {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '120') - 40 ). "px;
			padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '120') - 40 ). "px;
		}
		body.single-post #progression-studios-page-title-container {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_post_title_padding_top', '165')- 30 ). "px;
			padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_post_title_padding_bottom', '165')- 30 ). "px;
		}
		$progression_studios_header_bg_optional
		.progression-studios-transparent-header header#masthead-pro {
			$progression_studios_header_bg_image
			$progression_studios_header_bg_cover
		}
		$progression_studios_mobile_header_bg_color
		$progression_studios_mobile_header_logo_width
		$progression_studios_mobile_header_logo_margin_top
		$progression_studios_mobile_header_nav_padding_top
	}
	@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) {
		.width-container-pro {
			width:94%;
			position:relative;
			padding:0px;
		}
		.progression-studios-header-full-width #progression-studios-header-width header#masthead-pro .width-container-pro,
		.progression-studios-header-full-width-no-gap #the-food-truck-progression-header-top .width-container-pro,
		footer#site-footer.progression-studios-footer-full-width .width-container-pro,
		.progression-studios-page-title-full-width #page-title-pro .width-container-pro,
		.progression-studios-header-full-width #the-food-truck-progression-header-top .width-container-pro {
			width:96%;
			position:relative;
			padding:0px;
		}
		.progression-studios-header-full-width-no-gap.progression-studios-header-cart-width-adjustment header#masthead-pro .width-container-pro,
		.progression-studios-header-full-width.progression-studios-header-cart-width-adjustment header#masthead-pro .width-container-pro {
			width:98%;
			margin-left:2%;
			padding-right:0;
		}
		#the-food-truck-progression-header-top ul .sf-mega,
		header ul .sf-mega {
			margin-right:2%;
			width:98%; 
			left:0px;
			margin-left:auto;
		}
	}
	.progression-studios-spinner { border-left-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). ";  border-right-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). "; border-bottom-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). ";  border-top-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). "; }
	.sk-folding-cube .sk-cube:before, .sk-circle .sk-child:before, .sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-fading-circle .sk-circle:before, .sk-cube-grid .sk-cube{ 
		background-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). ";
	}
	#page-loader-pro {
		background:" . esc_attr(get_theme_mod('progression_studios_page_loader_bg', '#ffffff')). ";
		color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). "; 
	}
	$progression_studios_boxed_layout
	
	::-moz-selection {color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#2e3a43') ) . ";}
	::selection {color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#2e3a43') ) . ";}
	";
        wp_add_inline_style( 'progression-studios-custom-style', $progression_studios_custom_css );
}
add_action( 'wp_enqueue_scripts', 'progression_studios_customizer_styles' );