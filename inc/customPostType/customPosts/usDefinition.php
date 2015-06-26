<?php
// Register Custom Post Type
function custom_post_type() {

    $labels = array(
        'name'                => _x( 'Us Definitions', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Us Definition', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Us Definition', 'text_domain' ),
        'name_admin_bar'      => __( 'Us Type', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Us Definition:', 'text_domain' ),
        'all_items'           => __( 'All Us Definition', 'text_domain' ),
        'add_new_item'        => __( 'Add Us Definition', 'text_domain' ),
        'add_new'             => __( 'Add New Us Definition', 'text_domain' ),
        'new_item'            => __( 'New Us Definition', 'text_domain' ),
        'edit_item'           => __( 'Edit Us Definition', 'text_domain' ),
        'update_item'         => __( 'Update Us Definition', 'text_domain' ),
        'view_item'           => __( 'View Us Definition', 'text_domain' ),
        'search_items'        => __( 'Search Us Definition', 'text_domain' ),
        'not_found'           => __( 'Us Definition Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Us Definition Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'us', 'text_domain' ),
        'description'         => __( 'Us Of The Company Big Boca', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', ),
        'taxonomies'          => array( ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-users',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'us', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );