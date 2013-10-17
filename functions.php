<?php

// replace TwentyThirteen's Google fonts
add_action( 'wp_enqueue_scripts', 'cherryblossom_enqueue_styles', 11 );
function cherryblossom_enqueue_styles() {
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
	echo 'Theme: <a href="http://wordpress.org/themes/cherry-blossom">Cherry Blossom</a> |';
}

// add custom background support
add_theme_support( 'custom-background', array( 'default-color' => 'fafafa' ) );
