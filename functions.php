<?php
/**
 * Beetroot test-task functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Beetroot_test-task
 */



if (!function_exists('beetroot_test_task_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function beetroot_test_task_setup() {
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
        */
        add_theme_support('title-tag');
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array('menu-header' => esc_html__('Header menu', 'beetroot-test-task'), 'menu-footer_1' => esc_html__('Footer menu 1', 'beetroot-test-task'), 'menu-footer_2' => esc_html__('Footer menu 2', 'beetroot-test-task'), 'menu-footer_3' => esc_html__('Footer menu 3', 'beetroot-test-task'),));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
        */
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',));
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array('height' => 250, 'width' => 250, 'flex-width' => true, 'flex-height' => true,));
    }
endif;
add_action('after_setup_theme', 'beetroot_test_task_setup');
/**
 * Enqueue scripts and styles.
 */
function beetroot_test_task_scripts() {
    wp_enqueue_style('beetroot-test-task-style', get_stylesheet_uri(), array());
    wp_style_add_data('beetroot-test-task-style', 'rtl', 'replace');
    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'));
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', true);
    wp_enqueue_script('ajax', get_template_directory_uri() . '/js/modules/ajax.js', true);
    wp_enqueue_script('content', get_template_directory_uri() . '/js/modules/content.js', true);
    wp_enqueue_script('footer', get_template_directory_uri() . '/js/modules/footer.js', true);
    wp_enqueue_script('header', get_template_directory_uri() . '/js/modules/header.js', true);
}
add_action('wp_enqueue_scripts', 'beetroot_test_task_scripts');
/**
 * Helpers.
 */
require get_template_directory() . '/inc/helpers-functions.php';
/**
 * Ajax.
 */
require get_template_directory() . '/inc/ajax-functions.php';
/**
 * Custom Types.
 */
require get_template_directory() . '/inc/custom-types.php';
/**
 * Menus.
 */
require get_template_directory() . '/inc/menu-functions.php';


