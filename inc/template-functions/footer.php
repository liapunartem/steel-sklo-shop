<?php
defined( 'ABSPATH' ) || exit;

/**
 * Displays the footer logo
 */
function steel_footer_logo() {
    ?>  
        <a class="footer-logo" href="<?php echo esc_url( home_url() ); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" 
                alt="Steel Sklo Shop">
        </a>
    <?php
}

/**
 * Displays the footer menu
 */
function steel_footer_menu() {
    ?><nav><?php
        wp_nav_menu( [
            'theme_location' => 'footer',
            'container'      => true,
            'menu_class'     => 'footer-menu',
            'fallback_cb'    => '__return_false',
        ] );
    ?></nav><?php
}

/**
 * Displays main categories in the footer
 */
function steel_footer_main_categories() {
    ?><ul class="footer-categories"><?php
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
        <div class="contact-elem">
            <div class="contact-title">
                <span class="contact-icon material-symbols">location_on</span>
                Адреса магазину
            </div>
            м. Київ, м. Позняки, пр-т Петра Григоренка, 39 В
        </div>
    <?php
}

/**
 * Displays Email in the footer
 */
function steel_footer_emails() {
    ?>
        <div class="contact-elem">
            <div class="contact-title">
                <span class="contact-icon material-symbols">mail</span>
                Email
            </div>
            info@qwe.com.ua
        </div>
    <?php
}

/**
 * Displays phone numbers in the footer
 */
function steel_footer_phone_numbers() {
    ?>
        <div class="contact-elem">
            <div class="contact-title">
                <span class="contact-icon material-symbols">call</span>
                Ззв'язатись
            </div>
            +380xxxxxxxxxx
            +380xxxxxxxxxx
            +380xxxxxxxxxx
        </div>
    <?php
}

/**
 * displays the work schedule in the footer
 */
function steel_footer_work_schedule() {
    ?>
        <div class="contact-elem">
            <div class="contact-title">
                <span class="contact-icon material-symbols">schedule</span>
                Графік роботи
            </div>
            Пн-Пт: 10.00-18.00 <br>
            Сб: 11.00-17.00 <br>
            Вс: выходной
        </div>
    <?php
}
