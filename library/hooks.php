<?php

if ( defined('FW') ){
   

	

}

// Скрываем пункты меню в админ панели
function remove_menu_items() {
	// тут мы укахываем ярлык пункты который удаляем.
//	remove_menu_page('edit-comments.php'); // Удаляем пункт "Комментарии"
//	remove_menu_page( 'index.php' );                  // Консоль
//	remove_menu_page( 'edit.php' );                   // Записи
	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' ); // Рубрики
	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' ); // Метки
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
/*function kama_login_redirect(){
	if( strpos($_SERVER['REQUEST_URI'], 'admission')!==false )
		$loc = '/admission.php';
	elseif( strpos($_SERVER['REQUEST_URI'], 'admin')!==false )
		$loc = '/admission.php';
	if( $loc ){
		header( 'Location: '.get_option('site_url').$loc, true, 303 );
		exit;
	}
}
add_action('template_redirect', 'kama_login_redirect');*/




function go_filter() { // наша функция
	$args = array(); // подготовим массив
	$args['meta_query'] = array('relation' => 'AND'); // отношение между условиями, у нас это "И то И это", можно ИЛИ(OR)
	global $wp_query; // нужно заглобалить текущую выборку постов
	
	
	if( isset( $_POST['dogs_sex'] ) )
		$args['meta_query'][] = array(
			'key' => 'dogs_sex',
			'value' => $_POST['dogs_sex'],
			'type' => 'radio',
			'compare' => 'IN'
		);
	
	if( isset( $_POST['dogs_age'] ) )
		$args['meta_query'][] = array(
			'key' => 'dogs_age',
			'value' => $_POST['dogs_age'],
			'type' => 'radio',
			'compare' => 'IN'
		);
	
	
	if( isset( $_POST['dogs_size'] ) )
		$args['meta_query'][] = array(
			'key' => 'dogs_size',
			'value' => $_POST['dogs_size'],
			'type' => 'radio',
			'compare' => 'LIKE'
		);
	
	query_posts(array_merge($args,$wp_query->query)); // сшиваем текущие условия выборки стандартного цикла wp с новым массивом переданным из формы и фильтруем
}
add_action( 'wp_ajax_get_keyword_data', 'go_filter' );
add_action( 'wp_ajax_nopriv_get_keyword_data', 'go_filter' );

function get_keyword_data()
{
	extract($_POST);
	
	
	if( isset( $_POST['dogs_sex'] ) )
		$args['meta_query'][] = array(
			'key' => 'dogs_sex',
			'value' => $_POST['dogs_sex'],
			'type' => 'radio',
			'compare' => 'IN'
		);
	
	if( isset( $_POST['dogs_age'] ) )
		$args['meta_query'][] = array(
			'key' => 'dogs_age',
			'value' => $_POST['dogs_age'],
			'type' => 'radio',
			'compare' => 'IN'
		);
	
	
	if( isset( $_POST['dogs_size'] ) )
		$args['meta_query'][] = array(
			'key' => 'dogs_size',
			'value' => $_POST['dogs_size'],
			'type' => 'radio',
			'compare' => 'LIKE'
		);
	
	$the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) : ?>
	    <div id="post-type" class="post-type">
		    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
		    $do_not_duplicate = $post->ID; ?><!-- BEGIN of Post -->
		    <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
		    <h3><?php the_title(); ?></h3>
		    
		    <?php endwhile; ?><!-- END of Post -->
	    </div><!-- END of .post-type -->
    <?php endif; wp_reset_query();
}
add_action( 'wp_ajax_get_keyword_data', 'get_keyword_data' );
add_action( 'wp_ajax_nopriv_get_keyword_data', 'get_keyword_data' );