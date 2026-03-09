<?php
defined( 'ABSPATH' ) || exit;

add_action( 'steel_offcanvas', 'steel_mobile_menu', 10 );
add_action( 'steel_offcanvas', 'steel_cart', 20 );