<?php
/**
 * Displays the post date/time, author, tags, categories and comments link.
 *
 * Should be called only within The Loop.
 *
 * It will be displayed only for post type "post".
 *
 * @package WPEmergeTheme
 */

if ( get_post_type() !== 'post' ) {
	return;
}
?>

<div class="article__meta">
	<p class="text-muted">
		<?php
		the_time( 'j F Y ' );
		/* translators: post author attribution */
		echo esc_html( sprintf( __( 'by %s', 'app' ), get_the_author() ) );
		echo '<span> / </span>';
		esc_html_e( 'Categories: ', 'app' );
		the_category( ', ' );
		if ( comments_open() ) {
			echo '<span> / </span>';
			comments_popup_link( __( 'No Comments', 'app' ), __( '1 Comment', 'app' ), __( '% Comments', 'app' ) );
		}
		?>
	</p>

	<?php the_tags( '<p>' . __( 'Tags:', 'app' ) . ' ', ', ', '</p>' ); ?>
</div>
