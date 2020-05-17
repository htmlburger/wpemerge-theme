<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register a session for Flash and OldInput to work with.
 */
class SessionServiceProvider implements ServiceProviderInterface {
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
		add_action( 'init', [$this, 'startSession'] );
	}

	/**
	 * Start a new session.
	 *
	 * @return void
	 */
	public function startSession() {
		if ( session_status() === PHP_SESSION_NONE ) {
			session_start();
		}
	}
}
