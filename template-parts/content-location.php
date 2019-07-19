<?php
/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="progression-studios-location-index map-popup-<?php the_ID(); ?>">

		<?php if(has_post_thumbnail()): ?>
			<div class="progression-studios-feaured-image"><?php the_post_thumbnail('progression-studios-blog-index'); ?></div><!-- close .progression-studios-feaured-image -->
		<?php endif; ?>
		
		<div class="progression-location-content-container">
			<?php if ( ! empty( $settings['progression_studios_display_cat_posts'] ) ) : ?>
			<?php 
				$terms = get_the_terms( $post->ID , 'food-truck-cat' ); 
				if ( !empty( $terms ) ) :
					echo '<ul class="progression-food-truck-category">';
				foreach ( $terms as $termid ) {
					$term_link = get_term_link( $termid, 'food-truck-cat' );
					if( is_wp_error( $term_link ) )
						continue;
					echo '<li>' . $termid->name . '</li>';
				} 
				echo '</ul>';
			endif;
			?>
			<?php endif; ?>
			<h2 class="progression-location-title"><?php the_title(); ?></h2>
			<div class="progression-location-the-content"><?php the_content(); ?></div>
			<?php if( get_post_meta($post->ID, 'progression_studios_location_time', true)  ): ?>
				<div class="progression-location-time"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html( get_post_meta($post->ID, 'progression_studios_location_time', true) );?></div>
			<?php endif; ?>
			<?php if( get_post_meta($post->ID, 'progression_studios_location_address', true)  ): ?>
				<div class="progression-location-address-text"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo esc_html( get_post_meta($post->ID, 'progression_studios_location_address', true) );?></div>
			<?php endif; ?>
			
		<div class="clearfix-pro"></div>
		</div><!-- close .progression-location-content-container -->
	
	
	<div class="clearfix-pro"></div>
	</div><!-- close .progression-studios-location-index -->
</div><!-- #post-## -->