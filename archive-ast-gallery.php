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
				<style>
					.gallery-filter_list li {
                        list-style: none;
                        display: inline-block;
                        margin-right: 10px;
						border: 1px solid #ccc;
						border-radius: 4px;
						padding: 0 1rem;
						width: 120px;
						text-align: center;
						cursor: pointer;
                    }
                    .gallery-filter_list li:last-child {
                        margin-right: 0;
                    }
                </style>
			</div>

			<?php
			$args = array(
				'post_type' => 'ast-gallery',
				'posts_per_page' => -1,
				'tax_query'		=> array(
					array(
						'taxonomy' => 'ast-gallery-categories',
            			'field'    => 'slug',
            			'terms'    => 'colors'
					)
				)
			);

			$query = new WP_Query($args);

			if ($query->have_posts()) {
				$photoCount = 0;
				echo '<div>';
				echo '<ul id="gallery-list" class="gallery-list">'; 
				while ($query->have_posts()) {
					$photoCount++;
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
				echo '<p>Photos: ' . $photoCount . '</p>';
			}

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
