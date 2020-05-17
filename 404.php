<?php
/**
 * Layout: views/layouts/app.php
 *
 * This is the template that is used for displaying 404 errors.
 *
 * @package MyApp
 */

?>
<p>
	<?php
	printf(
		/* translators: 404 page content; placeholders represents homepage opening and closing anchor tags */
		esc_html__( 'Please check the URL for proper spelling and capitalization. If you\'re having trouble locating a destination, try visiting the %1$shome page%2$s.', 'my_app' ),
		'<a href="' . esc_url( home_url( '/' ) ) . '">',
		'</a>'
	);
	?>
</p>
