<section class="brands-section">
    <?php 
    // Check if the function get_field exists
    if (function_exists('get_field')) {
        $images = get_field('brand_logo');
        $size = 'thumbnail'; // (thumbnail, medium, large, full, or custom size)
        
        if ($images): ?>
            <ul class="brands">
                <?php foreach ($images as $image): ?>
                    <li class="brand">
                        <?php echo wp_get_attachment_image($image['ID'], $size); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif;
    } // End of function_exists check
    ?>
</section>
