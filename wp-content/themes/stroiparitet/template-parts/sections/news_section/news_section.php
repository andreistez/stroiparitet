<?php

/**
 * News section layout.
 *
 * @see Page -> Content fields -> Page sections -> News.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! ( $section = $args['section'] ?? null ) ) return;

$title		= $section['title'];
$news_query	= new WP_Query( [
	'post_status'		=> 'publish',
	'posts_per_page'	=> -1
] );
?>

<section id="news" class="news">
	<div class="container">
		<?php
		if( $title )
			printf( __( '%s%s%s', THEME_NAME ), '<h2 class="section-title">', $title, '</h2>' );

		if( $news_query->have_posts() ){
			?>
			<div class="news-inner swiper">
				<div class="swiper-wrapper">
					<?php
					while( $news_query->have_posts() ){
						$news_query->the_post();
						get_template_part( 'template-parts/sections/news_section/item', null, ['id' => get_the_ID()] );
					}
					?>
				</div>

				<div class="news-nav">
					<div class="news-nav-prev">
						<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.1622 9.50031L3.26199 0.599798C3.05614 0.393774 2.78135 0.280273 2.48834 0.280273C2.19534 0.280273 1.92054 0.393774 1.71469 0.599798L1.05925 1.25511C0.632747 1.68212 0.632747 2.37613 1.05925 2.80249L8.53301 10.2766L1.05095 17.759C0.845103 17.965 0.731445 18.2397 0.731445 18.5325C0.731445 18.8257 0.845103 19.1004 1.05095 19.3066L1.7064 19.9617C1.91241 20.1677 2.18704 20.2812 2.48005 20.2812C2.77305 20.2812 3.04785 20.1677 3.2537 19.9617L12.1622 11.0531C12.3686 10.8464 12.4819 10.5704 12.4813 10.2771C12.4819 9.98261 12.3686 9.70683 12.1622 9.50031Z" fill="currentColor"/>
						</svg>
					</div>
					<div class="news-nav-next">
						<svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.1622 9.50031L3.26199 0.599798C3.05614 0.393774 2.78135 0.280273 2.48834 0.280273C2.19534 0.280273 1.92054 0.393774 1.71469 0.599798L1.05925 1.25511C0.632747 1.68212 0.632747 2.37613 1.05925 2.80249L8.53301 10.2766L1.05095 17.759C0.845103 17.965 0.731445 18.2397 0.731445 18.5325C0.731445 18.8257 0.845103 19.1004 1.05095 19.3066L1.7064 19.9617C1.91241 20.1677 2.18704 20.2812 2.48005 20.2812C2.77305 20.2812 3.04785 20.1677 3.2537 19.9617L12.1622 11.0531C12.3686 10.8464 12.4819 10.5704 12.4813 10.2771C12.4819 9.98261 12.3686 9.70683 12.1622 9.50031Z" fill="currentColor"/>
						</svg>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</section>

