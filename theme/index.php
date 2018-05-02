<?php
/**
 * The main template file
 *
 * This is the template that is used for displaying:
 * - posts
 * - single posts
 * - archive pages
 * - search results pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @since 1.0
 * @version 1.0
 */

get_header();

app_the_title( '<h2 class="pagetitle">', '</h2>' );

if ( is_single() ) {
	Theme::partial( 'loop', 'single' );
} else {
	Theme::partial( 'loop' );
}

get_sidebar();

get_footer();
