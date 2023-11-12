<section class="hero">
    <div class="hero-img-wrapper">
        <?php 
            $hero_image = get_field('hero_image');
            if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" />
        <?php endif; ?>
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