<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package MyApp
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
		<h3><?php comments_number( __( 'No Responses', 'myapp' ), __( 'One Response', 'myapp' ), __( '% Responses', 'myapp' ) ); ?></h3>
		<ol class="comments">
			<?php
			wp_list_comments(
				[
					'callback' => function( $comment, $args, $depth ) {
						\MyApp::theme()->partial(
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

		<?php \MyApp::theme()->partial( 'pagination', [ 'for_comments' => true ] ); ?>
	<?php else : ?>
		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'myapp' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form(
		[
			'title_reply'         => __( 'Leave a Reply', 'myapp' ),
			'comment_notes_after' => '',
		]
	);
	?>
</section>
