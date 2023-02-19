<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Настройки темы', THEME_NAME ) )
	// Header settings.
	->add_tab( __( 'Шапка сайта', THEME_NAME ), [
		Field::make( 'text', 'header_logo_text', __( 'Логотип (тег <br/> для переноса)', THEME_NAME ) )
			->set_width( 25 ),
		Field::make( 'text', 'header_phone', __( 'Телефон', THEME_NAME ) )
			->set_width( 25 ),
		Field::make( 'text', 'header_email', __( 'Email', THEME_NAME ) )
			->set_width( 25 ),
		Field::make( 'text', 'header_button_label', __( 'Текст кнопки', THEME_NAME ) )
			->set_width( 25 )
	] )

	// Footer settings.
	->add_tab( __( 'Подвал сайта', THEME_NAME ), [
		Field::make( 'text', 'copyright', __( 'Копирайт', THEME_NAME ) )
			->set_help_text( __( 'Год и название сайта выводятся автоматически до этого текста.', THEME_NAME ) )
	] )

	// 404 Page settings.
	->add_tab( __( 'Страница 404', THEME_NAME ), [
		Field::make( 'image', '404_image', __( 'Изображение', THEME_NAME ) )
			->set_width( 50 ),

		Field::make( 'rich_text', '404_desc', __( 'Текст', THEME_NAME ) )
			->set_width( 50 )
	] );

