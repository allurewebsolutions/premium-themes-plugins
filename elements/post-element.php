<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


class Widget_ProgressionElementsPostList extends Widget_Base {

	
	public function get_name() {
		return 'progression-blog-post-list';
	}

	public function get_title() {
		return esc_html__( 'Truck Locations Map', 'progression-elements-food-truck' );
	}

	public function get_icon() {
		return 'fas fa-map-marker-alt progression-studios-food-truck-pe';
	}

   public function get_categories() {
		return [ 'progression-elements-food-truck-cat' ];
	}
	
	public function get_script_depends() { 
		return [ 'boosted_elements_progression_masonry_js', 'boosted_elements_progression_google_maps' ]; 
	}
	
	function Widget_ProgressionElementsPostList($widget_instance){
		
	}
	
	protected function _register_controls() {

		
  		$this->start_controls_section(
  			'section_title_global_options',
  			[
  				'label' => esc_html__( 'Post Settings', 'progression-elements-food-truck' )
  			]
  		);
		
		
		$this->add_control(
			'progression_main_post_count',
			[
				'label' => esc_html__( 'Post Count', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '20',
			]
		);
		
		$this->add_responsive_control(
			'progression_elements_image_grid_column_count',
			[
  				'label' => esc_html__( 'Columns', 'progression-elements-food-truck' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,				
				'desktop_default' => '33.330%',
				'tablet_default' => '50%',
				'mobile_default' => '100%',
				'options' => [
					'100%' => esc_html__( '1 Column', 'progression-elements-food-truck' ),
					'50%' => esc_html__( '2 Column', 'progression-elements-food-truck' ),
					'33.330%' => esc_html__( '3 Columns', 'progression-elements-food-truck' ),
					'25%' => esc_html__( '4 Columns', 'progression-elements-food-truck' ),
					'20%' => esc_html__( '5 Columns', 'progression-elements-food-truck' ),
					'16.67%' => esc_html__( '6 Columns', 'progression-elements-food-truck' ),
				],
				'selectors' => [
					'{{WRAPPER}} .progression-masonry-item' => 'width: {{VALUE}};',
				],
				'render_type' => 'template'
			]
		);
		
		
  		$this->add_responsive_control(
  			'progression_elements_image_grid_margin',
  			[
  				'label' => esc_html__( 'Margin', 'progression-elements-food-truck' ),
  				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 120,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .progression-masonry-margins' => 'margin-left:-{{SIZE}}px; margin-right:-{{SIZE}}px;',
					'{{WRAPPER}} .progression-masonry-padding-blog' => 'padding: {{SIZE}}px;',
				],
				'render_type' => 'template'
  			]
  		);
		
		

		
		$this->add_control(
			'boosted_post_list_masonry',
			[
				'label' => esc_html__( 'Masonry Layout', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
			]
		);
		
		


		
		$this->end_controls_section();
		
  		$this->start_controls_section(
  			'section_title_layout_options',
  			[
  				'label' => esc_html__( 'Post Layout', 'progression-elements-food-truck' )
  			]
  		);
		
		$this->add_control(
			'progression_studios_display_map',
			[
				'label' => esc_html__( 'Display Map', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		
		$this->add_control(
			'progression_studios_display_cat_map',
			[
				'label' => esc_html__( 'Display Category in Map', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_studios_display_posts',
			[
				'label' => esc_html__( 'Display Posts Below', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'progression_studios_display_cat_posts',
			[
				'label' => esc_html__( 'Display Category in Post', 'progression-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		
	
		
		
		$this->end_controls_section();
		
  		$this->start_controls_section(
  			'section_title_map_options',
  			[
  				'label' => esc_html__( 'Map Layout', 'progression-elements-food-truck' )
  			]
  		);

		
  		$this->add_responsive_control(
  			'map_height',
  			[
  				'label' => esc_html__( 'Map Height', 'boosted-elements-progression' ),
  				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 500,
				],
				'range' => [
					'px' => [
						'min' => 80,
						'max' => 1400,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .food-truck-elements-map-mobile-menu-height' => 'height: {{SIZE}}px;',
				],
  			]
  		);
		
  		$this->add_responsive_control(
  			'map_margin_bottom',
  			[
  				'label' => esc_html__( 'Map Margin Bottom', 'boosted-elements-progression' ),
  				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1400,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .food-truck-progression-google-maps-container' => 'margin-bottom: {{SIZE}}px;',
				],
  			]
  		);
		
  		
		
  		$this->add_control(
  			'map_zoom',
  			[
  				'label' => esc_html__( 'Map Zoom', 'boosted-elements-progression' ),
  				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 13,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 22,
					],
				],
  			]
  		);
		
		$this->add_control(
			'map_option_streeview',
			[
				'label' => esc_html__( 'Street View Controls', 'boosted-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		
		
		
		$this->add_control(
			'map_option_maptype_control',
			[
				'label' => esc_html__( 'Map Type Controls Top Right', 'boosted-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		
		$this->add_control(
			'map_option_mapscroll',
			[
				'label' => esc_html__( 'Scroll Wheel Zoom', 'boosted-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
		
		$this->add_control(
			'map_type',
			[
				'label' => esc_html__( 'Map Type', 'boosted-elements-progression' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'ROADMAP',
				'options' => [
					'ROADMAP' => esc_html__( 'Road Map', 'boosted-elements-progression' ),
					'SATELLITE' => esc_html__( 'Satellite', 'boosted-elements-progression' ),
					'TERRAIN' => esc_html__( 'Terrain', 'boosted-elements-progression' ),
					'HYBRID' => esc_html__( 'Hybrid', 'boosted-elements-progression' ),
				],
			]
		);
		
	

		$this->add_control(
			'map_option_single_pin',
			[
				'label' => esc_html__( 'Open One Pin at a Time?', 'boosted-elements-progression' ),
				'type' => Controls_Manager::SWITCHER,
			]
		);
  		
		
		$this->end_controls_section();
		
  		$this->start_controls_section(
  			'section_title_secondary_options',
  			[
  				'label' => esc_html__( 'Post Query', 'progression-elements-food-truck' )
  			]
  		);
		
	
		
		$this->add_control(
			'progression_post_cats',
			[
				'label' => esc_html__( 'Narrow by Category', 'progression-elements-food-truck' ),
				'description' => esc_html__( 'Choose a category to display posts', 'progression-elements-food-truck' ),
				'label_block' => true,
				'multiple' => true,
				'type' => Controls_Manager::SELECT2,
				'options' => unit_five_elements_post_type_categories(),
			]
		);
		
		

		$this->add_control(
			'progression_elements_post_order_sorting',
			[
				'label' => esc_html__( 'Order By', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => esc_html__( 'Default - Date', 'progression-elements-food-truck' ),
					'title' => esc_html__( 'Post Title', 'progression-elements-food-truck' ),
					'menu_order' => esc_html__( 'Menu Order', 'progression-elements-food-truck' ),
					'modified' => esc_html__( 'Last Modified', 'progression-elements-food-truck' ),
					'rand' => esc_html__( 'Random', 'progression-elements-food-truck' ),
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_post_order',
			[
				'label' => esc_html__( 'Order', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC' => esc_html__( 'Ascending', 'progression-elements-food-truck' ),
					'DESC' => esc_html__( 'Descending', 'progression-elements-food-truck' ),
				],
			]
		);
		
		$this->add_control(
			'progression_main_offset_count',
			[
				'label' => esc_html__( 'Offset Count', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '0',
				'description' => esc_html__( 'Use this to skip over posts (Example: 3 would skip the first 3 posts.)', 'progression-elements-food-truck' ),
			]
		);
	
		
		
		
		$this->end_controls_section();
		

	
		$this->start_controls_section(
			'progression_elements_section_main_styles',
			[
				'label' => esc_html__( 'Post Layout Styles', 'progression-elements-food-truck' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'progression_elements_heading_title',
			[
				'label' => esc_html__( 'Title', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
				
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_title_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-food-truck' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h2.progression-location-title',
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_title_color',
			[
				'label' => esc_html__( 'Title Color', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.progression-location-title' => 'color: {{VALUE}}',
				],
			]
		);
		

		
		$this->add_responsive_control(
			'progression_elements_title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} h2.progression-location-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_heading_cat',
			[
				'label' => esc_html__( 'Category', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
				
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_cat_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-food-truck' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} ul.progression-food-truck-category li',
			]
		);
		

		$this->add_control(
			'progression_elements_traditional_cat_color',
			[
				'label' => esc_html__( 'Category Color', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.progression-food-truck-category li' => 'color: {{VALUE}}',
				],
			]
		);
		

		
		$this->add_responsive_control(
			'progression_elements_cat_margin',
			[
				'label' => esc_html__( 'Category Margin', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} ul.progression-food-truck-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_heading_contentt',
			[
				'label' => esc_html__( 'Content', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
				
		
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_content_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-food-truck' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-location-the-content',
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_content_color',
			[
				'label' => esc_html__( 'Content Color', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-location-the-content' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'progression_elements_content_margin',
			[
				'label' => esc_html__( 'Content Padding', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .progression-location-content-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		

		

		$this->add_control(
			'progression_elements_traditional_content_bg',
			[
				'label' => esc_html__( 'Content Background', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-location-content-container' => 'background: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_border_color',
			[
				'label' => esc_html__( 'Content Border Hover', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-studios-location-index:hover .progression-location-content-container' => 'border-color: {{VALUE}}',
				],
			]
		);
		

		$this->add_control(
			'progression_elements_heading_meta',
			[
				'label' => esc_html__( 'Date/Time', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_meta_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-food-truck' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .progression-location-address-text, {{WRAPPER}} .progression-location-time',
			]
		);
		

		$this->add_control(
			'progression_elements_traditionalmeta_order_color',
			[
				'label' => esc_html__( 'Date/Time Border', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-location-time' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_meta_color',
			[
				'label' => esc_html__( 'Date/Time Color', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .progression-location-address-text, {{WRAPPER}} .progression-location-time' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		

		$this->start_controls_section(
			'progression_elements_section_map_styles',
			[
				'label' => esc_html__( 'Map Layout Styles', 'progression-elements-food-truck' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'progression_elements_heading_map_title',
			[
				'label' => esc_html__( 'Title', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
				
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_title__maptypography',
				'label' => esc_html__( 'Typography', 'progression-elements-food-truck' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h2.map-location-title-pro',
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_map_title_color',
			[
				'label' => esc_html__( 'Title Color', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} h2.map-location-title-pro' => 'color: {{VALUE}}',
				],
			]
		);
		

		
		$this->add_responsive_control(
			'progression_elements_map_title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} h2.map-location-title-pro' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_heading_map_cat',
			[
				'label' => esc_html__( 'Category', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
				
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_cat_map_typography',
				'label' => esc_html__( 'Typography', 'progression-elements-food-truck' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .map-location-cate-pro',
			]
		);
		

		$this->add_control(
			'progression_elements_traditional_cat_map_color',
			[
				'label' => esc_html__( 'Category Color', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .map-location-cate-pro' => 'color: {{VALUE}}',
				],
			]
		);
		

		
		$this->add_responsive_control(
			'progression_elements_cat_map_margin',
			[
				'label' => esc_html__( 'Category Margin', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .map-location-cate-pro' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_control(
			'progression_elements_heading_meta_map',
			[
				'label' => esc_html__( 'Date/Time', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'progression_elements_traditional_meta_typography_map',
				'label' => esc_html__( 'Typography', 'progression-elements-food-truck' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .map-location-address-pro, {{WRAPPER}} .map-location-time-pro',
			]
		);
		

		$this->add_control(
			'progression_elements_traditionalmeta_order_color_map',
			[
				'label' => esc_html__( 'Date/Time Border', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .map-location-time-pro' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'progression_elements_traditional_meta_color_map',
			[
				'label' => esc_html__( 'Date/Time Color', 'progression-elements-food-truck' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .map-location-address-pro, {{WRAPPER}} .map-location-time-pro' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		$this->end_controls_section();
		
	}
	

	protected function render( ) {
		
	
	$settings = $this->get_settings();

	global $blogloop;
	global $post;
	
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
	

	$post_per_page = $settings['progression_main_post_count'];
	$offset = $settings['progression_main_offset_count'];
	$offset_new = $offset + (( $paged - 1 ) * $post_per_page);
	
	
	
	if ( ! empty( $settings['progression_post_cats'] ) ) {
		$formatarray = $settings['progression_post_cats']; // get custom field value
		
		$catarray = $settings['progression_post_cats']; // get custom field value
		if($catarray >= 1 ) { 
			$catids = implode(', ', $catarray); 
		} else {
			$catids = '';
		}
		
		if($formatarray >= 1) { 
			$formatids = implode(', ', $formatarray);
         $formatidsexpand = explode(', ', $formatids);
			$formatoperator = 'IN'; 
		} else {
			$formatidsexpand = '';
			$formatoperator = 'NOT IN'; 
		}
		$operator = 'IN';
 	} else {

	 		$formatidsexpand = '';
			$operator = 'NOT IN';
 	}
	

 	$args = array(
 	        'post_type'         => 'locations',
			  'orderby'         => $settings['progression_elements_post_order_sorting'],
			  'order'         => $settings['progression_elements_post_order'],
			  'ignore_sticky_posts' => 1,
			  'posts_per_page'     =>  $post_per_page,
			  'paged' => $paged,
			  'offset' => $offset_new,
			  'tax_query' => array(
				   array(
				 	  'taxonomy' => 'food-truck-cat',
					  'field'    => 'slug',
					  'terms'    => $formatidsexpand,
					  'operator' => $operator
			  		)
			  ),
 	);

	$blogloop = new \WP_Query( $args );
	?>
	
	<?php if ( ! empty( $settings['progression_studios_display_map'] ) ) : ?>
	<div class="food-truck-progression-google-maps-container">
		<div id="food-truck-elements-progression-map-list-<?php echo esc_attr($this->get_id()); ?>" class="food-truck-elements-map-mobile-menu-height"></div>
	</div><!-- close .boosted-elements-progression-google-maps-container -->

	<script type="text/javascript"> 
	jQuery(document).ready(function($) {
		'use strict';
    	$("#food-truck-elements-progression-map-list-<?php echo esc_attr($this->get_id()); ?>").goMap({
       markers: [
			  <?php while($blogloop->have_posts()): $blogloop->the_post();?>
			  	{<?php include(locate_template('template-parts/content-map.php')); ?>},
			 <?php endwhile; wp_reset_query(); ?>
		],
		scrollwheel: <?php if ( ! empty( $settings['map_option_mapscroll'] ) ) : ?>true<?php else: ?>false<?php endif; ?>,
		disableDoubleClickZoom: false, zoom: <?php $width = $this->get_settings( 'map_zoom' );  echo esc_attr($width['size']);  ?>,
		maptype: '<?php echo esc_attr($settings['map_type'] ); ?>',
		streetViewControl:	<?php if ( ! empty( $settings['map_option_streeview'] ) ) : ?>true<?php else: ?>false<?php endif; ?>,
		oneInfoWindow: <?php if ( ! empty( $settings['map_option_single_pin'] ) ) : ?>true<?php else: ?>false<?php endif; ?>,
		mapTypeControl:<?php if ( ! empty( $settings['map_option_maptype_control'] ) ) : ?>true<?php else: ?>false<?php endif; ?>
    });
	 <?php while($blogloop->have_posts()): $blogloop->the_post();?>
	$(".map-popup-<?php the_ID(); ?>").click(function(){  
		$('html, body').animate({ scrollTop: $(".page-content-pro").offset().top - 50 }, 200);
		google.maps.event.trigger($($.goMap.mapId).data('<?php the_ID(); ?>'), 'click'); 
	});
	<?php endwhile; wp_reset_query(); ?>
	});
	</script>
	<?php endif; ?>

	<div class="width-container-pro">

		<?php if ( ! empty( $settings['progression_studios_display_posts'] ) ) : ?>
		<div class="progression-studios-elementor-post-container">

			<div class="progression-masonry-margins">
				<div id="progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?>">
					<?php while($blogloop->have_posts()): $blogloop->the_post();?>	
					<div class="progression-masonry-item ><?php  $terms = get_the_terms( $post->ID , 'category' );  if ( !empty( $terms ) ) : 	foreach ( $terms as $term ) { 	$term_link = get_term_link( $term, 'category' ); if( is_wp_error( $term_link ) ) continue; echo " ". $term->slug ; }  endif; ?>
					"><!-- .progression-masonry-item -->
						<div class="progression-masonry-padding-blog">
							<div class="progression-studios-isotope-animation">
								<?php include(locate_template('template-parts/content-location.php')); ?>
							</div><!-- close .progression-studios-isotope-animation -->
						</div><!-- close .progression-masonry-padding-blog -->
					</div><!-- close .progression-masonry-item -->
					<?php  endwhile; // end of the loop. ?>
				</div><!-- close #progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?>  -->
			</div><!-- close .progression-masonry-margins -->
		
			<div class="clearfix-pro"></div>
		
			
		
		</div><!-- close .progression-studios-elementor-post-container -->
	
		<div class="clearfix-pro"></div>
	
		
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		'use strict';
		
		/* Default Isotope Load Code */
		var $container<?php echo esc_attr($this->get_id()); ?> = $("#progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?>").isotope();
		$container<?php echo esc_attr($this->get_id()); ?>.imagesLoaded( function() {
			$(".progression-masonry-item").addClass("opacity-progression");
			$container<?php echo esc_attr($this->get_id()); ?>.isotope({
				itemSelector: "#progression-blog-index-masonry-<?php echo esc_attr($this->get_id()); ?> .progression-masonry-item",				
				percentPosition: true,
				layoutMode: <?php if ( ! empty( $settings['boosted_post_list_masonry'] ) ) : ?>"masonry"<?php else: ?>"fitRows"<?php endif; ?> 
	 		});
		});
		/* END Default Isotope Code */

	});
	</script>
	<?php endif; ?>

	<?php wp_reset_postdata();?>
	

	<?php
	
	}

	protected function content_template() {
		
		?>

		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_ProgressionElementsPostList() );