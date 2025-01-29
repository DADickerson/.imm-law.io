<?php

// Add ui-kit navigation classes
add_filter( "nav_menu_css_class", "nav_menu_item_parent_classing", 10, 2 );
function nav_menu_item_parent_classing( $classes, $item ) {
    global $wpdb;
    $has_children = $wpdb -> get_var( "SELECT COUNT(meta_id) FROM {$wpdb->prefix}postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'" );
    if ( $has_children > 0 ) {  array_push( $classes, "uk-parent" );  }
    return $classes;
}


// Setup ui-kit walker menu
class Child_Wrap extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"uk-navbar-dropdown\"><ul class=\"uk-nav uk-navbar-dropdown-nav\">\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}

class Child_Wrap2 extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"uk-nav-sub\">\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}


// Custom navigation
function nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu' => '', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'menu_id' => '', 'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul class="uk-navbar-nav uk-visible@l">%3$s</ul>', 'depth' => 0, 'walker'=> new Child_Wrap()
        )
    );
}

function extra_nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'extra-menu',
        'menu' => '', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'menu_id' => '', 'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '%3$s', 'depth' => 0, 'walker'=> new Child_Wrap2()
        )
    );
}

function footer_nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu' => '', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'menu_id' => '', 'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul class="uk-navbar-nav uk-visible@l">%3$s</ul>', 'depth' => 0, 'walker'=> new Child_Wrap()
        )
    );
}

function mobile_nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu' => '', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'menu_id' => '', 'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '%3$s', 'depth' => 0, 'walker'=> new Child_Wrap2()
        )
    );
}


// Register Custom Navigation
add_action('init', 'register_menu'); // Add Custom Menu

function register_menu() {
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'custom'), // Main Navigation
        'extra-menu' => __('Extra Menu', 'custom') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

?>