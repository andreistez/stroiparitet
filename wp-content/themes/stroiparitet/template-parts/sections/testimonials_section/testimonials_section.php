<?php

/**
 * Testimonials section layout.
 *
 * @see Page -> Content fields -> Page sections -> Testimonials.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

$title			= $section['title'];
$testimonials	= $section['testimonials'];
?>

<section id="testimonials" class="testimonials">
	<div class="container">
		<?php
		if( $title )
			printf( __( '%s%s%s', THEME_NAME ), '<h2 class="section-title">', $title, '</h2>' );

		if( count( $testimonials ) ){
			?>
			<div class="testimonials-inner swiper">
				<div class="swiper-wrapper">
					<?php
					foreach( $testimonials as $item )
						get_template_part( 'template-parts/sections/testimonials_section/item', null, ['item' => $item] );
					?>
				</div>

				<div class="testimonials-pagination"></div>
			</div>
			<?php
		}
		?>
	</div>
</section>

