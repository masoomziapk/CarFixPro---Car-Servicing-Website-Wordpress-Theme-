<?php
// Theme Setup
function carfixpro_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'carfixpro'),
    ]);
}
add_action('after_setup_theme', 'carfixpro_theme_setup');

// Enqueue Styles and Scripts
function carfixpro_enqueue_assets() {
    // Enqueue Bootstrap CSS from CDN
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );

    // Add Font Awesome
    wp_enqueue_style(
    'font-awesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
    [],
    '6.5.0'
);

    // Main theme stylesheet
    wp_enqueue_style(
        'carfixpro-style',
        get_stylesheet_uri(),
        ['bootstrap-css'],
        wp_get_theme()->get('Version')
    );

    // Optional: Bootstrap JS (with Popper)
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true
    );
}
add_action('wp_enqueue_scripts', 'carfixpro_enqueue_assets');

// 🔧 Register "Services" Custom Post Type
function carfixpro_register_services_cpt() {
    $labels = [
        'name'               => __('Services', 'carfixpro'),
        'singular_name'      => __('Service', 'carfixpro'),
        'add_new'            => __('Add New Service', 'carfixpro'),
        'add_new_item'       => __('Add New Service', 'carfixpro'),
        'edit_item'          => __('Edit Service', 'carfixpro'),
        'new_item'           => __('New Service', 'carfixpro'),
        'view_item'          => __('View Service', 'carfixpro'),
        'search_items'       => __('Search Services', 'carfixpro'),
        'not_found'          => __('No services found', 'carfixpro'),
        'menu_name'          => __('Services', 'carfixpro'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => ['title', 'editor', 'thumbnail'],
        'rewrite'            => ['slug' => 'services'],
        'show_in_rest'       => true,
    ];

    register_post_type('car_service', $args);
}
add_action('init', 'carfixpro_register_services_cpt');

// 👤 Register "Testimonials" Custom Post Type
function carfixpro_register_testimonials_cpt() {
    $labels = [
        'name'               => __('Testimonials', 'carfixpro'),
        'singular_name'      => __('Testimonial', 'carfixpro'),
        'add_new_item'       => __('Add New Testimonial', 'carfixpro'),
        'edit_item'          => __('Edit Testimonial', 'carfixpro'),
        'new_item'           => __('New Testimonial', 'carfixpro'),
        'menu_name'          => __('Testimonials', 'carfixpro'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => ['title', 'editor', 'thumbnail'],
        'rewrite'            => ['slug' => 'testimonials'],
        'show_in_rest'       => true,
    ];

    register_post_type('testimonial', $args);
}
add_action('init', 'carfixpro_register_testimonials_cpt');

