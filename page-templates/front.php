<?php
/*
Template Name: Front
*/
get_header(); ?>

<header id="front-hero" role="banner">
	<div class="marketing">
		<div class="tagline">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<h4 class="subheader"><?php bloginfo( 'description' ); ?></h4>
			<a role="button" class="download large button sites-button hide-for-small-only" href="https://github.com/olefredrik/foundationpress">Download FoundationPress</a>
		</div>

		<div id="watch">
			<section id="stargazers">
				<a href="https://github.com/olefredrik/foundationpress">1.5k stargazers</a>
			</section>
			<section id="twitter">
				<a href="https://twitter.com/olefredrik">@olefredrik</a>
			</section>
		</div>
	</div>

</header>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php
					wp_link_pages(
						array(
							'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
							'after'  => '</p></nav>',
						)
					);
				?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</div>

	</div>

</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<div class="section-divider">
	<ul class="accordion" data-accordion="vasuer-accordion" role="tablist">
		<li class="accordion-item" data-accordion-item="">
			<a href="#" class="accordion-title" aria-controls="rfezm6-accordion" role="tab" id="rfezm6-accordion-label" aria-expanded="false" aria-selected="false">Accordion 1</a>
			<div class="accordion-content" data-tab-content="" role="tabpanel" aria-labelledby="rfezm6-accordion-label" aria-hidden="true" id="rfezm6-accordion" style="display: none;">
				<p>Panel 1. Lorem ipsum dolor</p>
				<a href="#">Nowhere to Go</a>
			</div>
		</li>
		<li class="accordion-item" data-accordion-item="">
			<a href="#" class="accordion-title" aria-controls="g279ym-accordion" role="tab" id="g279ym-accordion-label" aria-expanded="false" aria-selected="false">Accordion 2</a>
			<div class="accordion-content" data-tab-content="" role="tabpanel" aria-labelledby="g279ym-accordion-label" aria-hidden="true" id="g279ym-accordion" style="display: none;">
				<textarea></textarea>
				<button class="button">I do nothing!</button>
			</div>
		</li>
		<li class="accordion-item is-active" data-accordion-item="">
			<a href="#" class="accordion-title" aria-controls="zi8mzy-accordion" role="tab" id="zi8mzy-accordion-label" aria-expanded="true" aria-selected="true">Accordion 3</a>
			<div class="accordion-content" data-tab-content="" role="tabpanel" aria-labelledby="zi8mzy-accordion-label" aria-hidden="false" id="zi8mzy-accordion" style="display: block;">
				Pick a date!
				<input type="date">
			</div>
		</li>
	</ul>
</div>





<?php get_footer();
