<?php
/*
 *  Author: Chris Campbell
 *  URL: dynainteractive.com
 *  Custom functions, support, custom post types and more.
 */



/*------------------------------------*\
	Load files
\*------------------------------------*/

require get_template_directory() . '/inc/theme-support.php'; 
require get_template_directory() . '/inc/menus.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/acf-json.php';
//require get_template_directory() . '/inc/acf-fields.php';
require get_template_directory() . '/inc/settings.php';
require get_template_directory() . '/inc/blocks.php';

function enqueue_gutenberg_icons() {
	// Enqueue Gutenberg icons stylesheet
	wp_enqueue_style('wp-components');
}
add_action('wp_enqueue_scripts', 'enqueue_gutenberg_icons');

// Custom function to increment like counts
function increment_like_count($post_id) {
    // Retrieve the current like count from post metadata
    $current_count = get_post_meta($post_id, 'like_count', true);
    // If the like count doesn't exist, start from 1; otherwise, increment
    $current_count = $current_count ? (int) $current_count + 1 : 1;
    // Update the post metadata with the new like count
    update_post_meta($post_id, 'like_count', $current_count);
    return $current_count;
}

// AJAX handler to increment like counts
function handle_like_post() {
    if (isset($_POST['post_id'])) {
        $post_id = intval($_POST['post_id']);
        $new_count = increment_like_count($post_id);
        wp_send_json_success(['like_count' => $new_count]);
    } else {
        wp_send_json_error(['message' => 'Invalid post ID']);
    }
}

// Hook the function to handle AJAX requests for logged-in and guest users
add_action('wp_ajax_like_post', 'handle_like_post'); // For logged-in users
add_action('wp_ajax_nopriv_like_post', 'handle_like_post'); // For guests

function enqueue_custom_scripts() {
    // Enqueue custom JavaScript
    wp_enqueue_script(
        'custom-like-handler', // Unique handle
        get_template_directory_uri() . '/js/custom-like-handler.js', // Path to your JavaScript file
        ['jquery'], // Dependencies
        null, // Version (null to prevent caching)
        true // Load in footer
    );

    // Pass the AJAX URL to the script
    wp_localize_script(
        'custom-like-handler', 
        'ajax_object', 
        ['ajaxurl' => admin_url('admin-ajax.php')]
    );
}

// Hook to enqueue scripts on the frontend
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


?>