<?php
namespace Elementor;

function progression_food_truck_elements_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'progression-elements-food-truck-cat',
        [
            'title'  => 'Food Truck Addons',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\progression_food_truck_elements_elementor_init');



//Query Categories List
function unit_five_elements_post_type_categories(){
	//https://developer.wordpress.org/reference/functions/get_terms/
	$terms = get_terms( array( 
		'taxonomy' => 'food-truck-cat',
		'hide_empty' => true,
	));
	
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	foreach ( $terms as $term ) {
		$options[ $term->slug ] = $term->name;
	}
	return $options;
	}
	
	
}



