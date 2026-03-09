<?php
defined( 'ABSPATH' ) || exit;

// Adding a custom structure for breadcrumbs
add_filter( 'woocommerce_breadcrumb_defaults', 'steel_breadcrumbs_defaults' );
function steel_breadcrumbs_defaults( $defaults ) {

    return [
        'delimiter'   => '<span class="breadcrumb__sep">/</span>',
        'wrap_before' => '<nav class="breadcrumb"><ol class="breadcrumb__list">',
        'wrap_after'  => '</ol></nav>',
        'before'      => '<li class="breadcrumb__item">',
        'after'       => '</li>',
        'home'        => 'Головна'
    ];
}