<?php
/**
 * Login helpers.
 */

/**
 * Changes the URL of the Logo on the Login screen.
 *
 * @return string Link to the Homepage.
 */
function app_filter_login_headerurl() {
	return home_url( '/' );
}

/**
 * Changes the Title attribute of the Logo on the Login Screen.
 *
 * @return string Site Title.
 */
function app_filter_login_headertitle() {
	return get_bloginfo( 'name' );
}
