<?php
function bigbocascripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.2');
    wp_enqueue_style('estiloBB', get_template_directory_uri() . '/css/style.css', array(), '3.2');

    wp_enqueue_script('TweenMax',get_template_directory_uri().'/js/vendor/greensock/TweenMax.min.js',array(),'1.15.1');
    wp_enqueue_script('ScrollToPlugin',get_template_directory_uri().'/js/vendor/greensock/plugins/ScrollToPlugin.min.js',array(),'1.7.4');
    wp_enqueue_script('jquery',get_template_directory_uri().'/js/vendor/jquery/jquery.js',array(),'1.11.1');
    wp_enqueue_script('animateScroll',get_template_directory_uri().'/js/vendor/animateScroll/animateScroll.js',array('jquery'),'1.11.1');
    wp_enqueue_script('modernizr',get_template_directory_uri().'/js/vendor/modernizr/Modernizr.custom.min.js',array(),'1.11.1');
    wp_enqueue_script('iscroll-probe',get_template_directory_uri().'/js/vendor/iscroll-probe/iscroll-probe.js',array(),'1.11.1');
    wp_enqueue_script('ScrollMagic',get_template_directory_uri().'/js/vendor/scrollmagic/ScrollMagic.min.js',array(),'1.11.1');
    wp_enqueue_script('animation',get_template_directory_uri().'/js/vendor/scrollmagic/plugins/animation.gsap.min.js',array('jquery'),'1.11.1');
    wp_enqueue_script('debug-addIndicators',get_template_directory_uri().'/js/vendor/scrollmagic/plugins/debug.addIndicators.min.js',array(),'1.11.1');
    wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/vendor/bootstrap/bootstrap.min.js',array('jquery'),'1.11.1');
    wp_enqueue_script('main',get_template_directory_uri().'/js/main.js',array('bootstrap'),'1');
}
add_action( 'wp_enqueue_scripts', 'bigbocascripts' );
?>