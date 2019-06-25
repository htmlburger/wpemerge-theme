<?php
/**
 * Single post partial.
 *
 * @package WPEmergeTheme
 */
global $post;
?>
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<article <?php post_class( 'article article--single' ); ?>>

			<?php
			$title = apply_filters('emergence_render_post_title', 'partials/page-title', $post);
			WPEmerge\render($title);
			?>

		<div class="article__body">
			<div class="article__entry">
				<?php
					do_action('emergence_content_before_content', $post);
				 ?>
				<?php the_content(); ?>
				<?php
					do_action('emergence_content_after_content', $post);
				 ?>
			</div>
		</div>
	</article>

	<?php comments_template(); ?>

	<?php
	carbon_pagination(
		'post',
		[
			'prev_html' => '<a href="{URL}" class="paging__prev">' . esc_html__( '« Previous Entry', 'app' ) . '</a>',
			'next_html' => '<a href="{URL}" class="paging__next">' . esc_html__( 'Next Entry »', 'app' ) . '</a>',
		]
	);
	?>
<?php endwhile; ?>
