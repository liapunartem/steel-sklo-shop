<?php
defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product || ! $product->is_visible() ) {
    return;
}

$product_id   = $product->get_id();
$product_link = get_permalink( $product_id );
?>

<div <?php wc_product_class( 'product-card', $product ); ?>>

    <div class="product-card__image-wrapper">
        <a href="<?php echo esc_url( $product_link ); ?>" class="product-card__image-link">
            <?php echo $product->get_image(); ?>
        </a>

        <button class="product-card__wishlist material-symbols material-symbols--filled" type="button">favorite</button>
    </div>

    <div class="product-card__body">
        <div class="product-card__title">
            <a href="<?php echo esc_url( $product_link ); ?>">
                <?php echo esc_html( $product->get_name() ); ?>
            </a>
        </div>

        <div class="product-card__price">
            <?php woocommerce_template_single_price(); ?>
        </div>

        <?php do_action( 'steel_product_rating', $product ); ?>
        
        <?php woocommerce_template_loop_add_to_cart(); ?>
    </div>


</div>
