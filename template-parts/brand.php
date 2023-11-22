<section id="brand" class="brands-section">
    <?php 
    // Check if the function get_field exists
    if (function_exists('get_field')) {
        $images = get_field('brand_logo');
       $size = 'custom_brand_logo';
        ?>
        <h2 class="brands-section-title"><?php echo esc_html(get_field('brands_title')); ?></h2>
        <?php
        if ($images): ?>
            <ul class="brands-section-menu">
                <?php foreach ($images as $image): ?>
                    <li class="brands-section-item">
                        <?php echo wp_get_attachment_image($image['ID'], $size); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif;
    } // End of function_exists check
    ?>
</section>
