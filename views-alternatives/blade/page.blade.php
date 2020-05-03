<?php
/**
 * This is the template that is used for displaying all pages by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MyTheme
 */

?>
@extends('views.layouts.app')

@section('content')
	@while (have_posts())
		@php the_post() @endphp
		<div @php post_class() @endphp>
			@php mytheme_the_title( '<h2 class="post-title">', '</h2>' ) @endphp

			<div class="page__content">
				@php the_content(); @endphp

				@php edit_post_link( __( 'Edit this entry.', 'mytheme' ), '<p>', '</p>' ); @endphp

				@include('views.partials.pagination')
			</div>
		</div>
	@endwhile
@endsection
