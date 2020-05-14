<?php
/**
 * Single comment partial.
 *
 * @package MyApp
 */

?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment">
		<div class="comment__author vcard">
			<?php echo get_avatar( $comment, 48 ); ?>
			<?php comment_author_link(); ?>
			<span class="comment__says"><?php esc_html_e( 'says:', 'my_app' ); ?></span>
		</div>

		<?php if ( '0' === $comment->comment_approved ) : ?>
			<em class="comment__moderation-notice"><?php esc_html_e( 'Your comment is awaiting moderation.', 'my_app' ); ?></em><br />
		<?php endif; ?>

		<div class="comment__meta">
			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
				/* translators: comment date and time */
				echo esc_html( sprintf( __( '%1$s at %2$s', 'my_app' ), get_comment_date(), get_comment_time() ) );
				?>
			</a>

			<?php edit_comment_link( esc_html__( '(Edit)', 'my_app' ), '  ', '' ); ?>
		</div>

		<div class="comment__text">
			<?php comment_text(); ?>
		</div>

		<div class="comment__reply">
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
