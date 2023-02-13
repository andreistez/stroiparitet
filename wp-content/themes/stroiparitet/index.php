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

				default:
					esc_html_e( 'Шаблон секции не найден.', THEME_NAME );
			}
		}
	}
	?>
</main>

<?php
get_footer();

