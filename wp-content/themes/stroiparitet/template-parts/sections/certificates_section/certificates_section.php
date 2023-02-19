<?php

/**
 * Certificates section layout.
 *
 * @see Page -> Content fields -> Page sections -> Certificates.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

$title			= $section['title'];
$certificates	= $section['certificates'];
?>

<section id="certificates" class="certificates">
	<div class="container">
		<?php
		if( $title )
			printf( __( '%s%s%s', THEME_NAME ), '<h2 class="section-title">', $title, '</h2>' );

		if( count( $certificates ) ){
			?>
			<div class="certificates-inner swiper">
				<div class="swiper-wrapper">
					<?php
					foreach( $certificates as $item )
						get_template_part( 'template-parts/sections/certificates_section/item', null, ['item' => $item] );
					?>
				</div>

				<div class="certificates-pagination"></div>
			</div>
			<?php
		}
		?>
	</div>
</section>

