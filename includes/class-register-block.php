<?php
namespace WooProductsBlock;

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class RegisterBlock {

    // Instance of RenderBlock (used for dynamic callback).
    // @var RenderBlock
    private $render_block;

    // Constructor.
    // @param RenderBlock $render_block Instance of the RenderBlock class.
    public function __construct( RenderBlock $render_block ) {
        $this->render_block = $render_block;
    }

    // Registers the block using register_block_type.
    public function register() {
        // get dependencies from build/index.asset.php
        $asset_file = include plugin_dir_path( __DIR__ ) . 'build/index.asset.php';

        // Register the editor script
        wp_register_script(
            'woo-products-block-editor-script',
            plugins_url( 'build/index.js', dirname( __FILE__ ) ),
            $asset_file['dependencies'],
            $asset_file['version']
        );

        // Register the block
        register_block_type(
            'woo-products-block/products',
            [
                'editor_script'   => 'woo-products-block-editor-script',
                'render_callback' => [ $this->render_block, 'render' ],
            ]
        );
    }
}
