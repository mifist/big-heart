<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'post_type_theme' ) ) :
	
// Register Post Type
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
			'add_new_item'       => __( 'Добавить новую' ),
			'edit_item'          => __( 'Редактировать' ),
			'new_item'           => __( 'Новая ' ),
			'all_items'          => __( 'Все' ),
			'view_item'          => __( 'Просмотр' ),
			'search_items'       => __( 'Искать' ),
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
		
// Register Post Type dog_list
		$post_type_slider_labels = array(
			'name'               => _x( 'Наши собаки', 'post type general name' ),
			'singular_name'      => _x( 'Наша собака', 'post type singular name' ),
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
			'menu_name'          => 'Наши собаки'
		);
		$post_type_slider_args = array(
			'labels'        => $post_type_slider_labels,
			'description'   => 'Display Slider',
			'public'        => true,
			'menu_icon'		=> get_template_directory_uri() . '/assets/images/icons/dog-training.png',
			'menu_position' => 6,
			'supports'      => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'author', 'revisions' ), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			//'rewrite' => array( 'slug'=>'child/%products%', 'with_front' => false ),
			'has_archive' => true, // если нужна страница архива тут указываем её ярлык а не true
			'hierarchical'  => true
		);
		register_post_type( 'dog_list', $post_type_slider_args );
	}
	add_action( 'init', 'post_type_theme' );

// Register taxonomy
	
	function create_taxonomy(){
		
		$labels = array(
			'name' => _x( 'Категории', 'taxonomy general name' ),
			'singular_name' => _x( 'Категория', 'taxonomy singular name' ),
			'search_items'  => __( 'Искать категорию' ),
			'popular_items' => __( 'Популярные пкатегории' ),
			'all_items'     => __( 'Все категории' ),
			'parent_item'   => null,
			'parent_item_colon' => null,
			'edit_item'     => __( 'Редактировать' ),
			'update_item'   => __( 'Сохранить категорию' ),
			'add_new_item'  => __( 'Добавить новую категорию' ),
			'new_item_name' => __( 'Добавая категория' ),
			'separate_items_with_commas' => __( 'Separate with commas' ),
			'add_or_remove_items' => __( 'Add or remove' ),
			'choose_from_most_used' => __( 'Выберите наиболее часто используемую категорию' ),
			'menu_name' => __( 'Категории' ),
		);
		// Добавляем НЕ древовидную таксономию 'writer' (как метки)
		register_taxonomy('bh_category',  array('bh_dogs', 'bh_child'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'category' ),
		));
		
	}
	add_action('init', 'create_taxonomy');
endif;
