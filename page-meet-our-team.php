<?php
/**
 * Template name: Meet Our Team
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    if (have_posts()) :

        /* Start the Loop */
        while (have_posts()) :
            the_post();

          get_template_part( 'template-parts/banner' );

            // Meet our team section
            $about_us_image = get_field('about_us_image');
            $size = 'full'; // (thumbnail, medium, large, full, or custom size)
            if ($about_us_image): ?>
            <div class="container">
                <section id="about-us" class="about-us">
                    
                   <div class="about-us-img-wrapper">
                     <?php echo wp_get_attachment_image($about_us_image, $size); ?>
                   </div>
                   <div class="about-us-text-container">
                        <h1 class="about-us-title"><?php echo esc_html(get_field('about_us_title')); ?></h1>
                        <p class="about-us-text"><?php echo esc_html(get_field('about_us_text')); ?></p>
                   </div>
                   <div class="info-bg"></div>
                </section>
     <?php endif;?>

            <section class="stylists-section">
                <h2 class="stylists-title"><?php echo esc_html(get_field('stylists_title')); ?></h2>
                 <div class="stylists">
                <?php  $stylists = get_field('stylists');
                    $size = 'large'; // (thumbnail, medium, large, full, or custom size)
            
              if ($stylists) :
                 foreach ($stylists as $stylist) :
                    // var_dump($stylist["stylist_image"]["url"]);
                    ?>
                   
                   <article class="stylist">
                     <div class="stylist-img-wrapper">   
                        <?php echo wp_get_attachment_image( $stylist["stylist_image"]["id"], $size); ?>
                    </div>
                    <div class="stylist-text-container">
                        <h2 class="stylist-name"><?php echo esc_html($stylist['stylist_name']); ?></h2>
                         <span class="stylist-speciality"><?php echo esc_html($stylist['stylist_speciality']); ?></span>
                        <p class="stylist-text"><?php echo esc_html($stylist['stylist_text']); ?></p>
                         <?php 
                            $link = get_field('link');
                            if( $link ): ?>
                                <a class="button" href="<?php echo esc_url( $link ); ?>">Book Now</a>
                            <?php endif; ?>
                 </div>
                  </article>
            
            
                <?php
                endforeach;
            else :
                // Handle case where there are no stylists
                echo 'No stylists found.';
            endif;

        endwhile;?>
             </div>
          </section>
          </div>

    <?php    the_posts_navigation();

    else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();
?>
