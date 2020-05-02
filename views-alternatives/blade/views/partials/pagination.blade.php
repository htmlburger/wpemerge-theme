<?php
/**
 * Displays pagination for the main query.
 *
 * @package WPEmergeTheme
 */

$comments = isset( $comments ) ? $comments : false;

if ( $comments ) {
	paginate_comments_links();
} else if ( is_singular() ) {
	wp_link_pages();
} else {
	the_posts_pagination();
}
