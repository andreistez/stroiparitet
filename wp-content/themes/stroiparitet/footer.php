<?php

/**
 * Footer default template.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

$copyright	= carbon_get_theme_option( 'copyright' );
$default	= '&copy; ' . date( 'Y' ) . ', ' . get_bloginfo( 'name' );
$copyright	= $copyright ? $default . $copyright : $default;
?>

			<footer class="footer">
				<?php echo $copyright ?>
			</footer>
			<?php wp_footer() ?>
		</div><!-- .wrapper -->

		<?php get_template_part( 'template-parts/footer/modal' ) ?>
    </body>
</html>

