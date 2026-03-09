<?php
defined( 'ABSPATH' ) || exit;

// Breadcrumbs
add_action( 'steel_breadcrumbs',  'steel_breadcrumbs' );

// Product rating
add_action( 'steel_product_rating', 'steel_product_rating', 10, );

// Category cards
add_action( 'steel_category_cards', 'steel_category_cards', 10, );

// Catalog drop-down menu
add_action( 'steel_dropdown_catalog', 'steel_dropdown_catalog', 10 );

// Product carousel
add_action( 'steel_product_carousel', 'steel_product_carousel', 10, 3 );

// Home page banner
add_action( 'steel_hero_slider', 'steel_hero_slider', 10 );