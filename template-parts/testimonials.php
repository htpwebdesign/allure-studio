<section class="home-slider">
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
                ?>
                    <div class="swiper-slide">
                        <blockquote>
                            <p><?php echo esc_attr($person_name); ?></p>
                            <cite>- <?php echo esc_html($testimonial); ?></cite>
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
