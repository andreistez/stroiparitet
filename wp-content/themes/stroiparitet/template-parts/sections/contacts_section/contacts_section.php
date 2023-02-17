<?php

/**
 * Contacts section layout.
 *
 * @see Page -> Content fields -> Page sections -> Contacts.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

$title	= $section['title'];
$text	= $section['text'];
$map	= $section['map'];

if( ! $title && ! $text && ! $map ) return;
?>

<section id="contacts" class="contacts">
	<div class="container">
		<?php
		if( $title )
			printf( __( '%s%s%s', THEME_NAME ), '<h2 class="section-title">', $title, '</h2>' );
		?>

		<div class="contacts-inner display-flex flex-wrap">
			<?php
			if( $text ){
				?>
				<div class="contacts-text">
					<?php echo wpautop( $text ) ?>
				</div>
				<?php
			}

			if( $map ){
				?>
				<div class="contacts-map">
					<?php echo $map ?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>

