<?php

/**
 * Index page default template.
 *
 * @package WordPress
 * @subpackage stroiparitet
 */

get_header();
?>

<main class="main">
	<?php
	the_content();
	?>
</main>

<?php
get_footer();

