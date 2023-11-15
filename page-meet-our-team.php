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

            $hero_image = get_field('hero_image');
            if ($hero_image) : ?>
                <div class="hero-image-wrapper">
                    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" />
                </div>
            <?php endif;

            // About Us section
            $about_us_image = get_field('about_us_image');
            if ($about_us_image): ?>
                <section class="about-us">
                    <div class="about-us-img">
                        <img src="<?php echo esc_url($about_us_image['url']); ?>" alt="<?php echo esc_attr($about_us_image['alt']); ?>" />
                    </div>
                    <h2><?php echo esc_html(get_field('about_us_title')); ?></h2>
                    <p><?php echo esc_html(get_field('about_us_text')); ?></p>
                </section>
            <?php endif;

            // Assuming the repeater field name is 'stylist' and it is attached to the current page/post
            $stylists = get_field('stylist');

            if ($stylists) :
                foreach ($stylists as $stylist) :
                    // var_dump($stylist["stylist_image"]["url"]);
                    ?>
                    <div class="stylist-container">
                        <h2><?php echo esc_html($stylist['stylist_name']); ?></h2>
                        <p><?php echo esc_html($stylist['stylist_text']); ?></p>
                        <img src="<?php echo esc_url($stylist["stylist_image"]["url"]); ?>" alt="">
                    </div>
                <?php
                endforeach;
            else :
                // Handle case where there are no stylists
                echo 'No stylists found.';
            endif;

        endwhile;

        the_posts_navigation();

    else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>

</main><!-- #main -->

<?php
get_footer();
?>
