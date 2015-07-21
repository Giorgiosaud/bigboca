<?php
function bigboca_custom_header_setup()
{
    $args = array(
        // Text color and image (empty to use none).
        'default-text-color' => '220e10',
        'default-image'      => '%s/img/logo.png',

        // Set height and width, with a maximum value for the width.
        'height'             => '100%',
        'width'              => '100%',

        // Callbacks for styling the header and the admin preview.
//    'wp-head-callback'       => 'twentythirteen_header_style',
//    'admin-head-callback'    => 'twentythirteen_admin_header_style',
//    'admin-preview-callback' => 'twentythirteen_admin_header_image',
    );
    add_theme_support('custom-header', $args);
}
add_action( 'after_setup_theme', 'bigboca_custom_header_setup', 11 );



add_filter('gettext', 'change_howdy', 10, 3);

function change_howdy($translated, $text, $domain) {

    if (!is_admin() || 'default' != $domain)
        return $translated;

    if (false !== strpos($translated, 'Howdy'))
        return str_replace('Howdy', 'Welcome', $translated);

    return $translated;
}

