<?php
/**
 * Functions for working with ajax WordPres queries.
 * @package Beetroot_test-task
 */



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