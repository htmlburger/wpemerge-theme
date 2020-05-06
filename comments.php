<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package MyTheme
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<section class="section-comments" id="comments">
	<?php if ( have_comments() ) : ?>
		<h3><?php comments_number( __( 'No Responses', 'mytheme' ), __( 'One Response', 'mytheme' ), __( '% Responses', 'mytheme' ) ); ?></h3>
		<ol class="comments">
			<?php
			wp_list_comments(
				[
					'callback' => function( $comment, $args, $depth ) {
						\MyTheme::theme()->partial(
							'comment-single',
							[
								'comment' => $comment,
								'args'    => $args,
								'depth'   => $depth,
							]
						);
					},
				]
			);
			?>
		</ol>

		<?php \MyTheme::theme()->partial( 'pagination', [ 'for_comments' => true ] ); ?>
	<?php else : ?>
		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mytheme' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form(
		[
			'title_reply'         => __( 'Leave a Reply', 'mytheme' ),
			'comment_notes_after' => '',
		]
	);
	?>
</section>
