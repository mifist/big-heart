<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'post_type_theme' ) ) :
	
// Register Post Type Slider
	function post_type_theme() {
		$post_type_slider_labels = array(
			'name'               => _x( 'Слайдер', 'post type general name' ),
			'singular_name'      => _x( 'Слайд', 'post type singular name' ),
			'add_new'            => _x( 'Добавить новый', 'slide' ),
			'add_new_item'       => __( 'Добавить новый' ),
			'edit_item'          => __( 'Редактировать' ),
			'new_item'           => __( 'Новывй ' ),
			'all_items'          => __( 'Все' ),
			'view_item'          => __( 'Просмотр' ),
			'search_items'       => __( 'Искать слайд' ),
			'not_found'          => __( 'Ничего не найдено' ),
			'not_found_in_trash' => __( 'Ничего не найдено в корзине' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Слайдер'
		);
		$post_type_slider_args = array(
			'labels'        => $post_type_slider_labels,
			'description'   => 'Display Slider',
			'public'        => true,
			'menu_icon'		=> 'dashicons-format-gallery',
			'menu_position' => 4,
			'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
			'has_archive'   => true,
			'hierarchical'  => true
		);
		register_post_type( 'slide', $post_type_slider_args );
		
// Register Post Type bh_child
		$post_type_slider_labels = array(
			'name'               => _x( 'Помощь детям', 'post type general name' ),
			'singular_name'      => _x( 'Помощь реебенку', 'post type singular name' ),
			'add_new'            => _x( 'Добавить нового', 'slide' ),
			'add_new_item'       => __( 'Добавить нового' ),
			'edit_item'          => __( 'Редактировать' ),
			'new_item'           => __( 'Новывй ' ),
			'all_items'          => __( 'Все' ),
			'view_item'          => __( 'Просмотр' ),
			'search_items'       => __( 'Искать ребенка' ),
			'not_found'          => __( 'Ничего не найдено' ),
			'not_found_in_trash' => __( 'Ничего не найдено в корзине' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Помощь детям'
		);
		$post_type_slider_args = array(
			'labels'        => $post_type_slider_labels,
			'description'   => 'Display Slider',
			'public'        => true,
			'menu_icon'		=> get_template_directory_uri() . '/assets/images/icons/chil-hand.png',
			'menu_position' => 5,
			'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'author', 'revisions' ), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			//'rewrite' => array( 'slug'=>'child', 'with_front' => false ),
			'has_archive' => true, // если нужна страница архива тут указываем её ярлык а не true
			'hierarchical'  => true
		);
		register_post_type( 'bh_child', $post_type_slider_args );
		
// Register Post Type bh_dogs
		$post_type_slider_labels = array(
			'name'               => _x( 'Помощь собакам', 'post type general name' ),
			'singular_name'      => _x( 'Помощь собаке', 'post type singular name' ),
			'add_new'            => _x( 'Добавить новую', 'slide' ),
			'add_new_item'       => __( 'Добавить новую собаку' ),
			'edit_item'          => __( 'Редактировать' ),
			'new_item'           => __( 'Новая ' ),
			'all_items'          => __( 'Все' ),
			'view_item'          => __( 'Просмотр' ),
			'search_items'       => __( 'Искать собаку' ),
			'not_found'          => __( 'Ничего не найдено' ),
			'not_found_in_trash' => __( 'Ничего не найдено в корзине' ),
			'parent_item_colon'  => '',
			'menu_name'          => 'Помощь собакам'
		);
		$post_type_slider_args = array(
			'labels'        => $post_type_slider_labels,
			'description'   => 'Display Slider',
			'public'        => true,
			'menu_icon'		=> get_template_directory_uri() . '/assets/images/icons/dog-training.png',
			'menu_position' => 5,
			'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'author', 'revisions' ), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			//'rewrite' => array( 'slug'=>'child/%products%', 'with_front' => false ),
			'has_archive' => 'dogs', // если нужна страница архива тут указываем её ярлык а не true
			'hierarchical'  => true
		);
		register_post_type( 'bh_dogs', $post_type_slider_args );
	}
	add_action( 'init', 'post_type_theme' );
endif;
