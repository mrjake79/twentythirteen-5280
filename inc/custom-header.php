<?php
/**
 * Implement a custom header for the 5280 Pool League theme based on Twenty Thirteen.
 */

function twentythirteen_5280_custom_header_setup()
{
    $args = array(
        // Text color and image
		'default-text-color'     => '220e10',
		'default-image'          => '%s/images/headers/circle.png',

		// Set height and width, with a maximum value for the width.
		'height'                 => 296,
		'width'                  => 859,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'twentythirteen_header_style',
		'admin-head-callback'    => 'twentythirteen_admin_header_style',
		'admin-preview-callback' => 'twentythirteen_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );
}
add_action('after_setup_theme', 'twentythirteen_5280_custom_header_setup', 11);
