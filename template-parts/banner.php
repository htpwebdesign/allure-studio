<section class="banner">
    <div class="banner-img-wrapper">
        <?php 
            // Check if the function get_field exists
            if (function_exists('get_field')) {
                $banner_image = get_field('banner_image');
                $size = 'full'; // (thumbnail, medium, large, full, or custom size)
                
                if ($banner_image): ?>
                    <?php echo wp_get_attachment_image($banner_image['id'], $size); ?>
                <?php endif;
            }
        ?>
    </div>
    <div class="banner-text-container">
        <h1 class="banner-title"><?php echo esc_html(get_field('banner_title')); ?></h1>
    </div>
     <div class="scroll-to-bottom">
		<a href="#about-us">
            <svg class="arrows">
							<path stroke-linecap="round" class="a1" d="M0 0 L20 22 L40 0"></path>
						</svg>
        </a>
	  </div>
</section>
