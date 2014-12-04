<?php

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('parent-style',get_template_directory_uri().'/style.css');
});

// Header customization
add_action('after_setup_theme', function() {
    remove_theme_support('custom-header');
}, 12);
