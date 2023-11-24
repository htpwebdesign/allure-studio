<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Allure_Studio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php allure_studio_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'allure-studio' ),
				'after'  => '</div>',
			)
		);
		?>
		<?php
		if (is_page( 102 )):
	$monday = get_field('monday');
	$tuesday = get_field('tuesday');
	$wednesday = get_field('wednesday');
	$thursday = get_field('thursday');
	$friday = get_field('friday');
	$saturday = get_field('saturday');
	$sunday = get_field('sunday');

	if ($monday) {
			echo '<p>Monday: ' . esc_html($monday) . '</p>';
	}
	if ($tuesday) {
			echo '<p>Tuesday: ' . esc_html($tuesday) . '</p>';
	}
	if ($wednesday) {
			echo '<p>Wednesday: ' . esc_html($wednesday) . '</p>';
	}
	if ($thursday) {
			echo '<p>Thursday: ' . esc_html($thursday) . '</p>';
	}
	if ($friday) {
			echo '<p>Friday: ' . esc_html($friday) . '</p>';
	}
	if ($saturday) {
			echo '<p>Saturday: ' . esc_html($saturday) . '</p>';
	}
	if ($sunday) {
			echo '<p>Sunday: ' . esc_html($sunday) . '</p>';
	}
 endif;
	?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'allure-studio' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
