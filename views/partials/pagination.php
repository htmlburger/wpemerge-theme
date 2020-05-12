<?php
/**
 * Displays pagination for the main query.
 *
 * @package MyApp
 */

$for_comments = isset( $for_comments ) ? $for_comments : false;

if ( $for_comments ) {
	paginate_comments_links();
} elseif ( is_singular() ) {
	wp_link_pages();
} else {
	the_posts_pagination();
}
