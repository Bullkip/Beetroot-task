<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Beetroot_test-task
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'beetroot-test-task' ); ?></a>

	<header  class="header">
		<div class="header__container main-container">
					<?php
					the_custom_logo();?>
					<div class="header__lang-widget">
						<a href="#" class="header__lang-toggle" ><span data-toggle="true">Eng</span></a>
						<ul class="header__lang-submenu">
							<li class="header__lang-submenu-item"><a data-toggle href="#">Укр</a></li>
							<li class="header__lang-submenu-item"><a data-toggle href="#">Рус</a></li>
						</ul>
					</div>
				<nav  class="header__navigation">
					<button type="button" class="header__navigation-btn">
						<div></div>
						<div></div>
						<div></div>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-header',
							'menu_id'        => 'header-navigation',
							'container'       => 'div',
							'container_class' => 'header__navigation-wrap',
							'items_wrap'      => '<ul id="%1$s" class="header__navigation-menu">%3$s</ul>',
						)
					);
					?>
				</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
