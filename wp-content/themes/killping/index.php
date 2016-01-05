<?php
get_header(); ?>

	<!--main-->
<main>

		<!--Home Widgets-->
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Home Widgets") ) {} ?>
		<!--Home Widgets-->
</main>
	<!--main-->

<?php get_footer(); ?>