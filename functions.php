<?php
defined( 'ABSPATH' ) || exit;

// Connecting hook files
require_once get_template_directory() . '/inc/hooks/header.php';
require_once get_template_directory() . '/inc/hooks/footer.php';
require_once get_template_directory() . '/inc/hooks/offcanvas.php';
require_once get_template_directory() . '/inc/hooks/components.php';

// Connecting template functions
require_once get_template_directory() . '/inc/template-functions/header.php';
require_once get_template_directory() . '/inc/template-functions/footer.php';
require_once get_template_directory() . '/inc/template-functions/offcanvas.php';
require_once get_template_directory() . '/inc/template-functions/components.php';
require_once get_template_directory() . '/inc/template-functions/helpers.php';

// Connecting template functions for Woocommerce
require_once get_template_directory() . '/inc/woocommerce/breadcrumbs.php';



// Version constant for child theme
if ( ! defined( 'THEME_VERSION' ) ) {
    define( 'THEME_VERSION', wp_get_theme()->get('Version') );
}


// Registration of custom navigation menus
add_action('init', 'steel_menus');
function steel_menus() {
    register_nav_menu( 'header', 'Основне меню гавігації шапки' );
    register_nav_menu( 'footer', 'Основне меню гавігації підвалу' );
}


// === SCRIPT CONNECTION HOOKS ===
add_action( 'wp_enqueue_scripts', 'steel_dequeue_woocommerce_styles', 25 );
add_action( 'wp_enqueue_scripts', 'steel_enqueue_style', 30 );
add_action( 'wp_enqueue_scripts', 'steel_enqueue_scripts', 35);

// 1. Disabling Woocommerce Styles
function steel_dequeue_woocommerce_styles() {
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

// 2. Connecting styles
function steel_enqueue_style() {
    wp_enqueue_style( 'Roboto-font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap' );
    wp_enqueue_style( 'material-symbols', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' );
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', [], THEME_VERSION );
}

// 3. Connecting scripts
function steel_enqueue_scripts() {
    wp_enqueue_script( 'cards-js', get_template_directory_uri() . '/assets/js/cards.js', [], THEME_VERSION, true );
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', [], null, true );
    wp_enqueue_script( 'sliders-js', get_template_directory_uri() . '/assets/js/sliders.js', ['swiper-js'], THEME_VERSION, true );
    wp_enqueue_script( 'offcanvas-js', get_template_directory_uri() . '/assets/js/offcanvas.js', [], THEME_VERSION, true );
    wp_enqueue_script( 'sidebar-js', get_template_directory_uri() . '/assets/js/sidebar.js', [], THEME_VERSION, true );
    wp_enqueue_script( 'footer-js', get_template_directory_uri() . '/assets/js/footer.js', [], THEME_VERSION, true );

    if ( ! is_front_page() ) {
        wp_enqueue_script( 'header-js', get_template_directory_uri() . '/assets/js/header.js', [], THEME_VERSION, true );
    }
}
