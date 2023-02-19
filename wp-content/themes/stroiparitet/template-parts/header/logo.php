<?php

/**
 * Header logo.
 *
 * @see Настройки темы -> Шапка сайта.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! $header_logo_text = carbon_get_theme_option( 'header_logo_text' ) ) return;
?>

<a class="logo" href="<?php echo home_url( '/' ) ?>">
	<?php echo $header_logo_text ?>
</a>

