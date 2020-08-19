<?php

/* 
* Proposal for administrators 
*/

function master_slide_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Master Slides', 'Post Type General Name', 'cloud_proposal' ),
        'singular_name'       => _x( 'Master Slide', 'Post Type Singular Name', 'cloud_proposal' ),
        'menu_name'           => __( 'Master Slides', 'cloud_proposal' ),
        'parent_item_colon'   => __( 'Parent Slide', 'cloud_proposal' ),
        'all_items'           => __( 'All Master Slides', 'cloud_proposal' ),
        'view_item'           => __( 'View Slide', 'cloud_proposal' ),
        'add_new_item'        => __( 'Add New Slide', 'cloud_proposal' ),
        'add_new'             => __( 'Add New', 'cloud_proposal' ),
        'edit_item'           => __( 'Edit Slide', 'cloud_proposal' ),
        'update_item'         => __( 'Update Slide', 'cloud_proposal' ),
        'search_items'        => __( 'Search Slide', 'cloud_proposal' ),
        'not_found'           => __( 'Not Found', 'cloud_proposal' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cloud_proposal' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'master slides', 'cloud_proposal' ),
        'description'         => __( 'List of all master slides', 'cloud_proposal' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => false,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'master_slides', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'master_slide_post_type', 0 );



/* 
* Proposal for customers
*/


function customer_proposal_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Proposals', 'Post Type General Name', 'cloud_proposal' ),
        'singular_name'       => _x( 'Proposal', 'Post Type Singular Name', 'cloud_proposal' ),
        'menu_name'           => __( 'Proposals', 'cloud_proposal' ),
        'parent_item_colon'   => __( 'Parent Proposal', 'cloud_proposal' ),
        'all_items'           => __( 'All Proposals', 'cloud_proposal' ),
        'view_item'           => __( 'View Proposal', 'cloud_proposal' ),
        'add_new_item'        => __( 'Add New Proposal', 'cloud_proposal' ),
        'add_new'             => __( 'Add New', 'cloud_proposal' ),
        'edit_item'           => __( 'Edit Proposal', 'cloud_proposal' ),
        'update_item'         => __( 'Update Proposal', 'cloud_proposal' ),
        'search_items'        => __( 'Search Proposal', 'cloud_proposal' ),
        'not_found'           => __( 'Not Found', 'cloud_proposal' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'cloud_proposal' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'proposals', 'cloud_proposal' ),
        'description'         => __( 'List of all proposals', 'cloud_proposal' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => false,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'proposals', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'customer_proposal_post_type', 0 );


//Disable Gutenberg / block editor for proposals post types

add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'proposals') return false;
    return $current_status;
}
