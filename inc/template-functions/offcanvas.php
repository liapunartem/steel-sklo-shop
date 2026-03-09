<?php
defined( 'ABSPATH' ) || exit;

/**
 * Displays the mobile menu canvas.
 */
function steel_mobile_menu() {
    get_template_part( 'template-parts/offcanvas/mobile-menu' );
}

/**
 * Displays the shopping cart canvas.
 */
function steel_cart() {
    get_template_part( 'template-parts/offcanvas/mini-cart' );
}