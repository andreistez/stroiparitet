<?php

/**
 * Laboratory section layout.
 *
 * @see Page -> Content fields -> Page sections -> Laboratory.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

$title	= $section['title'];
$text	= $section['text'];
$image	= $section['image'];
$class	= $section['text_first'] ? ' reverse' : '';
?>

<section id="laboratory" class="laboratory<?php echo esc_attr( $class ) ?>">
	<div class="container">
		<?php
		if( $title )
			printf( __( '%s%s%s', THEME_NAME ), '<h2 class="section-title">', $title, '</h2>' );
		?>

		<div class="laboratory-inner display-flex flex-wrap">
			<?php
			if( $image ){
				?>
				<div class="laboratory-image">
					<?php echo wp_get_attachment_image( $image, 'large' ) ?>
				</div>
				<?php
			}

			if( $text ){
				?>
				<div class="laboratory-text">
					<?php echo wpautop( $text ) ?>

					<button class="btn open-modal">Заказать замер</button>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>

