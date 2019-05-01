<?php

namespace App\View;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Provides custom route conditions.
 * This is an example class so feel free to modify or remove it.
 */
class ViewServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		require_once APP_APP_DIR . 'views.php';
	}
}
