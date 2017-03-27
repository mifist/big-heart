<?php
/**
 * The sidebar containing the main widget area
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside class="sidebar">
	<?php $arg = array(
		'post_type'	    => 'bh_child', /*<-- Enter name of Custom Post Type here*/
		'order'		    => 'ASC',
		'orderby'	    => 'menu_order',
		'posts_per_page'    => 3,
		'tax_query' => array(
			array(
				'taxonomy' => 'bh_category',
				'field'    => 'slug',
				'terms'    => 'happy-stories'
			)
		)
	);
	$the_query = new WP_Query( $arg );
	if ( $the_query->have_posts() ) : ?>
		
		<?php /* Start the Loop */ ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post();
			$do_not_duplicate = $post->ID; ?><!-- BEGIN of Post -->
			
			
			<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
				<header>
					<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					<?php foundationpress_entry_meta(); ?>
				</header>
				<div class="entry-content">
					<?php $trimmed_content = wp_trim_words( get_the_content(), 20, '<a href="'. get_permalink() .'"> ...Read More</a>' ); ?>
					<p><?php echo $trimmed_content; ?></p>
				</div>
				<footer>
					<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
				</footer>
			</div>
		
		<?php endwhile; ?>
	
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	
	<?php endif; // End have_posts() check. ?>
	<hr>
	<?php $arg = array(
		'post_type'	    => 'bh_child', /*<-- Enter name of Custom Post Type here*/
		'order'		    => 'ASC',
		'orderby'	    => 'menu_order',
		'posts_per_page'    => 3,
		'tax_query' => array(
			array(
				'taxonomy' => 'bh_category',
				'field'    => 'slug',
				'terms'    => 'current-projects'
			)
		)
	);
	$the_query = new WP_Query( $arg );
	if ( $the_query->have_posts() ) : ?>
		
		<?php /* Start the Loop */ ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post();
			$do_not_duplicate = $post->ID; ?><!-- BEGIN of Post -->
			
			
			<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
				<header>
					<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
					<?php foundationpress_entry_meta(); ?>
				</header>
				<div class="entry-content">
					<?php $trimmed_content = wp_trim_words( get_the_content(), 20, '<a href="'. get_permalink() .'"> ...Read More</a>' ); ?>
					<p><?php echo $trimmed_content; ?></p>
				</div>
				<footer>
					<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
				</footer>
			</div>
		
		<?php endwhile; ?>
	
	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	
	<?php endif; // End have_posts() check. ?>
</aside>
