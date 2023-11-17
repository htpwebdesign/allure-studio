<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Allure_Studio
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );
			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	<?php
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
	?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
