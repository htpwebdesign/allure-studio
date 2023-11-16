<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Allure_Studio
 */

?>

	<footer id="colophon" class="site-footer">
		    <?php $social_media_accounts = get_field('social_media', 'option'); ?>
			<?php $footer_info = get_field('footer_info', 'option'); ?>

		<div class="footer-info">
			<p> <?php echo $footer_info["address"]; ?></p>
			<p> <?php echo $footer_info["email"]; ?></p>
			<p> <?php echo $footer_info["phone_number"]; ?></p>
			<p> <?php echo $footer_info["info_text"]; ?></p>	
		</div>		
			
	
		<div class="social-media">
			<?php if(isset($social_media_accounts["facebook_link"])) : ?>
				<a href="<?php echo esc_url($social_media_accounts["facebook_link"]); ?>">Facebook Icon</a>
				
			<?php endif; ?>
			<?php if(isset($social_media_accounts["instagram_link"])) : ?>
				<a href="<?php echo esc_url($social_media_accounts["facebook_link"]); ?>">Instagram Icon</a>
				
			<?php endif; ?>
		</div>
			
		

			
			
		
	
		<div class="footer-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'allure-studio' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'allure-studio' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'allure-studio' ), 'allure-studio', '<a href="https://allurestudio.bcitwebdeveloper.ca/">FWD 34</a>' );
				?>
		</div><!-- .site-info -->
		

		
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
