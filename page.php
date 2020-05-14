<?php
/**
 * Layout: views/layouts/app.php
 *
 * This is the template that is used for displaying all pages by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MyApp
 */

?>
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div <?php post_class(); ?>>
		<?php my_app_the_title( '<h2 class="post-title">', '</h2>' ); ?>

		<div class="page__content">
			<?php the_content(); ?>

			<?php edit_post_link( __( 'Edit this entry.', 'my_app' ), '<p>', '</p>' ); ?>

			<?php \MyApp::render( 'views/partials/pagination' ); ?>
		</div>
	</div>
<?php endwhile; ?>
