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
	<?php echo get_the_title( $post_id ) ?>
</article>

