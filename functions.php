<?php
/**
 * Allure Studio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Allure_Studio
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function allure_studio_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Allure Studio, use a find and replace
	 * to change 'allure-studio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('allure-studio', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'allure-studio'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'allure_studio_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'allure_studio_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function allure_studio_content_width()
{
	$GLOBALS['content_width'] = apply_filters('allure_studio_content_width', 640);
}
add_action('after_setup_theme', 'allure_studio_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function allure_studio_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'allure-studio'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'allure-studio'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'allure_studio_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function allure_studio_scripts()
{
	wp_enqueue_style('allure-studio-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('allure-studio-style', 'rtl', 'replace');

	wp_enqueue_script('allure-studio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Enqueue Swiper script
	wp_enqueue_script('allure-studio-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), _S_VERSION, true);
	// Enqueue Swiper CSS file
	wp_enqueue_style('allure-studio-swipe', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), _S_VERSION);
	
	// Enqueue lightGallery script
	wp_enqueue_script('lightGallery-script', get_template_directory_uri() . '/js/lightGallery/lightgallery.min.js', array(), _S_VERSION, true);
	// Enqueue lightGallery CSS file
	wp_enqueue_style('lightGallery-style', get_template_directory_uri() . '/css/lightgallery-bundle.min.css', array(), _S_VERSION);	
	
	// Enqueue our own script
	wp_enqueue_script('allure-studio-main', get_template_directory_uri() . '/js/main.js', array('allure-studio-swiper'), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'allure_studio_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Register CPTs and Taxonomies
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

// Remove "Archives" prefix from archive titles
add_filter('get_the_archive_title', function ($title) {
	if (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	return $title;
});