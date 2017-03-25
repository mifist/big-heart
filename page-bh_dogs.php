<?php
/*
Template Name: Помощь Собакам
*/
get_header(); ?>
	
	<div id="page" role="main">
		<article class="main-content">
			<?php query_posts('post_type=bh_dogs&post_status=publish&posts_per_page=2&paged='. get_query_var('paged')
			); ?>
			<?php if ( have_posts() ) : ?>
				
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php endwhile; ?>
			
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			
			<?php endif; // End have_posts() check. ?>
			
			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php
			if ( function_exists( 'foundationpress_pagination' ) ) :
				foundationpress_pagination();
			elseif ( is_paged() ) :
				?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php endif; ?>
		
		</article>
		<?php get_sidebar(); ?>
	
	</div>

<?php get_footer();