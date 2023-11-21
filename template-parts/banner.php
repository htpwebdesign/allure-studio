<section class="hero-section">
    <div class="banner-wrapper">
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
    <div class="banner-title">
        <h1><?php echo esc_html(get_field('banner_title')); ?></h1>
        <?php 
            $link = get_field('link');
            if( $link ): ?>
                <a class="button" href="<?php echo esc_url( $link ); ?>">Book Now</a>
            <?php endif; ?>
    </div>
</section>
