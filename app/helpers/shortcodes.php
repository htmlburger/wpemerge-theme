<?php
/**
 * Custom Shortcodes.
 *
 * Here, you can register Custom Shortcode for use in the Theme.
 *
 * @see https://developer.wordpress.org/reference/functions/add_shortcode/
 * @see https://developer.wordpress.org/reference/functions/shortcode_atts/
 */

/**
 * Render the current year.
 */
function app_shortcode_year() {
	return date( 'Y' );
}
add_shortcode( 'year', 'app_shortcode_year' );

// phpcs:disable
/**
 * Example Shortcode.
 */
/*
function app_shortcode_example( $atts, $content ) {
	$atts = shortcode_atts(
		array(
			'example_attribute' => 'example_value',
		),
		$atts, 'example'
	);

	ob_start();
	?>
	<div class="shortcode-">
		<!-- -->
	</div>
	<?php
	$html = ob_get_clean();

	return $html;
}
add_shortcode( 'example', 'app_shortcode_example' );
*/
// phpcs:enable
