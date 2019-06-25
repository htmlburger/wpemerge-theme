<?php
/**
 * "The Loop" partial.
 *
 * @package WPEmergeTheme
 */

?>
<?php if ( have_posts() ) : ?>
	<div class="articles d-flex flex-row flex-wrap">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
				<?php Theme::partial('post-card')?>
		<?php endwhile; ?>
	</div>

	<?php
	carbon_pagination(
		'posts',
		[
			'enable_numbers' => true,
			'prev_html'      => '<a href="{URL}" class="paging__prev">' . esc_html__( '« Previous Entries', 'app' ) . '</a>',
			'next_html'      => '<a href="{URL}" class="paging__next">' . esc_html__( 'Next Entries »', 'app' ) . '</a>',
			'first_html'     => '<a href="{URL}" class="paging__first"></a>',
			'last_html'      => '<a href="{URL}" class="paging__last"></a>',
			'limiter_html'   => '<li class="paging__spacer">...</li>',
		]
	);
	?>
<?php else : ?>
	<ul class="articles">
		<li class="article article--error404 article--not-found">
			<div class="article__body">
				<div class="article__entry">
					<p><?php echo esc_html( app_get_index_404_message() ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</li>
	</ul>
<?php endif; ?>
