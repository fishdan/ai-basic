<?php
/**
 * ai-basic theme bootstrap.
 *
 * This file is intentionally tiny. A block theme needs almost no PHP:
 * design tokens live in theme.json, layout lives in templates/ and parts/,
 * reusable sections live in patterns/ (auto-registered by WordPress).
 *
 * Do not add template logic, hooks, or shortcodes here. If a change seems to
 * require PHP, first check THEME.md — it can almost always be done with
 * theme.json or block markup instead.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme supports not covered by theme.json.
 */
function ai_basic_setup() {
	// Let WordPress manage the <title> tag.
	add_theme_support( 'title-tag' );

	// Enqueue the block editor styles on the front end too, keeping the
	// editor preview and the live site identical.
	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'ai_basic_setup' );

/**
 * Enqueue style.css (theme metadata + any last-resort CSS overrides).
 */
function ai_basic_styles() {
	wp_enqueue_style(
		'ai-basic-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'ai_basic_styles' );
