<?php get_header(); ?>

<main>
    <div class="home-content-top container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <?php do_action( 'steel_dropdown_catalog' ) ?>
        </aside>
        <div>
            <!-- Hero -->
            <section class="hero">
                <?php do_action( 'steel_hero_slider' ); ?>
            </section>

            <!-- Popular categories -->
            <section class="popular-categories">
                <header class="section-title"><h2>Популярні категорії</h2></header>
                <div class="popular-categories__grid">
                    <?php do_action(
                        'steel_category_cards', 
                        [ 'music', 'clothing', 'tshirts', 'decor' ]
                    ); ?>
                </div>
                <footer class="popular-categories__show-more-link">
                    <a href="/catalog">
                        Всі категорії
                        <span class="material-symbols">stat_minus_1</span>
                    </a>
                    
                </footer>
            </section>

            <!-- Popular products -->
            <section class="popular-products">
                <header class="section-title"><h2>Популярні товари</h2></header>
                    <?php do_action( 'steel_product_carousel', [70, 71, 72, 73, 74], "ergeg", "da" ); ?>
            </section>

            <!-- New products -->
            <section class="new-products">
                <header class="section-title"><h2>Новинки</h2></header>
                    <?php do_action( 'steel_product_carousel', [81, 82, 83, 84, 61], "ergeg", "da" ); ?>
            </section>
        </div>

    </div>
    <div class="container">
        
    </div>
</main>

<?php get_footer(); ?>