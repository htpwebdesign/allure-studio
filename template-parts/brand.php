<section id="brand" class="brands-section">
     <h2 class="brands-section-title"><?php echo esc_html(get_field('brands_title')); ?></h2>
    <div class="slider">
        <div class="slide-track">
            <?php if (function_exists('get_field')) {
                $images = get_field('brand_logo');
                $size = 'custom_brand_logo'; 
                if ($images): ?>
                    <?php foreach ($images as $image): ?>
                        <div class="slide">
                            <?php echo wp_get_attachment_image($image['ID'], $size); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif;
            } ?>
        </div>
    </div>
</section>
