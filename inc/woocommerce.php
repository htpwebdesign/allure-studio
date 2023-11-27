<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Allure_Studio
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function allure_studio_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width' => 300,
			'product_grid' => array(
				'default_rows' => 3,
				'min_rows' => 1,
				'default_columns' => 4,
				'min_columns' => 1,
				'max_columns' => 6,
			),
		)
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'allure_studio_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function allure_studio_woocommerce_scripts()
{
	wp_enqueue_style('allure-studio-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

	$font_path = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style('allure-studio-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'allure_studio_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function allure_studio_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'allure_studio_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function allure_studio_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns' => 3,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'allure_studio_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('allure_studio_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function allure_studio_woocommerce_wrapper_before()
	{
		?>
																													<main id="primary" class="site-main">
																												<?php
	}
}
add_action('woocommerce_before_main_content', 'allure_studio_woocommerce_wrapper_before');

if (!function_exists('allure_studio_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function allure_studio_woocommerce_wrapper_after()
	{
		?>
																													</main><!-- #main -->
																												<?php
	}
}
add_action('woocommerce_after_main_content', 'allure_studio_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'allure_studio_woocommerce_header_cart' ) ) {
			allure_studio_woocommerce_header_cart();
		}
	?>
 */

if (!function_exists('allure_studio_woocommerce_cart_link_fragment')) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function allure_studio_woocommerce_cart_link_fragment($fragments)
	{
		ob_start();
		allure_studio_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'allure_studio_woocommerce_cart_link_fragment');

if (!function_exists('allure_studio_woocommerce_cart_link')) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function allure_studio_woocommerce_cart_link()
	{
		?>
																												<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'allure-studio'); ?>">
																													<?php
																													$item_count_text = sprintf(
																														/* translators: number of items in the mini cart. */
																														_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'allure-studio'),
																														WC()->cart->get_cart_contents_count()
																													);
																													?>
																													<span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span class="count"><?php echo esc_html($item_count_text); ?></span>
																												</a>
																												<?php
	}
}

if (!function_exists('allure_studio_woocommerce_header_cart')) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function allure_studio_woocommerce_header_cart()
	{
		if (is_cart()) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
																												<ul id="site-header-cart" class="site-header-cart">
																													<li class="<?php echo esc_attr($class); ?>">
																														<?php allure_studio_woocommerce_cart_link(); ?>
																													</li>
																													<li>
																														<?php
																														$instance = array(
																															'title' => '',
																														);

																														the_widget('WC_Widget_Cart', $instance);
																														?>
																													</li>
																												</ul>
																												<?php
	}
}

// Display product's description between title and price on Shop page
function ts_display_short_description_between_title_and_price()
{
	global $product;

	// Check if we are on the Shop page
	if (is_shop()) {
		// Retrieve and display the product's short description
		$short_description = $product->get_description();
		if (!empty($short_description)) {
			echo '<div class="product-short-description">' . $short_description . '</div>';
		}
	}
}
add_action('woocommerce_shop_loop_item_title', 'ts_display_short_description_between_title_and_price');

// Remove Read More links from shop page
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Remove breadcrumbs from single product page
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// Replace breadcrumbs on single product page
function single_product_breadcrumb()
{
	if (is_product()) {
		echo '<nav class="woocommerce-breadcrumb">';
		echo '<a href="' . esc_url(home_url()) . '">Home</a>';
		echo '/';
		echo '<a href="' . get_permalink(wc_get_page_id('shop')) . '">Our Services</a>';
		echo '/';
		echo the_title('<span>', '</span>');
		echo '</nav>';
		return;
	}
	return;
}
add_action('woocommerce_before_main_content', 'single_product_breadcrumb', 20);


// Remove sidebar from single-product page
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Remove meta data from single-product page
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
// Remove related products from single-product page
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// Add cancellation policy to single-product page
function display_cancellation_policy()
{
	if (get_field('cancellation_policy')) {
		echo '<div class="cancellation-policy"><h2>Cancellation Policy</h2><p>' . esc_html(get_field('cancellation_policy')) . '</p></div>';
	}
}
add_action('woocommerce_after_single_product_summary', 'display_cancellation_policy', 15);

// Disable image zoom on single-product page
function remove_image_zoom_support()
{
	remove_theme_support('wc-product-gallery-zoom');
}
add_action('wp', 'remove_image_zoom_support', 100);