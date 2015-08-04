<?php
function bigboca_customize_register($wp_customize)
{
/**
 * Seccion Intro
 */
$wp_customize->add_section('bigboca_intro_section', array(
    'title'       => __('Intro Settings', 'bigboca'),
    'priority'    => 10,
    'description' => 'Intro settings',
    ));
$wp_customize->add_setting('bigboca_tittle',array('default'=>'Big Boca Marketing'));

$wp_customize->add_control(
    'bigboca_tittle', array(
        'label' => 'Tittle Intro',
        'section' => 'bigboca_intro_section',
        'priority' => 10,
        ) );
/**
 * Customization Section Map
 * Settings:
 *             Map Logo
 *             bigboca_map_lat
 *             bigboca_map_long
 *             bigboca_map_zoom
 *             bigboca_map_address
 */
$wp_customize->add_section('bigboca_map_logo_section', array(
    'title'       => __('Map Logo Settings', 'bigboca'),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the map logo in the contacts page',
    ));
$wp_customize->add_setting('bigboca_map_logo');

/**
 * Default Values Map
 */
$latArgs=array('default'=>'40,825006');
$longArgs=array('default'=>'-73,946343');
$zoomArgs=array('default'=>'18');
$mapArgs=array('default'=>'473 W 145th St., Suite 4 New York, NY 10031');

$wp_customize->add_setting('bigboca_map_lat',$latArgs);
$wp_customize->add_setting('bigboca_map_long',$longArgs);
$wp_customize->add_setting('bigboca_map_zoom',$zoomArgs);
$wp_customize->add_setting('bigboca_map_address',$mapArgs);
/**
 * Contols Maps
 */
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
$wp_customize->add_control(
    'bigboca_map_address', array(
        'label' => 'Address Text',
        'section' => 'bigboca_map_logo_section',
        'priority' => 20,
        ) );




/**
 * Section Social
 */
$wp_customize->add_section('bigboca_social_section', array(
    'title'       => __('Social Settings', 'bigboca'),
    'priority'    => 30,
    'description' => 'Set Social Settings',
    ));

/**
 * Customization Section Social
 * Settings:
 *             bigboca_mail_to
 */
$wp_customize->add_setting('bigboca_facebook_link');
$wp_customize->add_setting('bigboca_twitter_link');
/**
 * Controls Social
 */
$wp_customize->add_control(
    'bigboca_facebook_link', array(
        'label' => 'Facebook Link',
        'section' => 'bigboca_social_section',
        'priority' => 10,
        ) );
$wp_customize->add_control(
    'bigboca_twitter_link', array(
        'label' => 'Twitter Link',
        'section' => 'bigboca_social_section',
        'priority' => 10,
        ) );
$mailArgs=array('default'=>'info@bigboca.com');
/**
 * Contact Us Settings
 */
$wp_customize->add_setting('bigboca_mail_to',$mailArgs);

$wp_customize->add_section('bigboca_contact_section', array(
    'title'       => __('Contact Us Settings', 'bigboca'),
    'priority'    => 30,
    'description' => 'Settings of Contacts page',
    ));
$wp_customize->add_control(
    'bigboca_mail_to', array(
        'label' => 'Contact Email',
        'section' => 'bigboca_contact_section',
        'priority' => 10,
        ) );


/**
 * Intro Settings
 */












}

add_action('customize_register', 'bigboca_customize_register');