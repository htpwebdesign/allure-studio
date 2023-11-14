<?php
function register_custom_post_types()
{
    // Register Testimonials
    $labels = array(
        'name' => _x('Testimonials', 'post type general name'),
        'singular_name' => _x('Testimonial', 'post type singular name'),
        'menu_name' => _x('Testimonials', 'admin menu'),
        'name_admin_bar' => _x('Testimonial', 'add new on admin bar'),
        'add_new' => _x('Add New', 'testimonial'),
        'add_new_item' => __('Add New Testimonial'),
        'new_item' => __('New Testimonial'),
        'edit_item' => __('Edit Testimonial'),
        'view_item' => __('View Testimonial'),
        'all_items' => __('All Testimonials'),
        'search_items' => __('Search Testimonials'),
        'parent_item_colon' => __('Parent Testimonials:'),
        'not_found' => __('No testimonials found.'),
        'not_found_in_trash' => __('No testimonials found in Trash.'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 51,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'editor'),
        'template' => array(array('core/quote')),
    );

    register_post_type('ast-testimonial', $args);

    // Register Meet Our Team
    $labels = array(
        'name' => _x('Meet Our Team', 'post type general name'),
        'singular_name' => _x('Service', 'post type singular name'),
        'menu_name' => _x('Meet Our Team', 'admin menu'),
        'name_admin_bar' => _x('Job Posting', 'add new on admin bar'),
        'add_new' => _x('Add New', 'service'),
        'add_new_item' => __('Add New Service'),
        'new_item' => __('New Service'),
        'edit_item' => __('Edit Service'),
        'view_item' => __('View Service'),
        'all_items' => __('All Services'),
        'search_items' => __('Search Services'),
        'parent_item_colon' => __('Parent Services:'),
        'not_found' => __('No Services found.'),
        'not_found_in_trash' => __('No Services found in Trash.'),
        'insert_into_item' => __('Insert into Meet Our Team'),
        'uploaded_to_this_item' => __('Uploaded to this Meet Our Team'),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'meet-our-team'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 52,
        'menu_icon' => 'dashicons-universal-access-alt',
        'supports' => array('title','editor'),
        'template' => array(),
        'template_lock' => 'all',
    );
    register_post_type('ast-meet-our-team', $args);

    // Register Gallery
    $labels = array(
        'name' => _x('Gallery', 'post type general name'),
        'singular_name' => _x('Image', 'post type singular name'),
        'menu_name' => _x('Gallery', 'admin menu'),
        'name_admin_bar' => _x('Image', 'add new on admin bar'),
        'add_new' => _x('Add New', 'image'),
        'add_new_item' => __('Add New Image'),
        'new_item' => __('New Image'),
        'edit_item' => __('Edit Image'),
        'view_item' => __('View Image'),
        'all_items' => __('All Gallery'),
        'search_items' => __('Search Gallery'),
        'parent_item_colon' => __('Parent Gallery:'),
        'not_found' => __('No images found.'),
        'not_found_in_trash' => __('No images found in Trash.'),
        'archives' => __('Gallery Archives'),
        'insert_into_item' => __('Insert into gallery'),
        'uploaded_to_this_item' => __('Uploaded to this gallery'),
        'filter_item_list' => __('Filter gallery list'),
        'items_list_navigation' => __('Gallery list navigation'),
        'items_list' => __('Gallery list'),
        'featured_image' => __('Image featured image'),
        'set_featured_image' => __('Set featured image'),
        'remove_featured_image' => __('Remove featured image'),
        'use_featured_image' => __('Use as featured image'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'gallery'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 50,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title', 'thumbnail', 'editor'),
    );

    register_post_type('ast-gallery', $args);
}
add_action('init', 'register_custom_post_types');

// Register taxonomies
function register_taxonomies()
{
    // Add Gallery Category taxonomy
    $labels = array(
        'name' => _x('Gallery Categories', 'taxonomy general name'),
        'singular_name' => _x('Gallery Category', 'taxonomy singular name'),
        'search_items' => __('Search Gallery Categories'),
        'all_items' => __('All Gallery Category'),
        'parent_item' => __('Parent Gallery Category'),
        'parent_item_colon' => __('Parent Gallery Category:'),
        'edit_item' => __('Edit Gallery Category'),
        'view_item' => __('Vview Gallery Category'),
        'update_item' => __('Update Gallery Category'),
        'add_new_item' => __('Add New Gallery Category'),
        'new_item_name' => __('New Gallery Category Name'),
        'menu_name' => __('Gallery Category'),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menu' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'gallery-categories'),
    );
    register_taxonomy('ast-gallery-categories', array('ast-gallery'), $args);
}
add_action('init', 'register_taxonomies');