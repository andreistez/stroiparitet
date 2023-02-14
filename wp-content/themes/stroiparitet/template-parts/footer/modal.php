<?php

/**
 * Modal window.
 *
 * @see Theme Setiings -> Footer.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

//if( ! $header_logo_text = carbon_get_theme_option( 'header_logo_text' ) ) return;
?>

<div id="modal" class="modal display-flex align-center justify-center hidden">
	<div class="modal-inner">
		<form class="modal-form">
			<fieldset class="display-flex flex-wrap space-between">
				<legend><?php esc_html_e( 'Оставьте Ваше сообщение', THEME_NAME ) ?></legend>

				<label for="name" class="half">
					<input type="text" id="name" name="name" placeholder="<?php esc_html_e( 'Имя *', THEME_NAME ) ?>" />
				</label>

				<label for="phone" class="half">
					<input type="text" id="phone" name="phone" placeholder="<?php esc_html_e( 'Телефон *', THEME_NAME ) ?>" />
				</label>

				<label for="text">
					<textarea id="text" name="text" placeholder="<?php esc_html_e( 'Сообщение *', THEME_NAME ) ?>"></textarea>
				</label>
			</fieldset>

			<button class="btn"><?php esc_html_e( 'Отправить', THEME_NAME ) ?></button>

			<div class="modal-close"></div>
		</form>
	</div>
</div>

