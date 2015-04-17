<?php

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('parent-style',get_template_directory_uri().'/style.css');
});

// Header customization
add_action('after_setup_theme', function() {
    remove_theme_support('custom-header');
}, 12);

// Custom login redirect
add_filter('login_redirect', function($redirect_to, $request, $user) {
    if(is_array($user->roles) && in_array('administrator', $user->roles)) {
        return admin_url();
    } elseif($user->id) {
        return admin_url() . 'index.php';
    } else {
        return site_url();
    }
}, 10, 3);

// Customize the login page
add_action('login_enqueue_scripts', function() {
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/style-login.css');
});

// Remove default meta boxes
add_action('wp_dashboard_setup', function() {
    remove_meta_box('projectmanager_dashboard', 'dashboard', 'normal');
    remove_meta_box('leaguemanager_dashboard', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
}, 15);

// Add login menu item
add_filter('wp_nav_menu_items', function($items, $args) {
    if($args->theme_location == 'primary') {
        if(is_user_logged_in()) {
            $items .= "<li><a href='" . wp_logout_url() . "'>Log Out</a></li>";
        } else {
            $items .= "<li><a href='" . site_url('wp-login.php') . "'>Log In</a></li>";
        }
    }
    return $items;
}, 10, 2);
