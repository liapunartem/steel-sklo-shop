<?php
defined( 'ABSPATH' ) || exit;

/**
 * Universal function to get WooCommerce categories with images and children.
 *
 * @param array|null $slugs  Optional array of category slugs to filter.
 * @return array             Structured category data.
 */
function steel_get_categories_tree( $slugs = null ) {

    $exclude_uncategorized = [ get_option( 'default_product_cat' ) ];

    $args = [
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0,
        'exclude'    => $exclude_uncategorized,
    ];

    // If a list of slugs is passed
    if ( is_array( $slugs ) && ! empty( $slugs ) ) {
        $args['slug'] = $slugs;
    }

    $categories = get_terms( $args );

    if ( empty( $categories ) || is_wp_error( $categories ) ) {
        return [];
    }

    // Building a tree
    $result = [];
    foreach ( $categories as $cat ) {
        $result[] = steel_build_category_node( $cat );
    }

    // If slugs are passed, sort in the same order
    if ( ! empty( $slugs ) ) {
        usort( $result, function ( $a, $b ) use ( $slugs ) {
            return array_search( $a['slug'], $slugs ) <=> array_search( $b['slug'], $slugs );
        });
    }

    return $result;
}

/**
 * Build single category node (recursive).
 *
 * @param WP_Term $cat
 * @return array
 */
function steel_build_category_node( $cat ) {

    // Image
    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
    $image_url    = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : wc_placeholder_img_src();

    // Get child categories
    $children_terms = get_terms([
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => $cat->term_id,
        'exclude'    => [ get_option( 'default_product_cat' ) ],
    ]);

    $children = [];

    if ( ! empty( $children_terms ) && ! is_wp_error( $children_terms ) ) {
        foreach ( $children_terms as $child ) {
            $children[] = steel_build_category_node( $child ); // recursion
        }
    }

    return [
        'id'       => $cat->term_id,
        'name'     => $cat->name,
        'slug'     => $cat->slug,
        'link'     => get_term_link( $cat ),
        'image'    => $image_url,
        'children' => $children,
    ];
}

function steel_find_child_category_by_slug( $node, $slug ) {

    if ( $node['slug'] === $slug ) {
        return $node;
    }

    foreach ( $node['children'] as $child ) {
        $found = steel_find_child_category_by_slug( $child, $slug );
        if ( $found ) {
            return $found;
        }
    }

    return false;
}