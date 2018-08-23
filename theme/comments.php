<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WPEmergeTheme
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

		<h3><?php comments_number( __( 'No Responses', 'app' ), __( 'One Response', 'app' ), __( '% Responses', 'app' ) ); ?></h3>

		<ol class="comments">
			<?php
			wp_list_comments( [
				'callback' => function( $comment, $args, $depth ) {
					Theme::partial( 'comment-single', [
						'comment' => $comment,
						'args'    => $args,
						'depth'   => $depth,
					] );
				},
			] );
			?>
		</ol>

		<?php
		carbon_pagination( 'comments', [
			// modify the text of the previous page link.
			'prev_html' => '<a href="{URL}" class="paging__prev">' . esc_html__( '« Older Comments', 'app' ) . '</a>',

			// modify the text of the next page link.
			'next_html' => '<a href="{URL}" class="paging__next">' . esc_html__( 'Newer Comments »', 'app' ) . '</a>',
		] );
		?>

	<?php else : ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'app' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php
	comment_form( [
		'title_reply'         => __( 'Leave a Reply', 'app' ),
		'comment_notes_after' => '',
	] );
	?>

</section>
