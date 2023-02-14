<?php

/**
 * Products section layout.
 *
 * @see Page -> Content fields -> Page sections -> Products.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

$title		= $section['title'];
$products	= $section['products'];
?>

<section id="products" class="products">
	<div class="container">
		<?php
		if( $title )
			printf( __( '%s%s%s', THEME_NAME ), '<h2 class="section-title">', $title, '</h2>' );

		if( count( $products ) ){
			?>
			<div class="products-inner display-flex flex-wrap">
				<?php
				foreach( $products as $product )
					get_template_part( 'template-parts/sections/products_section/product', null, ['product' => $product] );
				?>
			</div>
			<?php
		}
		?>
	</div>
</section>

