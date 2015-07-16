<?php
// Register Custom Post Type
function capabilities_post_type() {

    $labels = array(
        'name'                => _x( 'Capabilities', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Capability', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Capabilities', 'text_domain' ),
        'name_admin_bar'      => __( 'Us Type', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Capability:', 'text_domain' ),
        'all_items'           => __( 'All Capability', 'text_domain' ),
        'add_new_item'        => __( 'Add Capability', 'text_domain' ),
        'add_new'             => __( 'Add New Capability', 'text_domain' ),
        'new_item'            => __( 'New Capability', 'text_domain' ),
        'edit_item'           => __( 'Edit Capability', 'text_domain' ),
        'update_item'         => __( 'Update Capability', 'text_domain' ),
        'view_item'           => __( 'View Capability', 'text_domain' ),
        'search_items'        => __( 'Search Capability', 'text_domain' ),
        'not_found'           => __( 'Capability Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Capability Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'capability', 'text_domain' ),
        'description'         => __( 'Capabilities Of The Company Big Boca', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'page-attributes', ),
        'taxonomies'          => array( ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'capabilities', $args );

}

// Hook into the 'init' action
add_action( 'init', 'capabilities_post_type', 0 );