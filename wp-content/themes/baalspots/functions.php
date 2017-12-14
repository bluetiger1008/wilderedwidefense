<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

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

  $args_notable_victories = array(
    'labels'        => $labels_notable_victories,
    'description'   => 'Notable Victories',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor' ),
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
  register_post_type( 'notable_victories', $args_notable_victories ); 
  register_post_type( 'award', $args_awards ); 
};

add_action( 'init', 'custom_post_types' );

add_shortcode( 'list-victories', 'listing_victories_shortcode' );
function listing_victories_shortcode( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type'=>'notable_victories',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'title',
    ) );
    if ( $query->have_posts() ) { ?>
        <ul class="victories-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_title(); ?>
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
