<?php
/**
 * Backwards compatibility shims.
 *
 * @package MyApp
 */

/**
 * Shim for wp_body_open() avoiding the "wp_" prefix rule violation in Theme Check.
 *
 * @return void
 */
function my_app_shim_wp_body_open() {
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
}
