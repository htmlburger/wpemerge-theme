<?php
/**
 * Single post partial.
 */

?>
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<article <?php post_class( 'article article--single' ); ?>>
		<header class="article__head">
			<h2 class="article__title">
				<?php the_title(); ?>
			</h2><!-- /.article__title -->

			<?php Theme::partial( 'post-meta' ); ?>
		</header><!-- /.article__head -->

		<div class="article__body">
			<div class="article__entry">
				<?php the_content(); ?>
			</div><!-- /.article__entry -->
		</div><!-- /.article__body -->
	</article><!-- /.article -->

	<?php comments_template(); ?>

	<?php
	carbon_pagination( 'post', [
		'prev_html' => '<a href="{URL}" class="paging__prev">' . esc_html__( '« Previous Entry', 'app' ) . '</a>',
		'next_html' => '<a href="{URL}" class="paging__next">' . esc_html__( 'Next Entry »', 'app' ) . '</a>',
	] );
	?>
<?php endwhile; ?>
