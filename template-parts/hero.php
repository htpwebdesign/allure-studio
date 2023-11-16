<section class="hero-section">
    <div class="hero-img-wrapper">
        <?php 
            // Check if the function get_field exists
            if (function_exists('get_field')) {
                $hero_image = get_field('hero_image');
                $size = 'full'; // (thumbnail, medium, large, full, or custom size)
                
                if ($hero_image): ?>
                    <?php echo wp_get_attachment_image($hero_image['id'], $size); ?>
                <?php endif;
            }
        ?>
    </div>
    <div class="hero-text">
        <h2><?php echo esc_html(get_field('hero_text')); ?></h2>
        <?php 
            $link = get_field('link');
            if( $link ): ?>
                <a class="button" href="<?php echo esc_url( $link ); ?>">Book Now</a>
            <?php endif; ?>
    </div>
</section>
