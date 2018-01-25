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
  $labels_testimonial = array(
    'name'               => _x( '', 'post type general name' ),
    'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Testimonial' ),
    'add_new_item'       => __( 'Add New Testimonial' ),
    'edit_item'          => __( 'Edit Testimonial' ),
    'new_item'           => __( 'New Testimonial' ),
    'all_items'          => __( 'All Testimonials' ),
    'view_item'          => __( 'View Testimonial' ),
    'search_items'       => __( 'Search Testimonials' ),
    'not_found'          => __( 'No Testimonials found' ),
    'not_found_in_trash' => __( 'No Testimonials found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Testimonials'
  );
  $labels_dwi = array(
    'name'               => _x( '', 'post type general name' ),
    'singular_name'      => _x( 'DWI', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'DWI' ),
    'add_new_item'       => __( 'Add New DWI' ),
    'edit_item'          => __( 'Edit DWI' ),
    'new_item'           => __( 'New DWI' ),
    'all_items'          => __( 'All DWI' ),
    'view_item'          => __( 'View DWI' ),
    'search_items'       => __( 'Search DWI' ),
    'not_found'          => __( 'No DWI found' ),
    'not_found_in_trash' => __( 'No DWI found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'DWI'
  );
  $labels_criminal_defense = array(
    'name'               => _x( '', 'post type general name' ),
    'singular_name'      => _x( 'Criminal Defense', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Criminal Defense' ),
    'add_new_item'       => __( 'Add New Criminal Defense' ),
    'edit_item'          => __( 'Edit Criminal Defense' ),
    'new_item'           => __( 'New Criminal Defense' ),
    'all_items'          => __( 'All Criminal Defense' ),
    'view_item'          => __( 'View Criminal Defense' ),
    'search_items'       => __( 'Search Criminal Defense' ),
    'not_found'          => __( 'No Criminal Defense found' ),
    'not_found_in_trash' => __( 'No Criminal Defense found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Criminal Defense'
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
    'menu_position' => 5,
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
  $args_testimonials = array(
    'labels'        => $labels_testimonial,
    'description'   => 'Testimonial',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor'),
    'has_archive'   => true,
  );
  $args_dwi = array(
    'labels'        => $labels_dwi,
    'description'   => 'DWI',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor'),
    'has_archive'   => true,
  );
  $args_criminal_defense = array(
    'labels'        => $labels_criminal_defense,
    'description'   => 'Criminal Defense',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor'),
    'has_archive'   => true,
  );

  register_post_type( 'notable_victories', $args_notable_victories ); 
  register_post_type( 'award', $args_awards ); 
  register_post_type( 'award_winning_team', $args_award_winning_team);
  register_post_type( 'testimonial', $args_testimonials);
  register_post_type( 'dwi', $args_dwi);
  register_post_type( 'criminal_defense', $args_criminal_defense);
};

function award_winning_taxonomies() {
    register_taxonomy(
        'role',
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