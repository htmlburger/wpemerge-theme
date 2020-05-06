<?php
/**
 * Layout: views/layouts/app.php
 *
 * This is the template that is used for displaying all pages by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MyTheme
 */

?>
<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div <?php post_class(); ?>>
		<?php mytheme_the_title( '<h2 class="post-title">', '</h2>' ); ?>

		<div class="page__content">
			<?php the_content(); ?>

			<?php edit_post_link( __( 'Edit this entry.', 'mytheme' ), '<p>', '</p>' ); ?>

			<?php \MyTheme::theme()->partial( 'pagination' ); ?>
		</div>
	</div>
<?php endwhile; ?>
