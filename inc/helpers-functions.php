<?php
/**
 * Functions which add some improvements or additions for curent theme
 *
 * @package Beetroot_test-task
 */

add_filter("script_loader_tag", "add_module_to_scripts", 10, 3);
function add_module_to_scripts($tag, $handle, $src) {
    if ("scripts" === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter("script_loader_tag", "add_module_to_footer", 10, 3);
function add_module_to_footer($tag, $handle, $src) {
    if ("footer" === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter("script_loader_tag", "add_module_to_header", 10, 3);
function add_module_to_header($tag, $handle, $src) {
    if ("header" === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter("script_loader_tag", "add_module_to_ajax", 10, 3);
function add_module_to_ajax($tag, $handle, $src) {
    if ("ajax" === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter("script_loader_tag", "add_module_to_content", 10, 3);
function add_module_to_content($tag, $handle, $src) {
    if ("content" === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter('get_terms_args', 'show_all_tags');
// add svg upload type
add_filter('upload_mimes', 'svg_upload_allow');
function svg_upload_allow($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
// add svg mime type
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '') {
    if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
    else $dosvg = ('.svg' === strtolower(substr($filename, -4)));
    if ($dosvg) {
        if (current_user_can('manage_options')) {
            $data['ext'] = 'svg';
            $data['type'] = 'image/svg+xml';
        } else {
            $data['ext'] = $type_and_ext['type'] = false;
        }
    }
    return $data;
}
// view svg in media library
add_filter('wp_prepare_attachment_for_js', 'show_svg_in_media_library');
function show_svg_in_media_library($response) {
    if ($response['mime'] === 'image/svg+xml') {
        $response['image'] = ['src' => $response['url'], ];
    }
    return $response;
}
