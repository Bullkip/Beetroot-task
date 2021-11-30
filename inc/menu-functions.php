<?php
/**
 * Functions for working with menus in WordPres .
 * @package Beetroot_test-task
 */

// add cutom class name to menu items
add_action('wp_head', 'beetroot_test_task_pingback_header');
add_filter('nav_menu_css_class', 'change_header_menu_css_classes', 10, 4);
add_filter('nav_menu_css_class', 'change_footer_1_menu_css_classes', 10, 4);
add_filter('nav_menu_css_class', 'change_footer_2_menu_css_classes', 10, 4);
add_filter('nav_menu_css_class', 'change_footer_3_menu_css_classes', 10, 4);
add_filter('nav_menu_css_class', 'change_header_menu_css_class', 10, 4);
function change_header_menu_css_classes($classes, $item, $args, $depth) {
    if ('menu-header' === $args->theme_location) {
        $classes[] = 'header__navigation-menu__item';
    }
    return $classes;
}
function change_header_menu_css_class($classes, $item, $args, $depth) {
    if (13 === $item->ID && 'menu-header' === $args->theme_location) {
        $classes[] = 'header__navigation-menu__item--border';
    }
    return $classes;
}
function change_footer_1_menu_css_classes($classes, $item, $args, $depth) {
    if ('menu-footer_1' === $args->theme_location) {
        $classes[] = 'footer-navigation-menu__item';
    }
    return $classes;
}
function change_footer_2_menu_css_classes($classes, $item, $args, $depth) {
    if ('menu-footer_2' === $args->theme_location) {
        $classes[] = 'footer-navigation-menu__item';
    }
    return $classes;
}
function change_footer_3_menu_css_classes($classes, $item, $args, $depth) {
    if ('menu-footer_3' === $args->theme_location) {
        $classes[] = 'footer-navigation-menu__item';
    }
    return $classes;
}
