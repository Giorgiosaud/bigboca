<?php
function bigbocascripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_style('allStyles', get_template_directory_uri() . '/public/css/style.css', array(), '1.0');
    wp_enqueue_script('allJs', get_template_directory_uri() . '/public/js/all.js', array(), '1.0');
}
add_action( 'wp_enqueue_scripts', 'bigbocascripts' );
?>