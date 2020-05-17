<?php
/**
 * "The Loop" partial.
 *
 * @package MyApp
 */

?>
@if (have_posts())
	<ul class="articles">
		@while (have_posts())
			@php the_post() @endphp
			<li @php post_class( 'article' ) @endphp>
				<header class="article__head">
					@if (has_post_thumbnail())
						<div class="article__thumbnail">
							@php the_post_thumbnail() @endphp
						</div>
					@endif

					<h2 class="article__title">
						<a href="{{ get_permalink() }}" rel="bookmark" title="{{ my_app_get_permalink_title() }}">
							{{ get_the_title() }}
						</a>
					</h2>

					@include('views.partials.post-meta')
				</header>

				<div class="article__body">
					<div class="article__entry">
						@php the_excerpt() @endphp
					</div>
				</div>
			</li>
		@endwhile
	</ul>

	@include('views.partials.pagination')
@else
	<ul class="articles">
		<li class="article article--error404 article--not-found">
			<div class="article__body">
				<div class="article__entry">
					<p>{{ my_app_get_index_404_message() }}</p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</li>
	</ul>
@endif
