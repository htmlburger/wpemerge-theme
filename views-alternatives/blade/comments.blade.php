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
?>
@if (!post_password_required())
	<section class="section-comments" id="comments">
		@if (have_comments())
			<h3>@php comments_number( __( 'No Responses', 'myapp' ), __( 'One Response', 'myapp' ), __( '% Responses', 'myapp' ) ) @endphp</h3>
			<ol class="comments">
				@php
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
				@endphp
			</ol>

			@include('views.partials.pagination', ['for_comments' => true])
		@else
			@if (!comments_open())
				<p class="no-comments">{{ __( 'Comments are closed.', 'myapp' ) }}</p>
			@endif
		@endif

		@php
		comment_form(
			[
				'title_reply'         => __( 'Leave a Reply', 'myapp' ),
				'comment_notes_after' => '',
			]
		);
		@endphp
	</section>
@endif
