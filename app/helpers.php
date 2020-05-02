<?php
/**
 * Load helpers.
 *
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load base helpers.
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'shims.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'admin.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'assets.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'content.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'login.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'shortcodes.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'title.php';

/**
 * Require custom helper files here.
 */

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
