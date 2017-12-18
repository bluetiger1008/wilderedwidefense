<?php

/** 
 * Add Custom Post Types
 */
function custom_post_types() {
  $labels_awards = array(
    'name'               => _x( '', 'post type general name' ),
    'singular_name'      => _x( 'Logo', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Award' ),
    'add_new_item'       => __( 'Add New Award' ),
    'edit_item'          => __( 'Edit Award' ),
    'new_item'           => __( 'New Award' ),
    'all_items'          => __( 'All Awards' ),
    'view_item'          => __( 'View Award' ),
    'search_items'       => __( 'Search Awards' ),
    'not_found'          => __( 'No Awards found' ),
    'not_found_in_trash' => __( 'No Awards found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Awards'
  );
  $labels_notable_victories = array(
    'name'               => _x( '', 'post type general name' ),
    'singular_name'      => _x( 'Victory', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Victory' ),
    'add_new_item'       => __( 'Add New Victory' ),
    'edit_item'          => __( 'Edit Victory' ),
    'new_item'           => __( 'New Victory' ),
    'all_items'          => __( 'All Victories' ),
    'view_item'          => __( 'View Victory' ),
    'search_items'       => __( 'Search Victories' ),
    'not_found'          => __( 'No Victories found' ),
    'not_found_in_trash' => __( 'No Victories found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Notable Victories'
  );
  $labels_award_winning_team = array(
    'name'               => _x( '', 'post type general name' ),
    'singular_name'      => _x( 'Member', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Member' ),
    'add_new_item'       => __( 'Add New Member' ),
    'edit_item'          => __( 'Edit Member' ),
    'new_item'           => __( 'New Member' ),
    'all_items'          => __( 'All Members' ),
    'view_item'          => __( 'View Member' ),
    'search_items'       => __( 'Search Members' ),
    'not_found'          => __( 'No Members found' ),
    'not_found_in_trash' => __( 'No Members found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Award Winning Team'
  );

  $args_notable_victories = array(
    'labels'        => $labels_notable_victories,
    'description'   => 'Notable Victories',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
    'has_archive'   => true,
  );
  $args_awards = array(
    'labels'        => $labels_awards,
    'description'   => 'Awards',
    'public'        => true,
    'menu_position' => 4,
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => true,
  );
  $args_award_winning_team = array(
    'labels'        => $labels_award_winning_team,
    'description'   => 'Award Winning Team',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail'),
    'has_archive'   => true,
  );

  register_post_type( 'notable_victories', $args_notable_victories ); 
  register_post_type( 'award', $args_awards ); 
  register_post_type( 'award_winning_team', $args_award_winning_team);
};

function award_winning_taxonomies() {
    register_taxonomy(
        'award_winning_team_member_role',
        'award_winning_team',
        array(
            'labels' => array(
                'name' => 'Role',
                'add_new_item' => 'Add New Role',
                'new_item_name' => "New Member Role"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
};

add_action( 'init', 'award_winning_taxonomies', 0 );
add_action( 'init', 'custom_post_types' );