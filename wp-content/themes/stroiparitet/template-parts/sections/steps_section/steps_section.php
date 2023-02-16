<?php

/**
 * Steps section layout.
 *
 * @see Page -> Content fields -> Page sections -> Steps.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

$title	= $section['title'];
$steps	= $section['steps'];
?>

<section id="steps" class="steps">
	<div class="container">
		<?php
		if( $title )
			printf( __( '%s%s%s', THEME_NAME ), '<h2 class="section-title">', $title, '</h2>' );

		if( count( $steps ) ){
			?>
			<div class="steps-inner display-flex direction-column align-center flex-wrap">
				<?php
				foreach( $steps as $item )
					get_template_part( 'template-parts/sections/steps_section/item', null, ['item' => $item] );
				?>
			</div>
			<?php
		}
		?>
	</div>
</section>

