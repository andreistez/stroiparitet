<?php

/**
 * Header menu.
 *
 * @see Appearance -> Menu -> Header Menu.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

?>

<div class="header-menu">
	<button class="menu-btn">
		<span class="menu-btn-line top"></span>
		<span class="menu-btn-line center"></span>
		<span class="menu-btn-line bottom"></span>
	</button>

	<div id="header-menu-inner" class="header-menu-inner">
		<?php
		wp_nav_menu( [
			'theme_location'	=> 'header_menu',
			'container'			=> 'nav',
			'container_class'	=> 'header-nav'
		] );
		?>
	</div>
</div>

