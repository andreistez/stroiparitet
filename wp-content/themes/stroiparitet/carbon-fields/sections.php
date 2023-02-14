<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Поля контента', THEME_NAME ) )
	->where( 'post_type', '=', 'page' )
	->add_fields( [
		Field::make( 'complex', 'page_sections', __( 'Секции страницы', THEME_NAME ) )
			->set_layout( 'tabbed-horizontal' )

			// Hero section.
			->add_fields( 'hero_section', __( 'Основная', THEME_NAME ), [
				Field::make( 'text', 'title', __( 'Заголовок (тег <br/> для переноса)', THEME_NAME ) )
					->set_width( 34 ),
				Field::make( 'text', 'desc', __( 'Описание', THEME_NAME ) )
					->set_width( 33 ),
				Field::make( 'image', 'bg_image', __( 'Фоновое изображение', THEME_NAME ) )
				     ->set_width( 33 ),
				Field::make( 'date', 'date', __( 'Дата окончания акции', THEME_NAME ) )
					->set_storage_format( 'd:m:Y' )
					->set_width( 50 ),
				Field::make( 'text', 'button_label', __( 'Текст на кнопке', THEME_NAME ) )
					->set_width( 50 )
			] )

			// Info section.
			->add_fields( 'info_section', __( 'Информация', THEME_NAME ), [
				Field::make( 'complex', 'info', __( 'Информация', THEME_NAME ) )
					->set_layout( 'tabbed-horizontal' )
					->set_max( 3 )
					->add_fields( [
						Field::make( 'image', 'image', __( 'Изображение', THEME_NAME ) )
							->set_width( 34 ),
						Field::make( 'text', 'title', __( 'Заголовок', THEME_NAME ) )
							->set_width( 33 ),
						Field::make( 'text', 'desc', __( 'Описание', THEME_NAME ) )
							->set_width( 33 )
					] )
			] )

			// About Us section.
			->add_fields( 'about_section', __( 'О нас', THEME_NAME ), [
				Field::make( 'text', 'title', __( 'Заголовок', THEME_NAME ) )
					->set_width( 50 ),
				Field::make( 'textarea', 'text', __( 'Текст', THEME_NAME ) )
					->set_width( 50 )
			] )

			// Products section.
			->add_fields( 'products_section', __( 'Продукция', THEME_NAME ), [
				Field::make( 'text', 'title', __( 'Заголовок', THEME_NAME ) ),
				Field::make( 'complex', 'products', __( 'Товары', THEME_NAME ) )
					->set_layout( 'tabbed-horizontal' )
					->add_fields( [
						Field::make( 'image', 'image', __( 'Изображение', THEME_NAME ) )
							->set_width( 34 ),
						Field::make( 'text', 'title', __( 'Название', THEME_NAME ) )
							->set_width( 33 ),
						Field::make( 'text', 'desc', __( 'Описание', THEME_NAME ) )
							->set_width( 33 )
					] )
			] )

			// Icon & text repeater section.
			->add_fields( 'steps_section', __( 'Шаги', THEME_NAME ), [
				Field::make( 'text', 'title', __( 'Заголовок', THEME_NAME ) ),
				Field::make( 'complex', 'steps', __( 'Шаги', THEME_NAME ) )
					->set_layout( 'tabbed-horizontal' )
					->add_fields( [
						Field::make( 'image', 'image', __( 'Изображение', THEME_NAME ) )
							->set_width( 34 ),
						Field::make( 'text', 'title', __( 'Заголовок', THEME_NAME ) )
							->set_width( 33 ),
						Field::make( 'textarea', 'desc', __( 'Описание', THEME_NAME ) )
							->set_width( 33 )
					] )
			] )

			// Certificates section.
			->add_fields( 'certificates_section', __( 'Сертификаты', THEME_NAME ), [
				Field::make( 'text', 'title', __( 'Заголовок', THEME_NAME ) ),
				Field::make( 'complex', 'certificates', __( 'Сертификаты', THEME_NAME ) )
					->set_layout( 'tabbed-horizontal' )
					->add_fields( [
						Field::make( 'image', 'certificate', __( 'Изображение', THEME_NAME ) )
					] )
			] )

			// Testimonials section.
			->add_fields( 'testimonials_section', __( 'Отзывы', THEME_NAME ), [
				Field::make( 'text', 'title', __( 'Заголовок', THEME_NAME ) ),
				Field::make( 'complex', 'testimonials', __( 'Отзывы', THEME_NAME ) )
					->set_layout( 'tabbed-horizontal' )
					->add_fields( [
						Field::make( 'image', 'image', __( 'Изображение', THEME_NAME ) ),
						Field::make( 'image', 'avatar', __( 'Фото автора', THEME_NAME ) )
							->set_width( 25 ),
						Field::make( 'text', 'name', __( 'Имя', THEME_NAME ) )
							->set_width( 25 ),
						Field::make( 'text', 'position', __( 'Должность', THEME_NAME ) )
							->set_width( 25 ),
						Field::make( 'text', 'text', __( 'Текст', THEME_NAME ) )
							->set_width( 25 )
					] )
			] )

			// Latest news section.
			->add_fields( 'news_section', __( 'Новости', THEME_NAME ), [
				Field::make( 'text', 'title', __( 'Заголовок', THEME_NAME ) )
			] )
	] );

