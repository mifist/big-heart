<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {
		
		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/css/foundation.css', array(), '2.6.1', 'all' );
		
		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );
		
		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '3.1.1', false);
		wp_enqueue_script ('jquery');
		// If you'd like to cherry-pick the foundation components you need in your project, head over to gulpfile.js and see lines 35-54.
		// It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
		
		// Map Scripts
		//wp_enqueue_script( 'google.maps.api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', null, null, true );
		
		
		wp_register_script( 'slick', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery'), null, true );
		wp_enqueue_script('slick');
		//wp_register_script( 'mapsapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCIKMN-YZAy9sebaqUAgLCFrPuAMG750M0', array('jquery'), null, true );
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/javascript/scripts-dist.js', array(), '2.6.1', true );
		
		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		if (is_front_page()) {
			wp_enqueue_script('mapsapi');
			
		}
	}
	if ( function_exists( 'wpcf7_enqueue_scripts' )) {
		wpcf7_enqueue_scripts();
	}
	
	if ( function_exists( 'wpcf7_enqueue_styles' )) {
		wpcf7_enqueue_styles();
	}
	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;

function wpmidia_enqueue_masked_input(){
	wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/ae7c834c9a.js', array('jquery'), true );
	//echo '<script>!function ($) { $(document).foundation(); }(window.jQuery); </script>';
}
add_action('wp_footer', 'wpmidia_enqueue_masked_input');