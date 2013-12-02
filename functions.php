<?php

// enqueue stylesheets
add_action( 'wp_enqueue_scripts', 'cherryblossom_enqueue_styles', 12 );
function cherryblossom_enqueue_styles() {
	global $wp_styles;
	$twentythirteen_cache_buster = isset( $wp_styles->registered[ 'twentythirteen-style' ]->ver ) ? $wp_styles->registered[ 'twentythirteen-style' ]->ver : false;
	wp_deregister_style( 'twentythirteen-style' );
	wp_enqueue_style( 'twentythirteen-style', get_template_directory_uri() . '/style.css', null, $twentythirteen_cache_buster );
	wp_enqueue_style( 'cherryblossom-style', get_stylesheet_uri(), array(), wp_get_theme()->version );
}

// replace TwentyThirteen's Google fonts
add_action( 'wp_enqueue_scripts', 'cherryblossom_replace_google_fonts', 11 );
function cherryblossom_replace_google_fonts() {
	wp_dequeue_style( 'twentythirteen-fonts' );
	wp_enqueue_style( 'cherryblossom-fonts', 'http://fonts.googleapis.com/css?family=Bad+Script|Open+Sans:300italic,400italic,600italic,400,600,300', false, null );
}

// replace TwentyThirteen's editor styles
add_action( 'after_setup_theme', 'cherryblossom_replace_editor_styles', 12 );
function cherryblossom_replace_editor_styles() {
	remove_editor_styles();
	add_editor_style( array( 'editor-style.css', 'fonts/genericons.css' ) );
}

// remove TwentyThirteen's custom header support
add_action( 'after_setup_theme', 'cherryblossom_remove_custom_header', 12 );
function cherryblossom_remove_custom_header() {
	remove_theme_support( 'custom-header' );
}

// add footer theme credits
add_action( 'twentythirteen_credits', 'cherryblossom_credits' );
function cherryblossom_credits() {
	echo 'Theme: Cherry Blossom by <a href="http://till.kruss.me/">Till Kr&uuml;ss</a> |';
}

// add custom background support
add_theme_support( 'custom-background', array( 'default-color' => 'fafafa' ) );
