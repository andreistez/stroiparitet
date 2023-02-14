<?php

/**
 * Theme functions.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

use Carbon_Fields\Carbon_Fields;

define( 'THEME_VERSION', mt_rand() );
define( 'THEME_URI', get_template_directory_uri() );
const THEME_NAME = 'stroiparitet';

add_action( 'after_setup_theme', 'critick_load_theme_dependencies' );
/**
 * Theme dependencies.
 */
function critick_load_theme_dependencies(): void
{
	// Register theme menus.
	register_nav_menus( ['header_menu' => esc_html__( 'Меню в шапке сайта', THEME_NAME )] );

	// Register Carbon Fields.
	Carbon_Fields::boot();
	add_action( 'carbon_fields_register_fields', function(){
		require_once( 'carbon-fields/theme-settings.php' );
		require_once( 'carbon-fields/sections.php' );
	} );

	// Please place all custom functions declarations in this file.
	require_once( 'theme-functions/theme-functions.php' );
}

add_action( 'init', 'critick_init_theme' );
/**
 * Theme initialization.
 */
function critick_init_theme(): void
{
	// Remove extra styles and default SVG tags.
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

	// Enable post thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Custom image sizes.
	 add_image_size( 'full-hd', 1920 );
	 add_image_size( 'sp_icon', 0, 100 );
	 add_image_size( 'sp_info', 60, 60 );
	 add_image_size( 'sp_vertical', 300, 400 );
	 add_image_size( 'sp_avatar', 120, 120 );
	 add_image_size( 'sp_blog', 400, 335 );
}

add_action( 'wp_enqueue_scripts', 'critick_inclusion_enqueue' );
/**
 * Enqueue styles and scripts.
 */
function critick_inclusion_enqueue(): void
{
	// Remove Gutenberg styles on front-end.
	if( ! is_admin() ){
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-blocks-style' );
	}

	// Styles.
	wp_enqueue_style( 'main', get_template_directory_uri() . '/static/css/main.min.css', [], THEME_VERSION );

	// Scripts.
	wp_enqueue_script( 'main', get_template_directory_uri() . '/static/js/main.min.js', [], THEME_VERSION, true );
}

