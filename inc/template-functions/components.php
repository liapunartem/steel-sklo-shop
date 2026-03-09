<?php
defined( 'ABSPATH' ) || exit;

/**
 * Displays breadcrumbs
 */
function steel_breadcrumbs() {
    if ( function_exists( 'woocommerce_breadcrumb' ) ) {
        woocommerce_breadcrumb();
    }
}

/**
 * Displays product rating
 */
function steel_product_rating( $product ) {
    if ( ! $product ) return;

    $rating = floatval( $product->get_average_rating() );
    $max = 5;
    ?>
    
    <div class="product-card__rating">
        <?php for ( $i = 1; $i <= $max; $i++ ): ?>

            <?php if ( $rating >= $i ): ?>
                <span class="material-symbols material-symbols--filled">star</span>

            <?php elseif ( $rating >= ($i - 0.5) ): ?>
                <span class="material-symbols">star_half</span>

            <?php else: ?>
                <span class="material-symbols material-symbols--filled empty">star</span>

            <?php endif; ?>

        <?php endfor; ?>
    </div>
    <?php
}

/**
 * Render WooCommerce category cards.
 *
 * Modes:
 * 1. If $slugs provided → show specific categories.
 * 2. If $slugs empty → show top-level categories.
 * 3. If $show_children_current = true → show children of current category.
 *
 * @param array $slugs Slugs of categories to display.
 * @param bool  $show_children_current Show children of current category.
 */
function steel_category_cards( $slugs = [], $show_children_current = false ) {

    if ( ! taxonomy_exists( 'product_cat' ) ) {
        return;
    }

    $categories = [];

    /**
     * Mode: show children of current category.
     */
    if ( $show_children_current && is_tax( 'product_cat' ) ) {

        $current = get_queried_object();

        $categories = get_terms( [
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => $current->term_id,
        ] );

    /**
     * Mode: show specific categories by slug.
     */
    } elseif ( ! empty( $slugs ) ) {

        $categories = get_terms( [
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'slug'       => $slugs,
        ] );

    /**
     * Default mode: show top level categories.
     */
    } else {

        $categories = get_terms( [
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => 0,
        ] );

    }

    if ( empty( $categories ) || is_wp_error( $categories ) ) {
        return;
    }

    /**
     * Prepare output array.
     */
    $output_items = [];

    foreach ( $categories as $cat ) {

        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image        = wp_get_attachment_url( $thumbnail_id );

        $output_items[] = [
            'name'  => $cat->name,
            'link'  => get_term_link( $cat ),
            'image' => $image,
        ];
    }

    /**
     * Render category cards.
     */
    foreach ( $output_items as $cat ) :
        ?>

        <a href="<?php echo esc_url( $cat['link'] ); ?>" class="category-card">

            <div class="category-card__wrapper">
                <div class="category-card__overlay"></div>
            </div>

            <div class="category-card__wrapper">
                <span class="category-card__title">
                    <?php echo esc_html( $cat['name'] ); ?>
                    <span class="material-symbols">chevron_right</span>
                </span>
            </div>

            <img
                src="<?php echo esc_url( $cat['image'] ); ?>"
                alt="<?php echo esc_attr( $cat['name'] ); ?>"
            >

        </a>

        <?php
    endforeach;
}

/**
 * Displays the catalog drop-down menu
 */
function steel_dropdown_catalog() {
    // 1. Отримуємо всі головні категорії
    $parent_cats = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => 0,
    ]);

    if ( empty( $parent_cats ) || is_wp_error( $parent_cats ) ) {
        return;
    }

    // 2. Формуємо структуру (категорія → підкатегорії)
    $catalog_data = [];

    foreach ( $parent_cats as $cat ) {

        $sub_terms = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'parent'     => $cat->term_id,
        ]);

        $catalog_data[] = [
            'name'   => $cat->name,
            'link'   => get_term_link( $cat ),
            'subs'   => $sub_terms,
        ];
    }

    // 3. HTML-вивід
    ?>
    <ul class="dropdown-catalog">

        <?php foreach ( $catalog_data as $item ) : ?>
            <li class="dropdown-catalog__item">

                <div class="dropdown-catalog__link">
                    <a href="<?php echo esc_html( $item['link'] ); ?>">
                        <span class="dropdown-catalog__title"><?php echo esc_html( $item['name'] ); ?></span>
                    </a>
                    <span class="dropdown-catalog__icon"></span>
                </div>

                <?php if ( ! empty( $item['subs'] ) ) : ?>
                    <ul class="dropdown-catalog__sublist">
                        <?php foreach ( $item['subs'] as $sub ) : ?>
                            <li class="dropdown-catalog__subitem">
                                <div class="dropdown-catalog__link">
                                    <a href="<?php echo esc_url( get_term_link( $sub ) ); ?>">
                                        <span class="dropdown-catalog__title"><?php echo esc_html( $sub->name ); ?></span>
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </li>
        <?php endforeach; ?>

    </ul>
    <?php
}

/**
 * Universal product carousel renderer
 *
 * @param array $ids            Array of product IDs
 * @param string|null $more_text  Optional final slide button text
 * @param string|null $more_link  Optional final slide button link
 */
function steel_product_carousel( $ids = [], $more_text = null, $more_link = null ) {

    if ( empty( $ids ) || ! is_array( $ids ) ) {
        return;
    }

    // Numeric filtering only
    $ids = array_filter( $ids, 'is_numeric' );

    if ( empty( $ids ) ) {
        return;
    }

    $query = new WP_Query([
        'post_type'      => 'product',
        'post__in'       => $ids,
        'orderby'        => 'post__in',
        'posts_per_page' => -1,
    ]);
    ?>

    <div class="product-carousel swiper">
        <ul class="swiper-wrapper">

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li class="swiper-slide">
                    <?php wc_get_template_part( 'content', 'product' ); ?>
                </li>
            <?php endwhile; ?>

            <?php if ( $more_text && $more_link ) : ?>
                <div class="swiper-slide swiper-slide--show-more">
                    <a href="<?php echo esc_url( $more_link ); ?>" class="view-all-btn">
                        <?php echo esc_html( $more_text ); ?>
                    </a>
                </div>
            <?php endif; ?>

        </ul>
        <!-- Стрілки -->
        <?php steel_slider_buttons() ?>
    </div>

    <?php
    wp_reset_postdata();
}

/**
 * Displays the home page banner
 */
function steel_hero_slider() {
    ?>
        <div class="hero-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero-1.webp" alt="Slide 1">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero-2.webp" alt="Slide 2">
                    </div>
                    <div class="swiper-slide">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero-3.webp" alt="Slide 3">
                    </div>
                </div>
                <!-- Пагінація -->
                <div class="swiper-pagination"></div>
                <!-- Стрілки -->
                <?php steel_slider_buttons() ?>
                
        </div>
    <?php
}

/**
 * Displays slider buttons
 */
function steel_slider_buttons() {
    ?>
        <div class="btn btn--alt slider-button slider-button--next">
            <div class="material-symbols">arrow_right_alt</div>
        </div>
        <div class="btn btn--alt slider-button slider-button--prev">
            <div class="material-symbols">arrow_left_alt</div>
        </div>
    <?php
}