<section class="instagram-section"><?php 
    $shortcode = get_field('shortcode'); 
    if(isset($shortcode)) {
        echo do_shortcode($shortcode);
    }
?></section>