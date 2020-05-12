<?php
/**
 * Load helpers.
 * Define any generic functions in a helper file and then require that helper file here.
 *
 * @package MyApp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load helpers.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'shims.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'content.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'title.php';
