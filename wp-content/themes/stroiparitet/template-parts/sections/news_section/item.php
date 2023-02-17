<?php

/**
 * News section item layout.
 *
 * @see Page -> Content fields -> Page sections -> News.
 *
 * @var array $args
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

if( ! $post_id = $args['id'] ?? null ) return;
?>

<article class="article swiper-slide">
	<?php
	if( has_post_thumbnail( $post_id ) ){
		?>
		<div class="article-thumb">
			<?php echo get_the_post_thumbnail( $post_id, 'sp_blog', ['loading' => 'lazy'] ) ?>
		</div>
		<?php
	}
	?>

	<div class="article-info">
		<div class="article-date">
			<?php echo get_the_date( 'd M Y', $post_id ) ?>
		</div>

		<h6 class="article-title"><?php echo get_the_title( $post_id ) ?></h6>

		<div class="article-excerpt">
			<?php if( has_excerpt( $post_id ) ) echo get_the_excerpt( $post_id ) ?>
		</div>

		<div class="article-button">
			<button class="btn white" data-id="<?php echo esc_attr( $post_id ) ?>">
				<?php esc_html_e( 'Подробнее', THEME_NAME ) ?>
			</button>
		</div>
	</div>
</article>

