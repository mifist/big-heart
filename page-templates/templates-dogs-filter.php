<?php
/*
Template Name: Фильтр для собак
*/
get_header(); ?>
	
	<div id="page" role="main">
		
		<div class="page-content">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?><!-- BEGIN of Post -->
					<?php if ( has_post_thumbnail()) : ?>
						<?php the_post_thumbnail(); ?>
					<?php endif; ?>
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				<?php endwhile; ?><!-- END of Post -->
			<?php endif; ?>
		</div>
		
		<?php get_template_part( 'template-parts/dogs_filter'); ?>
		
	
		
		<article class="main-content">
			
			<?php query_posts('post_type=dog_list&order=ASC&post_status=publish&posts_per_page=9&paged='.get_query_var('paged')); ?>
			
			<?php if ( have_posts() ) : ?> <!-- Start the Loop -->
				<!-- BEGIN of Post -->
				
				<?php while ( have_posts() ) : the_post(); ?>
					
					<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
						<?php if ( has_post_thumbnail()) : ?>
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
					</div>
				
				<?php endwhile; ?>
			
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?> <!-- End the Loop -->
			
			<!-- Display navigation to next/previous pages when applicable -->
			<?php if ( function_exists( 'foundationpress_pagination' ) ) :
				foundationpress_pagination();
			elseif ( is_paged() ) : ?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php endif; wp_reset_query(); ?>
		
		</article>
	
	</div>

<?php get_footer();