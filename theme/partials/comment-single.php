<?php
/**
 * Single comment partial.
 *
 * @package WPEmergeTheme
 */

?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment-entry">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 48 ); ?>
			<?php comment_author_link(); ?>
			<span class="says"><?php esc_html_e( 'says:', 'app' ); ?></span>
		</div>

		<?php if ( '0' === $comment->comment_approved ) : ?>
			<em class="moderation-notice"><?php esc_html_e( 'Your comment is awaiting moderation.', 'app' ); ?></em><br />
		<?php endif; ?>

		<div class="comment-meta">
			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
				/* translators: comment date and time */
				printf( esc_html__( '%1$s at %2$s', 'app' ), get_comment_date(), get_comment_time() );
				?>
			</a>

			<?php edit_comment_link( esc_html__( '(Edit)', 'app' ), '  ', '' ); ?>
		</div>

		<div class="comment-text">
			<?php comment_text(); ?>
		</div>

		<div class="comment-reply">
			<?php
			comment_reply_link(
				array_merge(
					$args,
					[
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
					]
				)
			);
			?>
		</div>
	</div>
<?php // closing </li> tag is added by WordPress. ?>
