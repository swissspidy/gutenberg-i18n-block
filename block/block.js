(function (wp) {
  /**
   * Registers a new block provided a unique name and an object defining its behavior.
   * @see https://github.com/WordPress/gutenberg/tree/master/blocks#api
   */
  var registerBlockType = wp.blocks.registerBlockType;
  /**
   * Returns a new element of given type. Element is an abstraction layer atop React.
   * @see https://github.com/WordPress/gutenberg/tree/master/element#element
   */

  var createElement = wp.element.createElement;
  /**
   * Retrieves the translation of text.
   * @see https://github.com/WordPress/gutenberg/tree/master/i18n#api
   */

  var __ = wp.i18n.__;
  /**
   * Every block starts by registering a new block type definition.
   * @see https://wordpress.org/gutenberg/handbook/block-api/
   */

  registerBlockType('gutenberg-i18n-block/block', {
    /**
     * This is the display title for your block, which can be translated with `i18n` functions.
     * The block inserter will show this name.
     */
    title: __('I18N Block', 'gutenberg-i18n-block'),

    /**
     * An icon property should be specified to make it easier to identify a block.
     * These can be any of WordPress’ Dashicons, or a custom svg element.
     */
    icon: 'translation',

    /**
     * Blocks are grouped into categories to help users browse and discover them.
     * The categories provided by core are `common`, `embed`, `formatting`, `layout` and `widgets`.
     */
    category: 'common',

    /**
     * Optional block extended support features.
     */
    supports: {
      // Removes support for an HTML mode.
      html: false
    },

    /**
     * The edit function describes the structure of your block in the context of the editor.
     * This represents what the editor will render when the block is used.
     * @see https://wordpress.org/gutenberg/handbook/block-edit-save/#edit
     *
     * @param {Object} [props] Properties passed from the editor.
     * @return {Element}       Element to render.
     */
    edit: function edit(props) {
      return createElement('p', {
        className: props.className
      }, __('Hello from the editor!', 'gutenberg-i18n-block'));
    },

    /**
     * The save function defines the way in which the different attributes should be combined
     * into the final markup, which is then serialized by Gutenberg into `post_content`.
     * @see https://wordpress.org/gutenberg/handbook/block-edit-save/#save
     *
     * @return {Element} Element to render.
     */
    save: function save() {
      return createElement('p', {}, 'This is the content that gets saved.');
    }
  });
})(window.wp);
