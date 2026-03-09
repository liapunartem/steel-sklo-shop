<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- START HEADER -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                Пн-Пт: 10.00-18.00 Сб: 11.00-17.00 Нд: вихiдний
            </div>
        </div>
        <div class="header__middle">
            <div class="container">
                <?php do_action( 'steel_header_middle' ); ?>
            </div>
        </div>
        <div class="header__bottom">
            <div class="container">
                <?php do_action( 'steel_header_bottom' ); ?>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- START CONTENT -->
    <div id="content" class="site-content">
