<?php

/**
 * Products section item layout.
 *
 * @see Page -> Content fields -> Page sections -> Products.
 *
 * @var array $args
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! $product = $args['product'] ?? null ) return;

$image	= $product['image'];
$title	= $product['title'];
$desc	= $product['desc'];

if( ! $image && ! $title && ! $desc ) return;
?>

<div class="product display-flex flex-wrap justify-center align-center">
	<div class="product-inner">
		<?php
		if( $image ){
			?>
			<div class="product-image open-modal">
				<?php
				echo wp_get_attachment_image( $image, 'medium', false, [
					'width'		=> 387,
					'height'	=> 331,
					'loading'	=> 'lazy'
				] );
				?>
			</div>
			<?php
		}
		?>

		<div class="product-info display-flex flex-wrap space-between align-center">
			<div class="product-info-left">
				<?php
				if( $title )
					printf( __( '%s%s%s', THEME_NAME ), '<div class="product-title">', $title, '</div>' );

				if( $desc )
					printf( __( '%s%s%s', THEME_NAME ), '<p>', $desc, '</p>' );
				?>
			</div>

			<div class="product-info-button">
				<button class="btn no-bg red product-button open-modal">
					<?php esc_html_e( 'Заказать', THEME_NAME ) ?>
				</button>
			</div>
		</div>
	</div><!-- .product-inner -->
</div><!-- .product -->

