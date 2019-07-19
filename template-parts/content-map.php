<?php
/**
 * @package pro
 */
?>
<?php if(get_post_meta($post->ID, 'progression_studios_location_address', true)): ?>address: '<?php echo esc_html( get_post_meta($post->ID, 'progression_studios_location_address', true) );?>', id: '<?php the_ID(); ?>',
	<?php if(get_post_meta($post->ID, 'progression_studios_custom_map_icon', true)): ?>icon: '<?php echo esc_attr( get_post_meta($post->ID, 'progression_studios_custom_map_icon', true) );?>',<?php endif; ?>
html: {<?php if(get_post_meta($post->ID, 'progression_studios_open_pin', true)): ?>popup:true,<?php endif; ?>content: "<div class='map-container-text'><?php if ( ! empty( $settings['progression_studios_display_cat_map'] ) ) : ?><?php $terms = get_the_terms( $post->ID , 'food-truck-cat' ); 
	if ( !empty( $terms ) ) :
	foreach ( $terms as $termid ) {
        $term_link = get_term_link( $termid, 'food-truck-cat' );
        if( is_wp_error( $term_link ) )
        continue;
    	echo "<div class='map-location-cate-pro'>" . $termid->name . "</div>";
    } 
	endif;
	?><?php endif; ?><h2 class='map-location-title-pro'><?php the_title(); ?></a></h2><?php if(get_post_meta($post->ID, 'progression_studios_location_time', true)): ?><div class='map-location-time-pro'><i class='fa fa-clock-o' aria-hidden='true'></i><?php echo esc_attr( get_post_meta($post->ID, 'progression_studios_location_time', true) );?></div><?php endif; ?><?php if(get_post_meta($post->ID, 'progression_studios_location_address', true)): ?><div class='map-location-address-pro'><i class='fa fa-map-marker'  aria-hidden='true'></i><?php echo esc_attr( get_post_meta($post->ID, 'progression_studios_location_address', true) );?></div><?php endif; ?></div>"}
<?php endif; ?>