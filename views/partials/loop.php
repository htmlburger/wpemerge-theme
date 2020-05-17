<?php
/**
 * "The Loop" partial.
 *
 * @package MyApp
 */

?>
<?php if ( have_posts() ) : ?>
	<ul class="articles">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<li <?php post_class( 'article' ); ?>>
				<header class="article__head">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="article__thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>

					<h2 class="article__title">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( my_app_get_permalink_title() ); ?>">
							<?php the_title(); ?>
						</a>
					</h2>

					<?php \MyApp::render( 'views/partials/post-meta' ); ?>
				</header>

				<div class="article__body">
					<div class="article__entry">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>

	<?php \MyApp::render( 'views/partials/pagination' ); ?>
<?php else : ?>
	<ul class="articles">
		<li class="article article--error404 article--not-found">
			<div class="article__body">
				<div class="article__entry">
					<p><?php echo esc_html( my_app_get_index_404_message() ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</li>
	</ul>
<?php endif; ?>
