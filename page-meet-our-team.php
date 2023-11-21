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
                <section class="meet-our-team-section">
                    <div class="meet-our-team-img-wrapper">
                         <?php echo wp_get_attachment_image( $about_us_image["id"], $size); ?>
                       
                    </div>
                    <h1 class="meet-our-team-title"><?php echo esc_html(get_field('about_us_title')); ?></h1>
                    <p class="meet-our-team-text"><?php echo esc_html(get_field('about_us_text')); ?></p>
                </section>
            <?php endif;?>

            <section class="stylist-section">
         <?php  $stylists = get_field('stylists');
            $size = 'large'; // (thumbnail, medium, large, full, or custom size)

            if ($stylists) :
                foreach ($stylists as $stylist) :
                    // var_dump($stylist["stylist_image"]["url"]);
                    ?>
                   <article class="stylist">
                        <h2 class="stylist-name"><?php echo esc_html($stylist['stylist_name']); ?></h2>
                        <p class="stylist-text"><?php echo esc_html($stylist['stylist_text']); ?></p>
                       
                     <div class="stylist-img">   
                        <?php echo wp_get_attachment_image( $stylist["stylist_image"]["id"], $size); ?>
                </article>
                </div>
                <?php
                endforeach;
            else :
                // Handle case where there are no stylists
                echo 'No stylists found.';
            endif;

        endwhile;?>
          </section>

    <?php    the_posts_navigation();

    else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();
?>
