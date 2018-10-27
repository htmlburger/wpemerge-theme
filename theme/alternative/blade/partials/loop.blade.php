<?php
/**
 * "The Loop" partial.
 *
 * @package WPEmergeTheme
 */

?>
@if (have_posts())
	<ol class="articles">
		@while (have_posts())
			@php the_post() @endphp
			<li @php post_class( 'article' ) @endphp>
				<header class="article__head">
					<h2 class="article__title">
						<a href="{{ get_permalink() }}" rel="bookmark" title="{{ app_get_permalink_title() }}">
							{{ get_the_title() }}
						</a>
					</h2><!-- /.article__title -->

					@include('partials.post-meta')
				</header><!-- /.article__head -->

				<div class="article__body">
					<div class="article__entry">
						@php the_excerpt() @endphp
					</div><!-- /.article__entry -->
				</div><!-- /.article__body -->
			</li><!-- /.article -->
		@endwhile
	</ol><!-- /.articles -->

	@php
	carbon_pagination(
		'posts',
		[
			'prev_html'         => '<a href="{URL}" class="paging__prev">' . esc_html__( '« Previous Entries', 'app' ) . '</a>',
			'next_html'         => '<a href="{URL}" class="paging__next">' . esc_html__( 'Next Entries »', 'app' ) . '</a>',
			'first_html'        => '<a href="{URL}" class="paging__first"></a>',
			'last_html'         => '<a href="{URL}" class="paging__last"></a>',
			'limiter_html'      => '<li class="paging__spacer">...</li>',
			// translators: %1$s = current page number; %2$s = total number of pages.
			'current_page_html' => '<span class="paging__label">' . esc_html( sprintf( __( 'Page %1$s of %2$s', 'app' ), '{CURRENT_PAGE}', '{TOTAL_PAGES}' ) ) . '</span>',
		]
	);
	@endphp
@else
	<ol class="articles">
		<li class="article article--error404 article--not-found">
			<div class="article__body">
				<div class="article__entry">
					<p>{{ app_get_index_404_message() }}</p>
					<?php get_search_form(); ?>
				</div><!-- /.article__entry -->
			</div><!-- /.article__body -->
		</li><!-- /.article -->
	</ol><!-- /.articles -->
@endif
