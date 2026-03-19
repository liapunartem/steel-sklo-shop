<?php
defined( 'ABSPATH' ) || exit;

/**
 * Displays the header menu
 */
function steel_header_menu() {
    ?><nav><?php
        wp_nav_menu( [
            'theme_location' => 'header',
            'container'      => true,
            'menu_class'     => 'header__menu',
            'fallback_cb'    => '__return_false',
        ] );
    ?></nav><?php
}

// 3. Language switcher and user account
function steel_header_middle_right_nav() {
    ?>
        <div class="header__middle-right-nav">
            <?php steel_lang() ?>
            <?php steel_login() ?>
        </div>
    <?php
}

function steel_lang() {
    ?>
        <div class="lang">RU</div>
    <?php
}

function steel_login() {
    ?>
        <a href="#" class="login">Авторизоваться</a>
    <?php
}

/**
 * Displays navigation buttons in the header for mobile devices
 */
function steel_mobile_nav_buttons() {
    ?>
        <nav class="header__nav-buttons header__nav-buttons--mobile">

            <button class="favourites-btn">
                <span class="material-symbols material-symbols--filled">favorite</span>
            </button>

            <button class="cart-btn">
                <span class="material-symbols material-symbols--filled">shopping_cart</span>
            </button>

            <button class="burger-menu-btn" active="false">
                <span></span><span></span><span></span>
            </button>
            
        </nav>
    <?php
}

/**
 * Displays a catalog button in the header
 */
function steel_catalog_btn() {
    ?>
        <div class="header__catalog-wrapper">
            <button class="header__catalog-btn">
                <div class="header__catalog-btn-title">
                    <span class="material-symbols">view_cozy</span>
                    Каталог товарів
                </div>
                <span class="material-symbols">stat_minus_1</span>
            </button>
            <nav class="header__catalog-nav" open="false">
                <?php steel_dropdown_catalog() ?>
            </nav>
        </div>
    <?php
}

/**
 * Displays a search field in the header
 */
function steel_search() {
    ?>
        <form role="search" method="get" class="product-search" action="https://steel-sklo-shop.local/">
            <label class="screen-reader-text" for="woocommerce-product-search-field-0">Шукати:</label>
            <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="пошук" value="" name="s">
            <button type="submit" value="Шукати">
                <span class="material-symbols">search</span>
            </button>
            <input type="hidden" name="post_type" value="product">
        </form>
    <?php
    
}

/**
 * Displays navigation buttons in the desktop header
 */
function steel_desktop_nav_buttons() {
    ?>
        <nav class="header__nav-buttons header__nav-buttons--desktop">

            <button class="favourites-btn">
                <span class="material-symbols material-symbols--filled">favorite</span>
            </button>

            <button class="cart-btn">
                <span class="material-symbols material-symbols--filled">shopping_cart</span>
            </button>

        </nav>
    <?php
}
