<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

define("MY_THEME_TEXTDOMAIN", 'development-theme-unyson');


/** Various clean up functions */
require_once('library/cleanup.php');

/** Required for Foundation to work properly */
require_once('library/foundation.php');

/** Format comments */
require_once('library/class-foundationpress-comments.php');

/** Register all navigation menus */
require_once('library/navigation.php');

/** Add menu walkers for top-bar and off-canvas */
require_once('library/class-foundationpress-top-bar-walker.php');
require_once('library/class-foundationpress-mobile-walker.php');

/** Create widget areas in sidebar and footer */
require_once('library/widget-areas.php');

/** Create post type*/
require_once('library/post_type-areas.php');

/** Return entry meta information for posts */
require_once('library/entry-meta.php');

/** Enqueue scripts */
require_once('library/enqueue-scripts.php');

/** Add theme support */
require_once('library/theme-support.php');

/** Add Nav Options to Customer */
require_once('library/custom-nav.php');
require_once('library/custom-admin.php');

/** Change WP's sticky post class */
require_once('library/sticky-posts.php');

/** Configure responsive image sizes */
require_once('library/responsive-images.php');
/**
 * Custom functions that act independently of the theme templates.
 */
require_once('library/extras.php');

/**
 * Load hooks.
 */
require_once('library/hooks.php');

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );

/** Customization Admin */

/**
 * Load TGM Plugin Activation.
 */

require_once('library/plugin-activation-class.php'); // Comment on production
require_once('library/recommended-plugins.php'); // Comment on production

//Run Sick slider on HOME page
require_once('library/home-slider.php');


/*
 *
 *  UNISON
 *
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function step_by_step_development_theme_unyson_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'step_by_step_development_theme_unyson_content_width', 640 );
}
add_action( 'after_setup_theme', 'step_by_step_development_theme_unyson_content_width', 0 );





/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';







/*********************** PUT YOU FUNCTIONS BELOW ********************************/

add_image_size( 'slide_full', 750, 1024, array('center','center'));


// ACF Pro Options Page

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'    => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
}








