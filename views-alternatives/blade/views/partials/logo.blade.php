<?php
/**
 * Displays the site logo. Falls back to the site name.
 *
 * @package MyApp
 */

?>
<h1>
	@if ( function_exists( 'has_custom_logo' ) && has_custom_logo() )
		@php the_custom_logo() @endphp
	@else
		@php bloginfo( 'name' ) @endphp
	@endif
</h1>
