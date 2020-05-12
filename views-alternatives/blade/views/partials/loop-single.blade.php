<?php
/**
 * Single post partial.
 *
 * @package MyApp
 */

?>
@while (have_posts())
	@php the_post() @endphp
	<article @php post_class( 'article article--single' ) @endphp>
		<header class="article__head">
			@if (has_post_thumbnail())
				<div class="article__thumbnail">
					@php the_post_thumbnail() @endphp
				</div>
			@endif

			<h2 class="article__title">
				{{ get_the_title() }}
			</h2>

			@include('views.partials.post-meta')
		</header>

		<div class="article__body">
			<div class="article__entry">
				@php the_content() @endphp
			</div>
		</div>
	</article>

	@include('views.partials.pagination')

	@php comments_template() @endphp
@endwhile
