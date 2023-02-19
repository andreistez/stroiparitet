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

/**
 * Clean incoming value from trash.
 *
 * @param	mixed	$value	Some value to clean.
 * @return	string
 */
function sp_clean( $value ): string
{
	$value	= wp_unslash( $value );
	$value	= trim( $value );
	$value	= stripslashes( $value );
	$value	= strip_tags( $value );

	return htmlspecialchars( $value );
}

/**
 * Function checks if value length is between min and max parameters.
 *
 * @param   string	$value	Any value.
 * @param   int     $min  	Minimum symbols value length.
 * @param   int     $max  	Maximum symbols value length.
 * @return  bool          	True if OK, false if value length is too small or large.
 */
function sp_check_length( string $value, int $min, int $max ): bool
{
	return ! ( mb_strlen( $value ) < $min || mb_strlen( $value ) > $max );
}

/**
 * Function checks phone symbols.
 *
 * @param   string  $phone  Some phone number.
 * @return  bool            True if OK, false if string has bad symbols.
 */
function sp_check_phone( string $phone ): bool
{
	return preg_match('/^[0-9()+\-\s]+$/iu', $phone );
}

/**
 * Function checks name symbols.
 *
 * @param   string  $name   Some name.
 * @return  bool            True if OK, false if string has bad symbols.
 */
function sp_check_name( string $name ): bool
{
	return preg_match('/^[a-zа-я\s-]+$/iu', $name );
}

/**
 * Get specific count of stars.
 *
 * @param int $stars_count
 * @return string
 */
function sp_get_stars_rating( int $stars_count = 5 ): string
{
	if( ! $stars_count ) return '';

	return '<div class="stars-rating">'
		. str_repeat(
			'<svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M19.0958 6.32012C18.9725 5.9759 18.6343 5.73142 18.2342 5.69887L12.7991 5.25336L10.6499 0.71229C10.4914 0.379489 10.1305 0.164062 9.7295 0.164062C9.32852 0.164062 8.96761 0.379489 8.80914 0.713069L6.65995 5.25336L1.22398 5.69887C0.824573 5.7322 0.487231 5.9759 0.363242 6.32012C0.239253 6.66433 0.35376 7.04188 0.655902 7.27987L4.7642 10.5324L3.55276 15.3497C3.46411 15.7039 3.61641 16.0701 3.94197 16.2825C4.11696 16.3966 4.32169 16.4547 4.52815 16.4547C4.70616 16.4547 4.88273 16.4114 5.0412 16.3258L9.7295 13.7964L14.4161 16.3258C14.759 16.5121 15.1913 16.4951 15.5162 16.2825C15.8419 16.0694 15.994 15.7032 15.9054 15.3497L14.6939 10.5324L18.8022 7.28052C19.1044 7.04188 19.2198 6.66498 19.0958 6.32012Z" fill="#7C6AFA"/>
			</svg>', $stars_count
		) . '</div>';
}

add_action( 'template_redirect', 'sp_redirect_to_homepage' );
/**
 * @return void
 */
function sp_redirect_to_homepage(): void
{
	$homepage_id = get_option( 'page_on_front' );

	if( ! is_page( $homepage_id ) ) wp_redirect( home_url( 'index.php?page_id=' . $homepage_id ) );
}

