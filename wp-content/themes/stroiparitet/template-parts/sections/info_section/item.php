<?php

/**
 * Info section item layout.
 *
 * @see Page -> Content fields -> Page sections -> Information.
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

<div class="info-item display-flex flex-wrap align-center">
	<?php
	if( $image )
		echo wp_get_attachment_image( $image, 'sp_info', false, [
			'width'		=> 60,
			'height'	=> 60,
			'loading'	=> 'lazy'
		] );
	?>

	<div class="info-item-text display-flex direction-column">
		<?php
		if( $title )
			printf( __( '%s%s%s', THEME_NAME ), '<h3>', $title, '</h3>' );

		if( $desc )
			printf( __( '%s%s%s', THEME_NAME ), '<p>', $desc, '</p>' );
		?>
	</div>
</div>

