<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Beetroot_test-task
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function beetroot_test_task_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'beetroot_test_task_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function beetroot_test_task_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'beetroot_test_task_pingback_header' );

add_filter( 'nav_menu_css_class', 'change_menu_item_css_class', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_menu_items_css_class', 10, 4 );


function change_menu_items_css_class( $classes, $item, $args, $depth ) {
	$classes[] = 'header__navigation-menu__item';
	return $classes;
}

function change_menu_item_css_class( $classes, $item, $args, $depth ) {
	if( 13 === $item->ID  ){
		$classes[] = 'header__navigation-menu__item--border';
	}

	return $classes;
}
