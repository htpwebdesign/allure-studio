<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Allure_Studio
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			do_shortcode( '[lightgallery id="287"]' );
			$args = array(
				'post_type' => 'ast-gallery',
				'posts_per_page' => -1,
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) {
				$photoCount = 0;
				echo '<div>';
				echo '<ul class="gallery-list">'; 
				while ($query->have_posts()) {
					$photoCount++;
					$query->the_post();
					?>
							<li class="gallery-thumbnail">
								<?php the_post_thumbnail('medium'); ?>
							</li>
					<?php
				}
				wp_reset_postdata();
				echo '</ul>';
				echo '</div>';
				echo '<p>Photos: ' . $photoCount . '</p>';
			}

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
