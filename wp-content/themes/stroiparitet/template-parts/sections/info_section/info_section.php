<?php

/**
 * Info section layout.
 *
 * @see Page -> Content fields -> Page sections -> Information.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

if( ! $info = $section['info'] ) return;
?>

<section id="info" class="info">
	<div class="container">
		<div class="info-inner display-flex direction-column align-center flex-wrap">
			<?php
			foreach( $info as $item )
				get_template_part( 'template-parts/sections/info_section/item', null, ['item' => $item] );
			?>
		</div>
	</div>
</section>

