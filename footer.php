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

	<footer id="colophon" class="footer-section">
		<div class="footer-left">
			<?php $footer_info = get_field('footer_info', 'option'); ?>
			<p> <?php echo $footer_info["address"]; ?></p>
			<p> <?php echo $footer_info["email"]; ?></p>
			<p> <?php echo $footer_info["phone_number"]; ?></p>
			<p> <?php echo $footer_info["info_text"]; ?></p>	
		</div>		
			<div class="footer-middle">
			<span> &copy;	<?php esc_html_e('Created by ', 'allure-studio'); ?> </span>
				<span><?php esc_html_e('Duygu & Sally & Andrew & Bugra', 'allure-studio'); ?></span>

		   </div>
	
		<div class="footer-right">
			 <?php $social_media_accounts = get_field('social_media', 'option'); ?>
			
		<ul>
			<li>FAQ</li>
			<li><?php if(isset($social_media_accounts["instagram_link"])) : ?>
				<a href="<?php echo esc_url($social_media_accounts["instagram_link"]); ?>">
					<svg width="30px" height="30px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M11 3.5H12M4.5 0.5H10.5C12.7091 0.5 14.5 2.29086 14.5 4.5V10.5C14.5 12.7091 12.7091 14.5 10.5 14.5H4.5C2.29086 14.5 0.5 12.7091 0.5 10.5V4.5C0.5 2.29086 2.29086 0.5 4.5 0.5ZM7.5 10.5C5.84315 10.5 4.5 9.15685 4.5 7.5C4.5 5.84315 5.84315 4.5 7.5 4.5C9.15685 4.5 10.5 5.84315 10.5 7.5C10.5 9.15685 9.15685 10.5 7.5 10.5Z" stroke="#000000"/>
					</svg>
				</a>
			 </li>
           <li>
				<?php the_privacy_policy_link(); ?>
					<a href="<?php echo get_permalink(3); ?>">Privacy Policy</a>
		   </li>

		</ul>
				
			<?php endif; ?>
		</div>
			
		

			
			
		
	
		
		

		
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
