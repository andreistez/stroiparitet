<?php

/**
 * Certificates section item layout.
 *
 * @see Page -> Content fields -> Page sections -> Certificates.
 *
 * @var array $args
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! $item = $args['item'] ?? null ) return;

$certificate = $item['certificate'];

if( ! $certificate ) return;
?>

<div class="certificate swiper-slide">
	<?php
	echo wp_get_attachment_image( $certificate, 'sp_vertical', false, [
		'width'		=> 300,
		'height'	=> 400,
		'loading'	=> 'lazy'
	] );
	?>
</div>

