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


//Main class

class Woo_Products_Block_Plugin {

  
    public function __construct() {
        add_action( 'init', [ $this, 'initialize_plugin' ] );
    }

   
    public function initialize_plugin() {
        // Create an instance of our RenderBlock class (for rendering products).
        $render_block  = new RenderBlock();

        // Create an instance of our RegisterBlock class (to register the block).
        $register_block = new RegisterBlock( $render_block );

       //Register afforementioned block. 
        $register_block->register();
    }
}


new Woo_Products_Block_Plugin();
