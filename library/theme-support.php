<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_theme_support' ) ) :
function foundationpress_theme_support() {
	// Add language support
	load_theme_textdomain( 'foundationpress', get_template_directory() . '/languages' );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add menu support
	add_theme_support( 'menus' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );

	// RSS thingy
	add_theme_support( 'automatic-feed-links' );

	// Add post formats support: http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

	// Declare WooCommerce support per http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
	add_theme_support( 'woocommerce' );
	
	// Custom Header
	add_theme_support( 'custom-header', array(
			'height'        => '100',
			'width'        => '200',
			'flex-height'    =>true,
			'flex-width'    => true,
			'uploads'       => true,
			'header-text'   => false
		)
	);
	
	// Add foundation.css as editor style https://codex.wordpress.org/Editor_Style
	add_editor_style( 'assets/stylesheets/foundation.css' );
}
add_action( 'after_setup_theme', 'foundationpress_theme_support' );

function _action_theme_wp_print_styles() {
	if (!defined('FW')) return; // prevent fatal error when the framework is not active
	
	$option_value = fw_get_db_customizer_option('body-color');
	//$option_value = fw_get_db_settings_option('body-color');
	/*
	 * global $post;

	if (!$post || $post->post_type != 'post') {
		return;
	}

	$option_value = fw_get_db_post_option($post->ID, 'body-color');

	 */
	
	echo '<style type="text/css">'
		. 'body { '
		. 'border: 30px solid '. esc_html($option_value) .'; '
		. '}'
		. '</style>';
}
add_action('wp_print_styles', '_action_theme_wp_print_styles');

endif;

function development_theme_unyson_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'development_theme_unyson_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'development_theme_unyson_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'development_theme_unyson_custom_header_setup' );

if ( ! function_exists( 'development_theme_unyson_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see development_theme_unyson_custom_header_setup().
	 */
	function development_theme_unyson_header_style() {
		$header_text_color = get_header_textcolor();
		
		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}
		
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
				// Has the text been hidden?
				if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
			<?php
				// If the user has set a custom color for the text use that.
				else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			<?php endif; ?>
		</style>
		<?php
	}
endif;
