<?php
defined( 'ABSPATH' ) || exit;

// === CENTER HEADER HOOKS ===
add_action( 'steel_header_middle', function() {
    steel_logo( 'header__logo' );
}, 10 );
add_action( 'steel_header_middle', 'steel_header_menu', 20 );
add_action( 'steel_header_middle', 'steel_header_middle_right_nav', 30 );
add_action( 'steel_header_middle', 'steel_mobile_nav_buttons', 40 );

// === BOTTOM HEADER HOOKS ===
add_action( 'steel_header_bottom', 'steel_catalog_btn', 10 );
add_action( 'steel_header_bottom', 'steel_search', 20 );
add_action( 'steel_header_bottom', 'steel_desktop_nav_buttons', 30 );
