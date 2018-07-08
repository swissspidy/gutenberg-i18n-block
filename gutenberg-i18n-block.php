<?php
/**
 * Plugin Name: Gutenberg I18N Block
 * Plugin URI:  https://github.com/swissspidy/gutenberg-i18n-block
 * Description: Gutenberg block to demo internationalization functionality.
 * Author:      Pascal Birchler (@swissspidy)
 * Author URI:  https://pascalbirchler.com
 * Text Domain: gutenberg-i18n-block
 * Domain Path: /languages
 * Version:     0.1.0
 */

 namespace Swissspidy\Gutenberg\Blocks\I18n;

 /**
  * Load all translations for our plugin from the MO file.
  */
function load_textdomain() {
	load_plugin_textdomain( 'gutenberg-i18n-block', false, basename( __DIR__ ) . '/languages' );
}

add_action( 'init', __NAMESPACE__ . '\load_textdomain' );

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * Passes translations to JavaScript.
 */
function register_block() {
	wp_register_script(
		'gutenberg-i18n-block-editor',
		plugins_url( 'block/block.js', __FILE__ ),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		),
		'0.0.1'
	);

	wp_register_style(
		'gutenberg-i18n-block-editor',
		plugins_url( 'block/editor.css', __FILE__ ),
		array(
			'wp-blocks',
		),
		'0.0.1'
	);

	wp_register_style(
		'gutenberg-i18n-block',
		plugins_url( 'block/style.css', __FILE__ ),
		array(
			'wp-blocks',
		),
		'0.0.1'
	);

	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}

	register_block_type( 'gutenberg-i18n-block/block', array(
		'editor_script' => 'gutenberg-i18n-block-editor',
		'editor_style'  => 'gutenberg-i18n-block-editor',
		'style'         => 'gutenberg-i18n-block',
	) );

	/*
	 * Pass already loaded translations to our JavaScript.
	 *
	 * This happens _before_ our JavaScript runs, afterwards it's too late.
	 */
	wp_add_inline_script(
		'gutenberg-i18n-block-editor',
		'wp.i18n.setLocaleData( ' . json_encode( gutenberg_get_jed_locale_data( 'gutenberg-i18n-block' ) ) . ', "gutenberg-i18n-block" );',
		'before'
	);
}

add_action( 'init', __NAMESPACE__ . '\register_block', 20 );
