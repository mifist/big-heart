<?php

// Create HOME Slider
function home_slider_template() { ?>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#home-slider').slick({
                //For Users
                <?php // if (get_field('home_slider_navigation', 'option')) { echo 'directionNav:' . get_field('home_slider_navigation', 'option') . ',' ;} ?>		// Display "next" and "prev" buttons.
                <?php // if (get_field('home_slider_pagination', 'option')) { echo 'controlNav:' . get_field('home_slider_pagination', 'option') . ',' ;} ?>		// Show pagination
                <?php // if (get_field('home_slider_slide_speed', 'option')) { echo 'slideshowSpeed:' . get_field('home_slider_slide_speed', 'option') . ',' ;} ?>		// Change to any integrer for example autoPlay : 5000 to play every 5 seconds.
                // For Developers
                cssEase: 'ease',
                fade: false,
                arrows: true,
                dots: true,
                infinite: true,
                speed: 500,
                autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 4,
                slidesToScroll: 1,
	            responsive: [
		            {
			            breakpoint: 1024,
			            settings: {
				            arrows: true,
				            slidesToShow: 3
			            }
		            },
		            {
			            breakpoint: 768,
			            settings: {
				            arrows: true,
				            dots: false,
				            slidesToShow: 1
			            }
		            },
		            {
			            breakpoint: 480,
			            settings: {
				            arrows: false,
				            dots: false,
				            slidesToShow: 1
			            }
		            }
	            ]
            });

        });
    </script>


   <?php $arg = array(
        'post_type'	        => 'dog_list',
        'order'		        => 'ASC',
        'orderby'	        => 'menu_order',
        'posts_per_page'    => -1
    );
    $slider = new WP_Query( $arg );
    if ( $slider->have_posts() ) : ?>

        <div id="home-slider" class="slick-slider">
            <?php while ( $slider->have_posts() ) : $slider->the_post(); ?>

                <div class="slick-slide">
                    <?php the_post_thumbnail(); ?>
                    <div class="slider-caption">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </div>

            <?php endwhile; ?>
        </div><!-- END of  #home-slider-->

    <?php endif; wp_reset_query(); ?>

<?php }

// HOME Slider Shortcode

function home_slider_shortcode() {
    ob_start();
    home_slider_template();
    $slider = ob_get_clean();
    return $slider;
}
add_shortcode( 'slider', 'home_slider_shortcode' );