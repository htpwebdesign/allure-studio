<section class="brands">
    <div class="">
        <?php 
        $images = get_field('brand_logo');
        $size = 'thumbnail'; // (thumbnail, medium, large, full, or custom size)
        if ($images): ?>
            <ul>
                <?php foreach ($images as $image): ?>
                    <li>
                        <?php echo wp_get_attachment_image($image["id"], $size); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if ($brand_name = get_field('brand_logo_name')): ?>
            <span><?php echo esc_html($brand_name); ?></span>
        <?php endif; ?>
    </div>
</section>
