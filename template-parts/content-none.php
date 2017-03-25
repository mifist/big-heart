<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<header class="page-header">
	<h1 class="page-title"><?php _e( 'Nothing Found', 'foundationpress' ); ?></h1>
</header>

<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p>
		<?php
			/* translators: %1$s: new post url */
			printf( __(
				'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'foundationpress' ),
				admin_url( 'post-new.php' )
			);
		?>
	</p>

	<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'К сожалению, ничего не найдено. Пожалуйста, попытайтесь снова с другими ключевыми словами.', 'foundationpress' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php _e( 'Похоже, мы не можем найти то, что вы ищете. Возможно, поиск может помочь.', 'foundationpress' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div>
