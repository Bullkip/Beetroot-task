<?php
/**
 * Beetroot test-task functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Beetroot_test-task
 */



if ( ! function_exists( 'beetroot_test_task_setup' ) ) :

	function beetroot_test_task_setup() {

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-header' => esc_html__( 'Header menu', 'beetroot-test-task' ),
				'menu-footer_1' => esc_html__( 'Footer menu 1', 'beetroot-test-task' ),
				'menu-footer_2' => esc_html__( 'Footer menu 2', 'beetroot-test-task' ),
				'menu-footer_3' => esc_html__( 'Footer menu 3', 'beetroot-test-task' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'beetroot_test_task_setup' );



/**
 * Enqueue scripts and styles.
 */
function beetroot_test_task_scripts() {
	wp_enqueue_style( 'beetroot-test-task-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'beetroot-test-task-style', 'rtl', 'replace' );


	wp_enqueue_script( 'beetroot-test-task-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js',array('jquery') );

	wp_enqueue_script( 'beetroot-test-task-scripts', get_template_directory_uri() . '/js/scripts.js', array('beetroot-test-task-isotope'), _S_VERSION, true );
	
}
add_action( 'wp_enqueue_scripts', 'beetroot_test_task_scripts' );

require get_template_directory() . '/inc/template-functions.php';



