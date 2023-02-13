<?php

/**
 * Theme custom functions.
 * Please place all your custom functions declarations inside this file.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

add_action( 'wp_default_scripts', 'critick_remove_jq_migrate' );
/**
 * Prevent jQuery scripts from loading on the front-end.
 */
function critick_remove_jq_migrate( $scripts ){
	if( ! is_admin() ) $scripts->remove( 'jquery' );
}

/**
 * Prepare phone number for href.
 *
 * @param string $phone
 * @return string|null
 */
function sp_prepare_phone_for_href( string $phone ): ?string
{
	if( ! $phone ) return null;

	return esc_attr( str_replace( [' ', '-', '(', ')'], '', trim( $phone ) ) );
}

