<?php
/**
 * Load all helpers.
 */

require_once APP_APP_HELPERS_DIR . 'assets.php';
require_once APP_APP_HELPERS_DIR . 'content.php';
require_once APP_APP_HELPERS_DIR . 'login.php';
require_once APP_APP_HELPERS_DIR . 'shortcodes.php';
require_once APP_APP_HELPERS_DIR . 'title.php';

/**
 * Require more helper files here.
 */

/**
 * Annoyed that you have to constantly add helper file require statements? Uncomment the bellow snippet!
 *
 * Automatically require all helper files in the app/helpers directory (non-recursive).
 */
/*
$helpers = glob( APP_APP_HELPERS_DIR . '*.php' );
foreach ( $helpers as $helper ) {
	if ( ! is_file( $helper ) ) {
		continue;
	}

	require_once $helper;
}
*/
