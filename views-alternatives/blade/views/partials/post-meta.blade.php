<?php
/**
 * Displays the post date/time, author, tags, categories and comments link.
 *
 * Should be called only within The Loop.
 *
 * It will be displayed only for post type "post".
 *
 * @package MyApp
 */

?>
@if ( get_post_type() === 'post' )
	<div class="article__meta">
		<p>
			{{ get_the_time( 'F jS, Y ' ) }}
			{{-- translators: post author attribution --}}
			{{ sprintf( __( 'by %s', 'my_app' ), get_the_author() ) }}
		</p>

		<p>
			{{ __( 'Posted in ', 'my_app' ) }}
			@php the_category( ', ' ) @endphp
			@if (comments_open())
				<span> | </span>
				@php comments_popup_link( __( 'No Comments', 'my_app' ), __( '1 Comment', 'my_app' ), __( '% Comments', 'my_app' ) ) @endphp
			@endif
		</p>

		@php the_tags( '<p>' . __( 'Tags:', 'my_app' ) . ' ', ', ', '</p>' ) @endphp
	</div>
@endif
