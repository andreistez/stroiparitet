<?php

add_action( 'wp_ajax_sp_ajax_send_form', 'sp_ajax_send_form' );
add_action( 'wp_ajax_nopriv_sp_ajax_send_form', 'sp_ajax_send_form' );
/**
 * Send form.
 *
 * @return void
 */
function sp_ajax_send_form(): void
{
	// Verify hidden nonce field.
	if( empty( $_POST ) || ! wp_verify_nonce( $_POST['sp_send_form_nonce'], 'sp_ajax_send_form' ) )
		wp_send_json_error( ['msg' => esc_html__( 'Некорректные данные.', THEME_NAME )] );

	$name	= sp_clean( $_POST['name'] );
	$phone	= sp_clean( $_POST['phone'] );
	$text	= sp_clean( $_POST['text'] );

	// If data is not set - send error.
	if( ! $name || ! $phone || ! $text )
		wp_send_json_error( ['msg' => esc_html__( 'Не все поля заполнены', THEME_NAME )] );

	// Additional checking.
	if( ! sp_check_length( $name, 1, 50 ) )
		wp_send_json_error( ['msg' => esc_html__( 'Поле имени не может превышать 50 символов', THEME_NAME )] );

	if( ! sp_check_name( $name ) )
		wp_send_json_error( ['msg' => esc_html__( 'Некорректные символы в поле имени', THEME_NAME )] );

	if( ! sp_check_length( $phone, 1, 30 ) )
		wp_send_json_error( ['msg' => esc_html__( 'Поле телефона не может превышать 30 символов', THEME_NAME )] );

	if( ! sp_check_phone( $phone ) )
		wp_send_json_error( ['msg' => esc_html__( 'Некорректные символы в поле телефона', THEME_NAME )] );

	if( ! sp_check_length( $text, 1, 500 ) )
		wp_send_json_error( ['msg' => esc_html__( 'Поле текста не может превышать 500 символов', THEME_NAME )] );

	$msg = "Имя: $name,\n
		Телефон: $phone,\n
		Сообщение: $text
	";

	if( ! wp_mail( get_option( 'admin_email' ), 'Форма с сайта ' . get_bloginfo( 'name' ), $msg ) )
		wp_send_json_error( ['msg' => esc_html__( 'Ошибка отправки. Пожалуйста, попробуйте позже.', THEME_NAME )] );

	wp_send_json_success( ['msg' => esc_html__( 'Спасибо за ваше сообщение! Мы свяжемся с Вами в ближайшее время.', THEME_NAME )] );
}

