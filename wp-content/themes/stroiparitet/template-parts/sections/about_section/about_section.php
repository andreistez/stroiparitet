<?php

/**
 * About section layout.
 *
 * @see Page -> Content fields -> Page sections -> About.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

$title	= $section['title'];
$text	= $section['text'];
$logo	= carbon_get_theme_option( 'header_logo_text' );

if( ! $title && ! $text ) return;
?>

<section id="about" class="about">
	<div class="container">
		<div class="about-inner display-flex flex-wrap align-center">
			<div class="about-logo display-flex align-center justify-center">
				<?php echo $logo ?: '' ?>
			</div>

			<div class="about-info">
				<?php
				if( $title )
					printf( __( '%s%s%s', THEME_NAME ), '<h2 class="title">', $title, '</h2>' );

				if( $text )
					printf( __( '%s%s%s', THEME_NAME ), '<div class="about-text">', $text, '</div>' );
				?>
			</div>
		</div><!-- .about-inner -->
	</div><!-- .container -->
</section><!-- #about -->

