<?php
/**
 * Displays the site logo. Falls back to the site name.
 *
 * @package MyApp
 */

?>
<h1>
	<?php
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		the_custom_logo();
	} else {
		bloginfo( 'name' );
	}
	?>
</h1>
