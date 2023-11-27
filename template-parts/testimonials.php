<section class="testimonial-section">
    <h2 class="testimonial-section-title">What They Say About Us</h2>
    <?php
    $args = array(
        'post_type'      => 'ast-testimonial',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php while ($query->have_posts()) : $query->the_post();
                    $testimonial  = get_field('testimonial');
                    $person_name  = get_field('person_name');
                    $person_image = get_field('person_image');
                    
                ?>
            
                    <div class="swiper-slide">
                        
                        <blockquote>
                                <span class="person-image">
                                <?php
                                if ($person_image) :
                                    $size = 'thumbnail'; 
                                    echo wp_get_attachment_image($person_image['ID'], $size);
                                endif;
                                ?>
                            </span>
                            <div class="testimonial">
                            <span class="person-name"><?php echo esc_html($person_name); ?></span>
                            <span class="person-testimonial"> <?php echo esc_html($testimonial); ?></span>
                            </div>
                        </blockquote>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    <?php
        wp_reset_postdata();
    endif;
    ?>
</section>
