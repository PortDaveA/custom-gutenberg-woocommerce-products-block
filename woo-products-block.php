<?php
/**
 * Plugin Name: Custom WooCommerce Products Block
 * Description: A simple Gutenberg block to display WooCommerce products.
 * Version: 1.0.0
 * Author: Anil
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


// Code written in a modular fashion, as requested in task document.
require_once plugin_dir_path( __FILE__ ) . 'includes/class-register-block.php'; //Register Gutenberg block
require_once plugin_dir_path( __FILE__ ) . 'includes/class-render-block.php'; //Render products and details

// Use names spaces from the afforementioned. 
use WooProductsBlock\RegisterBlock;
use WooProductsBlock\RenderBlock;
