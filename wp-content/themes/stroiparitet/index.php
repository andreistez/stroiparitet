<?php

/**
 * Index page default template.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

get_header();

$sections = carbon_get_the_post_meta( 'page_sections' );
?>

<main class="main">
	<?php
	while( have_posts() ){
		the_post();

		foreach( $sections as $section ){
			switch( $section['_type'] ){
				case 'hero_section':
					get_template_part( 'template-parts/sections/hero_section/hero_section', null, [ 'section' => $section ] );
					break;

				case 'info_section':
					get_template_part( 'template-parts/sections/info_section/info_section', null, [ 'section' => $section ] );
					break;

				case 'about_section':
					get_template_part( 'template-parts/sections/about_section/about_section', null, [ 'section' => $section ] );
					break;

				case 'products_section':
					get_template_part( 'template-parts/sections/products_section/products_section', null, [ 'section' => $section ] );
					break;

				case 'steps_section':
					get_template_part( 'template-parts/sections/steps_section/steps_section', null, [ 'section' => $section ] );
					break;

				case 'certificates_section':
					get_template_part( 'template-parts/sections/certificates_section/certificates_section', null, [ 'section' => $section ] );
					break;

				case 'testimonials_section':
					get_template_part( 'template-parts/sections/testimonials_section/testimonials_section', null, [ 'section' => $section ] );
					break;

				case 'news_section':
					get_template_part( 'template-parts/sections/news_section/news_section', null, [ 'section' => $section ] );
					break;

				case 'laboratory_section':
					get_template_part( 'template-parts/sections/laboratory_section/laboratory_section', null, [ 'section' => $section ] );
					break;

				case 'contacts_section':
					get_template_part( 'template-parts/sections/contacts_section/contacts_section', null, [ 'section' => $section ] );
					break;

				default:
					esc_html_e( 'Шаблон секции не найден.', THEME_NAME );
			}
		}
	}
	?>
</main>

<?php
get_footer();

