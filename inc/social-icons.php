<?php

function progression_studios_social_customizer( $wp_customize ) {
	
	


	/* Section - General - Site Logo */
	$wp_customize->add_section( 'progression_studios_section_header_icons_section', array(
		'title'          => esc_html__( 'Header Social Icons', 'progression-elements-food-truck' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 800,
		) 
	);
	
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_facebook' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_facebook', array(
		'label'          => esc_html__( 'Facebook Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 10,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_twitter' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_twitter', array(
		'label'          => esc_html__( 'Twitter Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 15,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_instagram' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_instagram', array(
		'label'          => esc_html__( 'Instagram Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 20,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_spotify' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_spotify', array(
		'label'          => esc_html__( 'Spotify Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_youtube' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_youtube', array(
		'label'          => esc_html__( 'Youtube Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_vimeo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_vimeo', array(
		'label'          => esc_html__( 'Vimeo Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_google_plus' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_google_plus', array(
		'label'          => esc_html__( 'Google + Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 40,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_pinterest' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_pinterest', array(
		'label'          => esc_html__( 'Pinterest Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 45,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_soundcloud' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_soundcloud', array(
		'label'          => esc_html__( 'Soundcloud Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 50,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_linkedin' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 52,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_snapchat' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_snapchat', array(
		'label'          => esc_html__( 'Snapchat Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 55,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_tumblr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_tumblr', array(
		'label'          => esc_html__( 'Tumblr Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 60,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_flickr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_flickr', array(
		'label'          => esc_html__( 'Flickr Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 65,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_dribbble' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_dribbble', array(
		'label'          => esc_html__( 'Dribbble Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 70,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_vk' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_vk', array(
		'label'          => esc_html__( 'VK Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 75,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_wordpress' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_wordpress', array(
		'label'          => esc_html__( 'WordPress Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 80,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_houzz' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_houzz', array(
		'label'          => esc_html__( 'Houzz Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 85,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_behance' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_behance', array(
		'label'          => esc_html__( 'Behance Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 90,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_github' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_github', array(
		'label'          => esc_html__( 'GitHub Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 95,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_lastfm' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_lastfm', array(
		'label'          => esc_html__( 'Last.fm Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 100,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_medium' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_medium', array(
		'label'          => esc_html__( 'Medium Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 105,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_tripadvisor' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_tripadvisor', array(
		'label'          => esc_html__( 'Trip Advisor Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 110,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_twitch' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_twitch', array(
		'label'          => esc_html__( 'Twitch Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 115,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_yelp' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_yelp', array(
		'label'          => esc_html__( 'Yelp Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 120,
		)
	);
	
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_mail' ,array(
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'progression_studios_header_mail', array(
		'label'          => esc_html__( 'E-mail Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 150,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_wishlist' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_wishlist', array(
		'label'          => esc_html__( 'Heart Icon', 'progression-elements-food-truck' ),
		'section' => 'progression_studios_section_header_icons_section',
		'type' => 'text',
		'priority'   => 160,
		)
	);
	
	
}
add_action( 'customize_register', 'progression_studios_social_customizer' );



//no-HTML text
function progression_studios_sanitize_elements_choices( $input ) {
	return wp_filter_nohtml_kses( $input );
}

if ( ! function_exists( 'progression_studios_elements_social' ) ) {

function progression_studios_elements_social() {
?>
	<ul class="progression-studios-header-social-icons">
	
		<?php if (get_theme_mod( 'progression_studios_header_facebook')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_facebook')); ?>" target="_blank" class="progression-studios-facebook" title="<?php echo esc_html__( 'Facebook', 'progression-elements-food-truck' ); ?>"><i class="fa fa-facebook-official"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_twitter')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_twitter')); ?>" target="_blank" class="progression-studios-twitter" title="<?php echo esc_html__( 'Twitter', 'progression-elements-food-truck' ); ?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_instagram')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_instagram')); ?>" target="_blank" class="progression-studios-instagram" title="<?php echo esc_html__( 'Instagram', 'progression-elements-food-truck' ); ?>"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_spotify')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_spotify')); ?>" target="_blank" class="progression-studios-spotify" title="<?php echo esc_html__( 'Spotify', 'progression-elements-food-truck' ); ?>"><i class="fa fa-spotify"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_youtube' )) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_youtube')); ?>" target="_blank" class="progression-studios-youtube" title="<?php echo esc_html__( 'Youtube', 'progression-elements-food-truck' ); ?>"><i class="fa fa-youtube-play"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_vimeo')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_vimeo')); ?>" target="_blank" class="progression-studios-vimeo" title="<?php echo esc_html__( 'Vimeo', 'progression-elements-food-truck' ); ?>"><i class="fa fa-vimeo"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_google_plus')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_google_plus')); ?>" target="_blank" class="progression-studios-google-plus" title="<?php echo esc_html__( 'Google+', 'progression-elements-food-truck' ); ?>"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_pinterest')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_pinterest')); ?>" target="_blank" class="progression-studios-pinterest" title="<?php echo esc_html__( 'Pinterest', 'progression-elements-food-truck' ); ?>"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_soundcloud')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_soundcloud')); ?>" target="_blank" class="progression-studios-soundcloud" title="<?php echo esc_html__( 'Soundcloud', 'progression-elements-food-truck' ); ?>"><i class="fa fa-soundcloud"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_linkedin')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_linkedin')); ?>" target="_blank" class="progression-studios-linkedin" title="<?php echo esc_html__( 'LinkedIn', 'progression-elements-food-truck' ); ?>"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_snapchat')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_snapchat')); ?>" target="_blank" class="progression-studios-snapchat" title="<?php echo esc_html__( 'Snapchat', 'progression-elements-food-truck' ); ?>"><i class="fa fa-snapchat-ghost"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_tumblr')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_tumblr')); ?>" target="_blank" class="progression-studios-tumblr" title="<?php echo esc_html__( 'Tumblr', 'progression-elements-food-truck' ); ?>"><i class="fa fa-tumblr"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_flickr')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_flickr')); ?>" target="_blank" class="progression-studios-flickr" title="<?php echo esc_html__( 'Flickr', 'progression-elements-food-truck' ); ?>"><i class="fa fa-flickr"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_dribbble')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_dribbble')); ?>" target="_blank" class="progression-studios-dribbble" title="<?php echo esc_html__( 'Dribbble', 'progression-elements-food-truck' ); ?>"><i class="fa fa-dribbble"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_vk')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_vk')); ?>" target="_blank" class="progression-studios-vk" title="<?php echo esc_html__( 'VK', 'progression-elements-food-truck' ); ?>"><i class="fa fa-vk"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_wordpress')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_wordpress')); ?>" target="_blank" class="progression-studios-wordpress" title="<?php echo esc_html__( 'WordPress', 'progression-elements-food-truck' ); ?>"><i class="fa fa-wordpress"></i></a></li><?php endif; ?>
	
		<?php if (get_theme_mod( 'progression_studios_header_houzz')) : ?><li><a href="<?php echo esc_attr(get_theme_mod('progression_studios_header_houzz')); ?>" target="_blank" class="progression-studios-houzz" title="<?php echo esc_html__( 'Houzz', 'progression-elements-food-truck' ); ?>"><i class="fa fa-houzz"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_behance')) : ?><li><a href="<?php echo esc_attr(get_theme_mod('progression_studios_header_behance')); ?>" target="_blank" class="progression-studios-behance" title="<?php echo esc_html__( 'Behance', 'progression-elements-food-truck' ); ?>"><i class="fa fa-behance"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_github')) : ?><li><a href="<?php echo esc_attr(get_theme_mod('progression_studios_header_github')); ?>" target="_blank" class="progression-studios-github" title="<?php echo esc_html__( 'Github', 'progression-elements-food-truck' ); ?>"><i class="fa fa-github"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_lastfm')) : ?><li><a href="<?php echo esc_attr(get_theme_mod('progression_studios_header_lastfm')); ?>" target="_blank" class="progression-studios-lastfm" title="<?php echo esc_html__( 'LastFM', 'progression-elements-food-truck' ); ?>"><i class="fa fa-lastfm"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_medium')) : ?><li><a href="<?php echo esc_attr(get_theme_mod('progression_studios_header_medium')); ?>" target="_blank" class="progression-studios-medium" title="<?php echo esc_html__( 'Medium', 'progression-elements-food-truck' ); ?>"><i class="fa fa-medium"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_tripadvisor')) : ?><li><a href="<?php echo esc_attr(get_theme_mod('progression_studios_header_tripadvisor')); ?>" target="_blank" class="progression-studios-tripadvisor" title="<?php echo esc_html__( 'Trip Advisor', 'progression-elements-food-truck' ); ?>"><i class="fa fa-tripadvisor"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_twitch')) : ?><li><a href="<?php echo esc_attr(get_theme_mod('progression_studios_header_twitch')); ?>" target="_blank" class="progression-studios-twitch" title="<?php echo esc_html__( 'Twitch', 'progression-elements-food-truck' ); ?>"><i class="fa fa-twitch"></i></a></li><?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_header_yelp')) : ?><li><a href="<?php echo esc_attr(get_theme_mod('progression_studios_header_yelp')); ?>" target="_blank" class="progression-studios-yelp" title="<?php echo esc_html__( 'Yelp', 'progression-elements-food-truck' ); ?>"><i class="fa fa-yelp"></i></a></li><?php endif; ?>
	
		<?php if (get_theme_mod( 'progression_studios_header_mail')) : ?><li><a href="mailto:<?php echo esc_attr(get_theme_mod('progression_studios_header_mail')); ?>" class="progression-studios-mail" title="<?php echo esc_html__( 'Email', 'progression-elements-food-truck' ); ?>"><i class="fa fa-envelope"></i></a></li><?php endif; ?>
	
		<?php if (get_theme_mod( 'progression_studios_header_wishlist')) : ?><li><a href="<?php echo esc_url(get_theme_mod('progression_studios_header_wishlist')); ?>"  class="progression-studios-wishlist" title="<?php echo esc_html__( 'Wishlist', 'progression-elements-food-truck' ); ?>"><i class="fa fa-heart" aria-hidden="true"></i></a></li><?php endif; ?>
	
	</ul><!-- close .progression-studios-header-social-icons -->
<?php
}
  
}