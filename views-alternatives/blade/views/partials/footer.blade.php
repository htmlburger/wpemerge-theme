<?php
/**
 * Theme footer partial.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MyApp
 */

?>
		@php apply_filters( "wpemerge.partials.footer.hook", true ) && do_action('get_footer') @endphp
		@php wp_footer() @endphp
	</body>
</html>
