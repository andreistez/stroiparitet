<?php

/**
 * Hero section layout.
 *
 * @see Page -> Content fields -> Page sections -> Main.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

$title			= $section['title'];
$desc			= $section['desc'];
$bg_image		= $section['bg_image']
				? ' style="background-image: url(' . wp_get_attachment_image_url( $section['bg_image'], 'full-hd' ) . ')"'
				: '';
$date			= $section['date'] ? explode( ':', $section['date'] ) : null;	// 0 => dd, 1 => mm, 2 => YYYY
$button_label	= $section['button_label'] ?: 'Заказать';

if( ! $title && ! $desc ) return;
?>

<section id="hero" class="hero"<?php echo $bg_image ?>>
	<div class="overlay"></div>

	<div class="container">
		<div class="hero-inner">
			<?php
			if( $title ){
				?>
				<h1 class="hero-title">
					<?php printf( __( '%s', THEME_NAME ), $title ) ?>
				</h1>
				<?php
			}

			if( $desc ){
				?>
				<p class="hero-desc">
					<?php printf( esc_html__( '%s', THEME_NAME ), $desc ) ?>
				</p>
				<?php
			}

			if( $date ){
				?>
				<div
					class="timer display-flex"
					data-year="<?php echo esc_attr( $date[2] ) ?>"
					data-month="<?php echo esc_attr( $date[1] ) ?>"
					data-day="<?php echo esc_attr( $date[0] ) ?>"
				></div>
				<?php
			}
			?>

			<button class="btn red open-modal">
				<?php printf( esc_html__( '%s', THEME_NAME ), $button_label ) ?>
			</button>
		</div><!-- .hero-inner -->
	</div><!-- .container -->
</section><!-- #hero -->

