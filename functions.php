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

/** Change WP's sticky post class */
require_once('library/sticky-posts.php');

/** Configure responsive image sizes */
require_once('library/responsive-images.php');

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
 * Custom template tags for this theme.
 */
//require_once( 'inc/template-tags.php' );

/**
 * Custom functions that act independently of the theme templates.
 */
//require_once( 'inc/extras.php' );

/**
 * Customizer additions.
 */
//require_once( 'inc/customizer.php' );

/**
 * Load Jetpack compatibility file.
 */
//require_once( 'inc/jetpack.php' );

/**
 * Load hooks.
 */
//require_once( 'inc/hooks.php' );


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



/*********************** PUT YOU FUNCTIONS BELOW ********************************/

add_image_size( 'slide_full', 750, 1024, array('center','center'));


// Скрываем пункты меню в админ панели
function remove_menu_items() {
	// тут мы укахываем ярлык пункты который удаляем.
//	remove_menu_page('edit-comments.php'); // Удаляем пункт "Комментарии"
//	remove_menu_page( 'index.php' );                  // Консоль
//	remove_menu_page( 'edit.php' );                   // Записи
//	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' ); // Рубрики
//	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' ); // Метки
//	remove_menu_page( 'upload.php' );                 // Медиафайлы
//	remove_menu_page( 'edit.php?post_type=page' );    // Страницы
//	remove_menu_page( 'themes.php' );                 // Внешний вид
//	remove_menu_page( 'plugins.php' );                // Плагины
//	remove_menu_page( 'users.php' );                  // Пользователи
//	remove_menu_page( 'tools.php' );                  // Инструменты
//	remove_menu_page( 'options-general.php' );        // Настройки
//	remove_menu_page( 'edit.php?post_type=acf-field-group' ); // ACF
//	remove_menu_page( 'cptui_manage_post_types' ); // CPTU
//	remove_menu_page( 'admin.php?page=duplicator' ); // Duplicator
//	remove_menu_page( 'wpcf7' ); // Contact form 7
//	remove_submenu_page( 'options-general.php', 'options-permalink.php' ); // Параметры->Постоянные ссылки
//	remove_submenu_page( 'options-general.php', 'options-reading.php' ); // Параметры->Чтение
//	remove_submenu_page( 'options-general.php', 'options-writing.php' ); // Параметры->Написание
//	remove_submenu_page( 'options-general.php', 'acf-qtranslate' ); // acf for qtranslate x
//	remove_submenu_page( 'options-general.php', 'qtranslate-x' ); // qtranslate x
//	remove_submenu_page( 'options-general.php', 'akismet-key-config' ); // akismet
}
add_action( 'admin_menu', 'remove_menu_items' );


// Ограничение символов в h1 - h6
function trim_title_chars($count, $after) {
	$title = get_the_title();
	if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
	else $after = '';
	echo $title . $after;
}
function trim_title_sub_field($count, $after) {
	$title = get_sub_field('service_title');
	if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
	else $after = '';
	echo $title . $after;
}
//trim_title_chars(27, '...');

/*
*
 *  ЗАЩИТА АДМИНКИ И РЕДИРЕКТЫ
*
*/


/*редирект wp-admin wp-login admission.php*/
function kama_login_redirect(){
	if( strpos($_SERVER['REQUEST_URI'], 'admission')!==false )
		$loc = '/admission.php';
	elseif( strpos($_SERVER['REQUEST_URI'], 'admin')!==false )
		$loc = '/admission.php';
	if( $loc ){
		header( 'Location: '.get_option('site_url').$loc, true, 303 );
		exit;
	}
}
add_action('template_redirect', 'kama_login_redirect');



