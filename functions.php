<?php
/**
 * CarFixPro Theme Functions
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function carfixpro_theme_setup() {
    // Add support for various WP features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );

    // Register navigation menus
    register_nav_menus([
        'primary' => __( 'Primary Menu', 'carfixpro' ),
        'footer'  => __( 'Footer Menu', 'carfixpro' ),
    ]);
}
add_action( 'after_setup_theme', 'carfixpro_theme_setup' );

/**
 * Enqueue Scripts and Styles
 */
function carfixpro_enqueue_assets() {
    // Main Stylesheet
    wp_enqueue_style( 'carfixpro-style', get_stylesheet_uri() );

    // Custom CSS
    wp_enqueue_style( 'carfixpro-main', get_template_directory_uri() . '/assets/css/main.css', [], '1.0' );

    // JS for navigation toggle
    wp_enqueue_script( 'carfixpro-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'carfixpro_enqueue_assets' );

/**
 * Register Widgets (Sidebar)
 */
function carfixpro_widgets_init() {
    register_sidebar([
        'name'          => __( 'Main Sidebar', 'carfixpro' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here.', 'carfixpro' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action( 'widgets_init', 'carfixpro_widgets_init' );

/**
 * Register Custom Post Types
 */
function carfixpro_register_custom_post_types() {
    // Services
    register_post_type( 'service', [
        'labels' => [
            'name'               => __( 'Services', 'carfixpro' ),
            'singular_name'      => __( 'Service', 'carfixpro' ),
            'add_new_item'       => __( 'Add New Service', 'carfixpro' ),
            'edit_item'          => __( 'Edit Service', 'carfixpro' ),
            'new_item'           => __( 'New Service', 'carfixpro' ),
            'view_item'          => __( 'View Service', 'carfixpro' ),
            'search_items'       => __( 'Search Services', 'carfixpro' ),
            'not_found'          => __( 'No services found', 'carfixpro' ),
        ],
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-car',
        'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'rewrite'            => [ 'slug' => 'services' ],
    ]);

    // Testimonials
    register_post_type( 'testimonial', [
        'labels' => [
            'name'               => __( 'Testimonials', 'carfixpro' ),
            'singular_name'      => __( 'Testimonial', 'carfixpro' ),
            'add_new_item'       => __( 'Add New Testimonial', 'carfixpro' ),
            'edit_item'          => __( 'Edit Testimonial', 'carfixpro' ),
            'new_item'           => __( 'New Testimonial', 'carfixpro' ),
            'view_item'          => __( 'View Testimonial', 'carfixpro' ),
            'search_items'       => __( 'Search Testimonials', 'carfixpro' ),
            'not_found'          => __( 'No testimonials found', 'carfixpro' ),
        ],
        'public'             => true,
        'has_archive'        => false,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => [ 'title', 'editor', 'thumbnail' ],
        'rewrite'            => [ 'slug' => 'testimonials' ],
    ]);
}
add_action( 'init', 'carfixpro_register_custom_post_types' );
