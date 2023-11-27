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
			</header>

			<?php
			$terms = get_terms(
                array(
					'taxonomy' => 'ast-gallery-categories',
                    'hide_empty' => false,
                    'orderby' => 'name',
                    'order' => 'ASC'
				)	
			);
			?>
			<!-- Filter navbar -->
			<div class="gallery-filter">
				<h3>Filter by category:</h3>
				<ul class="gallery-filter_list">
					<li>All</li>
					<?php foreach ( $terms as $term ) :?>
						<li><?php echo esc_html( $term->name );?></li>
					<?php endforeach;?>
				</ul>
			</div>

			<?php
			$args = array(
				'post_type' => 'ast-gallery',
				'posts_per_page' => -1
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) {
				echo '<div>';
				echo '<ul id="gallery-list" class="gallery-list">'; 
				while ($query->have_posts()) {
					$query->the_post();
					?>
							<li class="gallery-thumbnail" data-src=<?php the_post_thumbnail_url( ); ?>>
								<?php the_post_thumbnail('medium'); ?>
							</li>
					<?php
				}
				wp_reset_postdata();
				echo '</ul>';
				echo '</div>';
			}

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
