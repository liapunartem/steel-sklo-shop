<?php
/**
 * Catalog page template
 */

get_header(); ?>

<main>
    <div class="container">
        <?php do_action( 'steel_breadcrumbs' ); ?>
    </div>

    <div class="container">
        <h1>Каталог</h1>
    </div>

    <section class="catalog-grid container">
        <?php do_action( 'steel_category_cards' ); ?>
    </section>
</main>

<?php get_footer(); ?>