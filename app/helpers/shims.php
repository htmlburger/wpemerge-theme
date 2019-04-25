<?php
/**
 * Backwards compatibility shims.
 *
 * @package WPEmergeTheme
 */

/**
 * Shim for wp_body_open() avoiding the "wp_" prefix rule violation in Theme Check.
 *
 * @return void
 */
function app_shim_wp_body_open() {
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
}
