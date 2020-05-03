<?php
/**
 * Load helpers.
 * Define any generic functions in a helper file and then require that helper file here.
 *
 * @package MyTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load helpers.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'shims.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'content.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'title.php';

// phpcs:disable
/**
 * Annoyed that you have to constantly add helper file require statements? Uncomment the bellow snippet!
 *
 * Automatically require all helper files in the app/helpers directory (non-recursive).
 */
/*
$helpers = glob( __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . '*.php' );
foreach ( $helpers as $helper ) {
	if ( ! is_file( $helper ) ) {
		continue;
	}

	require_once $helper;
}
*/
// phpcs:enable
