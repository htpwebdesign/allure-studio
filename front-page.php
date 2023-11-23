<?php
/**
 * front-page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Allure_Studio
 */

get_header();
?>

	<main id="primary" class="">
    

		<?php
		if ( have_posts() ) :


			/* Start the Loop */
			while ( have_posts() ) : 
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
		
                get_template_part( 'template-parts/hero' );
				get_template_part( 'template-parts/brand' );
				?>
                <div class="container">
					<?php
					
					get_template_part( 'template-parts/instagram-feed' );
					get_template_part( 'template-parts/testimonials' );
					?>
				</div>
             <?php   

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php

get_footer();
