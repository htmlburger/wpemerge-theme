<?php
/**
 * "The Loop" partial.
 *
 * @package WPEmergeTheme
 */

?>
<?php if ( have_posts() ) : ?>
	<ol class="articles">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php
			/* translators: post link title attribute */
			$link_title = sprintf( __( 'Permanent Link to %s', 'app' ), get_the_title() );
			?>
			<li <?php post_class( 'article' ); ?>>
				<header class="article__head">
					<h2 class="article__title">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( $link_title ); ?>">
							<?php the_title(); ?>
						</a>
					</h2><!-- /.article__title -->

					<?php Theme::partial( 'post-meta' ); ?>
				</header><!-- /.article__head -->

				<div class="article__body">
					<div class="article__entry">
						<?php the_content( __( 'Read the rest of this entry &raquo;', 'app' ) ); ?>
					</div><!-- /.article__entry -->
				</div><!-- /.article__body -->
			</li><!-- /.article -->
		<?php endwhile; ?>
	</ol><!-- /.articles -->

	<?php
	carbon_pagination(
		'posts',
		[
			'prev_html'         => '<a href="{URL}" class="paging__prev">' . esc_html__( '« Previous Entries', 'app' ) . '</a>',
			'next_html'         => '<a href="{URL}" class="paging__next">' . esc_html__( 'Next Entries »', 'app' ) . '</a>',
			'first_html'        => '<a href="{URL}" class="paging__first"></a>',
			'last_html'         => '<a href="{URL}" class="paging__last"></a>',
			'limiter_html'      => '<li class="paging__spacer">...</li>',
			'current_page_html' => '<span class="paging__label">Page {CURRENT_PAGE} of {TOTAL_PAGES}</span>',
		]
	);
	?>
<?php else : ?>
	<ol class="articles">
		<li class="article article--error404 article--not-found">
			<div class="article__body">
				<div class="article__entry">
					<p>
						<?php
						if ( is_category() ) {
							/* translators: no posts found for category */
							echo esc_html( sprintf( __( 'Sorry, but there aren\'t any posts in the %s category yet.', 'app' ), single_cat_title( '', false ) ) );
						} elseif ( is_date() ) {
							esc_html_e( 'Sorry, but there aren\'t any posts with this date.', 'app' );
						} elseif ( is_author() ) {
							$userdata = get_user_by( 'id', get_queried_object_id() );
							/* translators: no posts found for author */
							echo esc_html( sprintf( __( 'Sorry, but there aren\'t any posts by %s yet.', 'app' ), $userdata->display_name ) );
						} elseif ( is_search() ) {
							esc_html_e( 'No posts found. Try a different search?', 'app' );
						} else {
							esc_html_e( 'No posts found.', 'app' );
						}
						?>
					</p>
					<?php get_search_form(); ?>
				</div><!-- /.article__entry -->
			</div><!-- /.article__body -->
		</li><!-- /.article -->
	</ol><!-- /.articles -->
<?php endif; ?>
