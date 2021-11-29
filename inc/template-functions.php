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



// add cutom class name to menu items
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

// Ajax filtering 

add_action( 'wp_enqueue_scripts', 'true_filter_scripts' );
 
function true_filter_scripts() {
 
 
	wp_register_script( 'filter', get_stylesheet_directory_uri() . '/js/jquery_scripts.js', array( 'jquery' ), time(), true );
	wp_localize_script( 'filter', 'true_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script( 'filter' );
 
}

add_action( 'wp_ajax_myfilter', 'filter' ); 
add_action( 'wp_ajax_nopriv_myfilter', 'filter' );
 
function filter(){
	

	$main_query = array(

		'relation' => 'AND',
	);
	$sub_query = array(

		'relation' => 'OR',
	);
	$all_offices = array();
	$all_department = array();
	$all_academies = array();

	$departments = get_terms( array( 'taxonomy' => 'department' ) );
	$offices = get_terms( array( 'taxonomy' => 'offices' ) );
	$academies = get_terms( array( 'taxonomy' => 'academies' ) );
 


	// for departments 
	if( $departments ) {
		foreach( $departments as $department ) {
			if( isset( $_POST['department_' . $department->term_id ] ) && $_POST['department_' . $department->term_id] == 'on' )
				$all_department[] = $department->term_id;
		}
		
		if( count( $all_department ) > 0 ) {
			$main_query[] =
				
				array(
					'taxonomy' => 'department',
					'field' => 'id',
					'terms'=> $all_department,
				);
			
		}
	}


	// for offices 
		if( $offices  ) {
			foreach( $offices as $office ) {
				if( isset( $_POST['office_' . $office->term_id ] ) && $_POST['office_' . $office->term_id] == 'on' )
					$all_offices[] = $office->term_id;
			}

		
			
			if( count( $all_offices ) > 0 ) {
				$sub_query[] = 

					array(
						'taxonomy' => 'offices',
						'field' => 'id',
						'terms'=> $all_offices,
			
					);
				
		
			}
	}

		// for offices 
		if( $academies ) {
			foreach( $academies as $academy ) {
				if( isset( $_POST['academy_' . $academy->term_id ] ) && $_POST['academy_' . $academy->term_id] == 'on' )
					$all_academies[] = $academy->term_id;
			}
			
			if( count( $all_academies ) > 0 ) {
				$sub_query[] = 
					
					array(
						'taxonomy' => 'academies',
						'field' => 'id',
						'terms'=> $all_academies,
			
					);
		
			}
	}

	// push academies or offices arrays to main array when they not = 0 

	if (count( $all_academies ) ||  count( $all_offices) > 0 ) {
		$main_query[] = $sub_query;
	}



	$args = array(
		'posts_per_page' => -1,
		'post_type'   => 'vacancy',
		'orderby' => 'date', 
		'order'	=> 'DESC', 
		'tax_query' => $main_query,
	);

	
	global $post;

	$query = new WP_Query;

    $myposts = $query->query($args);

	foreach( $myposts as $post ){

	setup_postdata($post);

	get_template_part( 'template-parts/content-job-posts');

	}

	wp_reset_postdata();

	die();
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

// add option (socials) page
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    if( function_exists('acf_add_options_page') ) {

        $option_page = acf_add_options_page(array(
            'page_title'    => __('Socials Settings'),
            'menu_title'    => __('Socials'),
            'menu_slug'     => 'social-general-settings',
			'position'      => 27,
			'icon_url'      => 'dashicons-share',
			'post_id'		=> 'socials'
        ));
    }


}
// add option vacancy page
add_action('acf/init', 'vacancy_options_init');
function vacancy_options_init() {

    if( function_exists('acf_add_options_page') ) {

        $option_page = acf_add_options_page(array(
            'page_title'    => __('Vacancy main settings'),
            'menu_title'    => __('Vacancy setting'),
            'menu_slug'     => 'vacancy-settings',
			'position'      => 26,
			'icon_url'      => 'dashicons-table-row-after',
			'post_id'		=> 'vacancy_settings'
        ));
    }


}
// add option (footer) page
add_action('acf/init', 'my_footer_op_init');
function my_footer_op_init() {

    if( function_exists('acf_add_options_page') ) {

        $option_page = acf_add_options_page(array(
            'page_title'    => __('Footer'),
            'menu_title'    => __('Footer'),
            'menu_slug'     => 'footer-settings',
			'position'      => 28,
			'icon_url'      => 'dashicons-table-row-after',
			'post_id'		=> 'footer'
        ));
    }


}

// add svg upload type
add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;

}
// add svg mime type

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );
	if( $dosvg ){
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

// view svg in media library

add_filter( 'wp_prepare_attachment_for_js', 'show_svg_in_media_library' );

function show_svg_in_media_library( $response ) {
	if ( $response['mime'] === 'image/svg+xml' ) {
		$response['image'] = [
			'src' => $response['url'],
		];
	}
	return $response;
}