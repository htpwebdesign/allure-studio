<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Allure_Studio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="contact-padding">
  <header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  </header><!-- .entry-header -->

  <?php allure_studio_post_thumbnail(); ?>

  <div class="entry-content">
    <?php
    the_content();

    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'allure-studio' ),
        'after'  => '</div>',
      )
    );
    ?>
    <?php
if (is_page(102)):
    $monday = get_field('monday');
    $tuesday = get_field('tuesday');
    $wednesday = get_field('wednesday');
    $thursday = get_field('thursday');
    $friday = get_field('friday');
    $saturday = get_field('saturday');
    $sunday = get_field('sunday');
    ?>

    <div class="office-hours">
      <div class="office-hours-title">
                    <h2>OFFICE HOURS</h2>
                </div>
      <div class="office-hours-details">
          <?php if ($monday): ?>
              <p class="day">Monday: <span class="hours"><?php echo esc_html($monday); ?></span></p>
          <?php endif; ?>

          <?php if ($tuesday): ?>
              <p class="day">Tuesday: <span class="hours"><?php echo esc_html($tuesday); ?></span></p>
          <?php endif; ?>

          <?php if ($wednesday): ?>
              <p class="day">Wednesday: <span class="hours"><?php echo esc_html($wednesday); ?></span></p>
          <?php endif; ?>

          <?php if ($thursday): ?>
              <p class="day">Thursday: <span class="hours"><?php echo esc_html($thursday); ?></span></p>
          <?php endif; ?>

          <?php if ($friday): ?>
              <p class="day">Friday: <span class="hours"><?php echo esc_html($friday); ?></span></p>
          <?php endif; ?>

          <?php if ($saturday): ?>
              <p class="day">Saturday: <span class="hours"><?php echo esc_html($saturday); ?></span></p>
          <?php endif; ?>

          <?php if ($sunday): ?>
              <p class="day">Sunday: <span class="hours"><?php echo esc_html($sunday); ?></span></p>
          <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

  </div><!-- .entry-content -->

  <?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer">
      <?php
      edit_post_link(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Edit <span class="screen-reader-text">%s</span>', 'allure-studio' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post( get_the_title() )
        ),
        '<span class="edit-link">',
        '</span>'
      );
      ?>
    </footer><!-- .entry-footer -->
  <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->