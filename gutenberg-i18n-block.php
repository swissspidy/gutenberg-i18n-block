<?php
/**
 * Plugin Name: Gutenberg I18N Block
 * Plugin URI:  https://github.com/swissspidy/gutenberg-i18n-block
 * Description: Gutenberg block to demo internationalization functionality.
 * Author:      Pascal Birchler (@swissspidy)
 * Author URI:  https://pascalbirchler.com
 * Text Domain: gutenberg-i18n-block
 * Domain Path: /languages
 * Version:     0.2.0
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
	$script_dependencies = file_exists( __DIR__ . '/build/index.deps.json' )
		? json_decode( file_get_contents( __DIR__ . '/build/index.deps.json' ), false )
		: array();

	wp_register_script(
		'gutenberg-i18n-block-editor',
		plugins_url( 'dist/index.js', __FILE__ ),
		$script_dependencies,
		'0.2.0'
	);

	wp_set_script_translations( 'gutenberg-i18n-block-editor', 'gutenberg-i18n-block' );

	wp_register_style(
		'gutenberg-i18n-block-editor',
		plugins_url( 'assets/editor.css', __FILE__ ),
		array(
			'wp-blocks',
		),
		'0.2.0'
	);

	wp_register_style(
		'gutenberg-i18n-block',
		plugins_url( 'assets/style.css', __FILE__ ),
		array(
			'wp-blocks',
		),
		'0.2.0'
	);

	register_block_type( 'gutenberg-i18n-block/block', array(
		'editor_script' => 'gutenberg-i18n-block-editor',
		'editor_style'  => 'gutenberg-i18n-block-editor',
		'style'         => 'gutenberg-i18n-block',
	) );
}

add_action( 'init', __NAMESPACE__ . '\register_block', 20 );
