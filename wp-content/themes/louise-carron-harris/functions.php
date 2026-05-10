<?php
/**
 * Louise Carron Harris child theme bootstrap.
 *
 * @package LouiseCarronHarris
 */

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue the compiled theme bundle on the front end.
 *
 * Reads dependencies and a content-hash version from build/index.asset.php,
 * emitted by @wordpress/scripts alongside build/index.js and
 * build/style-index.css (the latter from the SCSS import in src/index.js).
 */
add_action(
	'wp_enqueue_scripts',
	static function () {
		$asset_path = get_stylesheet_directory() . '/build/index.asset.php';

		if ( ! file_exists( $asset_path ) ) {
			return;
		}

		$asset = require $asset_path;
		$base  = get_stylesheet_directory_uri() . '/build';

		wp_enqueue_script(
			'lch-main',
			$base . '/index.js',
			$asset['dependencies'] ?? array(),
			$asset['version'] ?? null,
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);

		wp_enqueue_style(
			'lch-main',
			$base . '/style-index.css',
			array(),
			$asset['version'] ?? null
		);

		// Auto-swap to style-index-rtl.css when the locale is RTL.
		wp_style_add_data( 'lch-main', 'rtl', 'replace' );
	}
);

/**
 * Mirror front-end styles into the block editor so authors see the same output.
 */
add_action(
	'after_setup_theme',
	static function () {
		add_editor_style( 'build/style-index.css' );
	}
);
