(() => {
    const { registerBlockType } = window.wp.blocks;
    const { useBlockProps } = window.wp.blockEditor;
    const { jsx: _jsx } = window.ReactJSXRuntime;
  
    registerBlockType("woo-products-block/products", {
      title: "WooCommerce Products",
      icon: "cart",
      category: "widgets",
      edit() {
        const blockProps = useBlockProps();
        return _jsx("div", {
          ...blockProps,
          children: "WooCommerce Products to be displayed here ."
        });
      },
      save() {
        return null; // Use dynamic rendering on the front end
      }
    });
  })();
  