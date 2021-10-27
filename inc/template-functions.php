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

add_filter( 'nav_menu_css_class', 'change_header_menu_css_classes', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_footer_1_menu_css_classes', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_footer_2_menu_css_classes', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_footer_3_menu_css_classes', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_header_menu_css_class', 10, 4 );


function change_header_menu_css_classes( $classes, $item, $args, $depth ) {
	if(  'menu-header' === $args->theme_location ){
	$classes[] = 'header__navigation-menu__item';
	}
	return $classes;
}

function change_header_menu_css_class( $classes, $item, $args, $depth ) {
	if( 13 === $item->ID && 'menu-header' === $args->theme_location ){
		$classes[] = 'header__navigation-menu__item--border';
	}

	return $classes;
}

function change_footer_1_menu_css_classes( $classes, $item, $args, $depth ) {
	if( 'menu-footer_1' === $args->theme_location ){
		$classes[] = 'footer-navigation-menu__item';
	}

	return $classes;
}
function change_footer_2_menu_css_classes( $classes, $item, $args, $depth ) {
	if( 'menu-footer_2' === $args->theme_location ){
		$classes[] = 'footer-navigation-menu__item';
	}

	return $classes;
}
function change_footer_3_menu_css_classes( $classes, $item, $args, $depth ) {
	if( 'menu-footer_3' === $args->theme_location ){
		$classes[] = 'footer-navigation-menu__item';
	}

	return $classes;
}

// Ajax search 
add_action( 'wp_ajax_nopriv_beetroot_ajax_search', 'beetroot_ajax_search' );
add_action( 'wp_ajax_beetroot_ajax_search', 'beetroot_ajax_search' );
function beetroot_ajax_search(){ 
	$args = array( 
		'post_type'      => 'vacancy', 
		'post_status'    => 'publish', 
		'order'          => 'DESC', 
		'orderby'        => 'date', 
		's'              => $_POST['term'], 
		'posts_per_page' => -1 
	); 
	$query = new WP_Query( $args ); 
	if(!$query->have_posts()){ 
	?>
	<li><a href="#">Ничего не найдено, попробуйте другой запрос</a></li>
	<?php
	 }
}

// show tags on post add/edit page
function show_all_tags ( $args ) {
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_POST['action'] ) && $_POST['action'] === 'get-tagcloud' ){
		unset( $args['number'] );
		$args['hide_empty']= 0 ;
	}
        
    return $args;
}

add_filter( 'get_terms_args', 'show_all_tags' );


