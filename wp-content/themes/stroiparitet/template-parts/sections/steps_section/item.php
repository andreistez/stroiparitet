<?php

/**
 * Steps section item layout.
 *
 * @see Page -> Content fields -> Page sections -> Steps.
 *
 * @var array $args
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! $item = $args['item'] ?? null ) return;

$image	= $item['image'];
$title	= $item['title'];
$desc	= $item['desc'];

if( ! $image && ! $title && ! $desc ) return;
?>

<div class="step">
	<div class="step-inner display-flex direction-column align-center">
		<?php
		if( $image )
			echo wp_get_attachment_image( $image, 'sp_icon', false, [
				'width'		=> 'auto',
				'height'	=> 100,
				'loading'	=> 'lazy'
			] );

		if( $title )
			printf( __( '%s%s%s', THEME_NAME ), '<h4>', $title, '</h4>' );

		if( $desc )
			printf( __( '%s%s%s', THEME_NAME ), '<p>', $desc, '</p>' );
		?>
	</div>
</div>

