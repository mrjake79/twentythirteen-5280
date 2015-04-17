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
if(is_plugin_active('wordpress-social-login')) {
    add_action('login_enqueue_scripts', function() {
        wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/style-login.css');
    });
}
