<?php

// Register Custom Post Type
function rgrjnr_tutorials_post_type()
{

    $labels = array(
        'name'                  => _x('Tutorials', 'Post Type General Name', 'rgrjnr'),
        'singular_name'         => _x('Tutorial', 'Post Type Singular Name', 'rgrjnr'),
        'menu_name'             => __('Tutorials', 'rgrjnr'),
        'name_admin_bar'        => __('Tutorials', 'rgrjnr'),
        'archives'              => __('Tutorial Archives', 'rgrjnr'),
        'attributes'            => __('Tutorial Attributes', 'rgrjnr'),
        'parent_item_colon'     => __('Parent Tutorial:', 'rgrjnr'),
        'all_items'             => __('All Tutorials', 'rgrjnr'),
        'add_new_item'          => __('Add New Tutorial', 'rgrjnr'),
        'add_new'               => __('Add New', 'rgrjnr'),
        'new_item'              => __('New Tutorial', 'rgrjnr'),
        'edit_item'             => __('Edit Tutorial', 'rgrjnr'),
        'update_item'           => __('Update Tutorial', 'rgrjnr'),
        'view_item'             => __('View Tutorial', 'rgrjnr'),
        'view_items'            => __('View Tutorials', 'rgrjnr'),
        'search_items'          => __('Search', 'rgrjnr'),
        'not_found'             => __('Not found', 'rgrjnr'),
        'not_found_in_trash'    => __('Not found in Trash', 'rgrjnr'),
        'featured_image'        => __('Featured Image', 'rgrjnr'),
        'set_featured_image'    => __('Set featured image', 'rgrjnr'),
        'remove_featured_image' => __('Remove featured image', 'rgrjnr'),
        'use_featured_image'    => __('Use as featured image', 'rgrjnr'),
        'insert_into_item'      => __('Insert into item', 'rgrjnr'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'rgrjnr'),
        'items_list'            => __('Tutorials list', 'rgrjnr'),
        'items_list_navigation' => __('Tutorials list navigation', 'rgrjnr'),
        'filter_items_list'     => __('Filter items list', 'rgrjnr'),
    );

    $args = array(
        'label'                 => __('tutorial', 'rgrjnr'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor'),
        'menu_icon'   => 'dashicons-lightbulb',
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 0,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'page',
        'show_in_rest'          => false,
    );

    register_post_type('tutorial', $args);
}

add_action('init', 'rgrjnr_tutorials_post_type', 0);