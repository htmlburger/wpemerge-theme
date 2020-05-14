<?php
/**
 * Single post partial.
 *
 * @package MyApp
 */

?>
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<article <?php post_class( 'article article--single' ); ?>>
		<header class="article__head">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="article__thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

			<h2 class="article__title">
				<?php the_title(); ?>
			</h2>

			<?php \MyApp::render( 'views/partials/post-meta' ); ?>
		</header>

		<div class="article__body">
			<div class="article__entry">
				<?php the_content(); ?>
			</div>
		</div>
	</article>

	<?php \MyApp::render( 'views/partials/pagination' ); ?>

	<?php comments_template(); ?>
<?php endwhile; ?>
