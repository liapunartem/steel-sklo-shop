<?php
defined( 'ABSPATH' ) || exit;

add_action( 'steel_footer_logo_mobile', function() {
    steel_logo( 'footer__logo footer__logo--mobile' );}
, 10 );

// === FOOTER PAGE NAVIGATION HOOKS ===
add_action( 'steel_footer_page_nav', function() {
    steel_logo( 'footer__logo' );
}, 10 );
add_action( 'steel_footer_page_nav', 'steel_footer_menu', 20 );

// === FOOTER CATALOG HOOKS ===
add_action( 'steel_footer_catalog', 'steel_footer_catalog', 10 );

// === FOOTER CONTACT HOOKS ===
add_action( 'steel_footer_contact', 'steel_footer_address', 10 );
add_action( 'steel_footer_contact', 'steel_footer_emails', 20 );
add_action( 'steel_footer_contact', 'steel_footer_phone_numbers', 30 );
add_action( 'steel_footer_contact', 'steel_footer_work_schedule', 40 );