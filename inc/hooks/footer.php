<?php
defined( 'ABSPATH' ) || exit;

// === LEFT FOOT HOOKS ===
add_action( 'steel_footer_left', 'steel_footer_logo', 10 );
add_action( 'steel_footer_left', 'steel_footer_menu', 20 );

// === CENTER FOOT HOOKS ===
add_action( 'steel_footer_center', 'steel_footer_main_categories', 10 );

// === RIGHT FOOT HOOKS ===
add_action( 'steel_footer_contact_elem', 'steel_footer_address', 10 );
add_action( 'steel_footer_contact_elem', 'steel_footer_emails', 20 );
add_action( 'steel_footer_contact_elem', 'steel_footer_phone_numbers', 30 );
add_action( 'steel_footer_contact_elem', 'steel_footer_work_schedule', 40 );