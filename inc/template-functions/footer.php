<?php
defined( 'ABSPATH' ) || exit;

/**
 * Displays the footer menu
 */
function steel_footer_menu() {
    ?><nav><?php
        wp_nav_menu( [
            'theme_location' => 'footer',
            'container'      => true,
            'menu_class'     => 'footer__menu',
            'fallback_cb'    => '__return_false',
        ] );
    ?></nav><?php
}

/**
 * Displays main categories in the footer
 */
function steel_footer_catalog() {
    ?><ul class="footer__categories"><?php
    wp_list_categories([
        'taxonomy'     => 'product_cat',
        'title_li'     => '',
        'hide_empty'   => true,
        'hierarchical' => true,
        'depth'        => 1 // 1 only main categories
    ]);
    ?></ul><?php
}

/**
 * Displays the address in the footer
 */
function steel_footer_address() {
    ?>
        <div class="footer__contact-item">
            <div class="footer__contact-title">
                <span class="footer__contact-icon material-symbols">location_on</span>
                Адреса магазину
            </div>
            <span class="footer__contact-text">м. Київ, м. Позняки, пр-т Петра Григоренка, 39 В</span>
        </div>
    <?php
}

/**
 * Displays Email in the footer
 */
function steel_footer_emails() {
    ?>
        <div class="footer__contact-item">
            <div class="footer__contact-title">
                <span class="footer__contact-icon material-symbols">mail</span>
                Email
            </div>
            <span class="footer__contact-text">info@qwe.com.ua</span>
        </div>
    <?php
}

/**
 * Displays phone numbers in the footer
 */
function steel_footer_phone_numbers() {
    ?>
        <div class="footer__contact-item">
            <div class="footer__contact-title">
                <span class="footer__contact-icon material-symbols">call</span>
                Ззв'язатись
            </div>
            <span class="footer__contact-text">
                +380xxxxxxxxxx
                +380xxxxxxxxxx
                +380xxxxxxxxxx
            </span>
        </div>
    <?php
}

/**
 * displays the work schedule in the footer
 */
function steel_footer_work_schedule() {
    ?>
        <div class="footer__contact-item">
            <div class="footer__contact-title">
                <span class="footer__contact-icon material-symbols">schedule</span>
                Графік роботи
            </div>
            <span class="footer__contact-text">
                Пн-Пт: 10.00-18.00 <br>
                Сб: 11.00-17.00 <br>
                Вс: выходной
            </span>
        </div>
    <?php
}
