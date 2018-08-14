<?php
/**
 * App Layout: layouts/app.php
 *
 * Generic error fallback view.
 * Used if no view is found for the current error status code.
 */

/* translators: generic error page content; placeholder represents homepage url */
printf( __( '<p>Please check the URL for proper spelling and capitalization.<br />If you\'re having trouble locating a destination, try visiting the <a href="%1$s">home page</a>.</p>', 'app' ), home_url( '/' ) );
