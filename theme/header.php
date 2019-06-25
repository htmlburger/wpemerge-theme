<?php
/**
 * Theme header partial.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPEmergeTheme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php app_shim_wp_body_open(); ?>
		<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
		  <div class="container">
				<a class="navbar-brand" href="/"><?php bloginfo( 'name' ); ?></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-items-container" aria-controls="navbar-items-container" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

					<?php
					wp_nav_menu( array(
						'theme_location'    => 'main-menu',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'navbar-items-container',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),
					) );
					?>
			</div>
		</nav>
