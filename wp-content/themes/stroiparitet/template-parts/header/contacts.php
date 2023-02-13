<?php

/**
 * Header contacts block.
 *
 * @see Настройки темы -> Шапка сайта.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

$phone			= carbon_get_theme_option( 'header_phone' );
$email			= carbon_get_theme_option( 'header_email' );
$button_label	= carbon_get_theme_option( 'header_button_label' ) ?: 'Заказать обратный звонок';

if( ! $phone && ! $email && ! $button_label ) return;
?>

<div class="header-contacts display-flex flex-wrap align-center">
	<div class="header-contacts-links display-flex direction-column">
		<?php
		if( $phone ){
			?>
			<a class="header-contacts-link display-flex align-center" href="tel:<?php echo sp_prepare_phone_for_href( $phone ) ?>">
				<img src="<?php echo THEME_URI ?>/static/img/smartphone-sm.svg" alt="" />
				<?php echo esc_html( $phone ) ?>
			</a>
			<?php
		}

		if( $email ){
			?>
			<a class="header-contacts-link display-flex align-center" href="mailto:<?php echo esc_attr( $email ) ?>">
				<img src="<?php echo THEME_URI ?>/static/img/email.svg" alt="" />
				<?php echo esc_html( $email ) ?>
			</a>
			<?php
		}
		?>
	</div>

	<button class="btn"><?php printf( esc_html__( '%s', THEME_NAME ), $button_label ) ?></button>
</div>

