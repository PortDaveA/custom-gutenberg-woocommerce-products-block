<?php
namespace WooProductsBlock;

use WP_Query;
use WC_Product;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class RenderBlock {

    
     //Handles rendering the WooCommerce products block.
     
      //@param array $attributes The block attributes.
      //@return string HTML output of the WooCommerce products listing.
     
    public function render( $attributes ) {
        // Query WooCommerce products (change 'posts_per_page' as needed)
        $args = [
            'post_type'      => 'product',
            'posts_per_page' => 8,
        ];
        $query = new WP_Query( $args );

        // Early return if no products
        if ( ! $query->have_posts() ) {
            return '<p>No products found.</p>';
        }

        // Start output
        ob_start();
        echo '<ul class="woo-products-block">';

        while ( $query->have_posts() ) {
            $query->the_post();
            global $product;

            echo '<li>';
            echo '<a href="' . esc_url( get_permalink() ) . '">';
            // Product image
            echo $product->get_image();
            // Product title
            echo '<h2>' . esc_html( get_the_title() ) . '</h2>';
            // Product price
            echo '<span>' . $product->get_price_html() . '</span>';
            echo '</a>';
            echo '</li>';
        }

        echo '</ul>';

        // Reset post data & return the buffered HTML
        wp_reset_postdata();
        return ob_get_clean();
    }
}
