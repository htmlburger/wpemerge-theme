<?php
/**
 * Login helpers.
 *
 * @package WPEmergeTheme
 */

/**
 * Changes the URL of the logo on the login screen.
 *
 * @return string Link to the Homepage.
 */
function app_filter_login_headerurl() {
	return home_url( '/' );
}

/**
 * Changes the text of the logo on the login Screen.
 *
 * @return string Site Title.
 */
function app_filter_login_headertext() {
	return get_bloginfo( 'name' );
}
