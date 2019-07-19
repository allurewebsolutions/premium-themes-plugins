<?php
/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="progression-single-width-container">
		<div id="progression-blog-single-content">

			<?php the_content(); ?>
			
			<?php wp_link_pages( array(
				'before' => '<div class="progression-page-nav">' . esc_html__( 'Pages:', 'the-food-truck-progression' ),
				'after'  => '</div><div class="clearfix-pro"></div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				) );
			?>
			
			<div class="clearfix-pro"></div>
			
			<?php the_tags(  '<div class="tags-progression-studios"><span>' . esc_html__( 'Tags:', 'the-food-truck-progression' ) . '</span>', ',  ', '</div>' ); ?>
			<div class="clearfix-pro"></div>
			

			<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
				<div class="clearfix-pro"></div>

		</div><!-- close #progression-blog-content -->
	</div><!-- close .progression-single-width-container -->
</div><!-- #post-## -->