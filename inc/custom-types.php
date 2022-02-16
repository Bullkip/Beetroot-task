<?php
/**
 * Functions for working with custom posts , pages and some plugins . Who work with custom types.
 *
 * @package Beetroot_test-task
 */

// add option (socials) page
add_action('acf/init', 'socials_init');
function socials_init() {
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


