<?php
function bigboca_customize_register($wp_customize)
{
    $wp_customize->add_section('bigboca_map_logo_section', array(
        'title'       => __('Map Logo Settings', 'bigboca'),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the map logo in the contacts page',
    ));
    $wp_customize->add_setting('bigboca_map_logo');
    $wp_customize->add_setting('bigboca_map_lat');
    $wp_customize->add_setting('bigboca_map_long');
    $wp_customize->add_setting('bigboca_map_zoom');

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
                'label'      => __( 'Upload a logo', 'theme_name' ),
                'section'    => 'bigboca_map_logo_section',
                'settings'   => 'bigboca_map_logo',
            )
        )
    );
    $wp_customize->add_control(
        'bigboca_map_lat', array(
        'label' => 'Latitude',
        'section' => 'bigboca_map_logo_section',
        'type' => 'number',
        'priority' => 10,
    ) );
    $wp_customize->add_control(
        'bigboca_map_long', array(
        'label' => 'Longitude',
        'section' => 'bigboca_map_logo_section',
        'type' => 'number',
        'priority' => 10,
    ) );
    $wp_customize->add_control(
        'bigboca_map_zoom', array(
        'label' => 'Map Zoom',
        'section' => 'bigboca_map_logo_section',
        'type' => 'number',
        'priority' => 10,
    ) );



}

add_action('customize_register', 'bigboca_customize_register');