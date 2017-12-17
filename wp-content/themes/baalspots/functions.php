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
  register_post_type( 'notable_victories', $args_notable_victories ); 
  register_post_type( 'award', $args_awards ); 
};

add_action( 'init', 'custom_post_types' );

add_shortcode( 'list-victories-carousel', 'listing_victories_carousel_shortcode' );
function listing_victories_carousel_shortcode( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type'=>'notable_victories',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'title',
    ) );
    if ( $query->have_posts() ) { ?>
      <div class="notable_victories">
        <p class="txt-red txt-xs">Notable Victories</p>
        <div class="slider js_simple_dots simple">
          <div class="frame js_frame">
            <ul class="slides js_slides">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li class="js_slide">
                  <p class="post-header"><?php echo  get_the_excerpt(); ?></p>
                  <p class="post-title"><?php the_title(); ?></p>
                  <?php the_content();?>
                </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>
          </div>
          <ul class="js_dots dots"></ul>
        </div>
      </div>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

add_shortcode( 'latest-victories-tiles', 'latest_victories_tiles_shortcode' );
function latest_victories_tiles_shortcode( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type'=>'notable_victories',
        'posts_per_page' => 3,
    ) );
    if ( $query->have_posts() ) { ?>
      <div class="tile-victories">
        <?php 
        $index = 0;
        while ( $query->have_posts() ) : $query->the_post(); $index++;?>
          <?php if($index == 1) : ?>
            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
            <div class="tile-left" style="background: url('<?php echo $backgroundImg[0]; ?>');">
              <div class="tile-left-container">
                <div class="tile-title">Notable <br> Victories</div>
              </div>
              <div class="tile-summary">
                <p class="post-header"><?php echo get_the_excerpt(); ?></p>
                <p class="post-title"><?php the_title(); ?></p>
                <div class="post-summary"<?php the_content();?></div>
              </div>
            </div>
            <div class="tile-right">
          <?php else: ?>
            <div class="tile-<?php echo ($index==2 ? 'right-top' : 'right-bottom'); ?>">
              <div class="tile-img-<?php echo ($index==2 ? 'left' : 'right'); ?>">
                <?php the_post_thumbnail(); ?>
                <?php if($index == 3): ?>
                  <div class="post-all">
                    <a>View All</a>
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/whiteRightArrow.svg">
                  </div>
                <?php endif; ?>
              </div>
              <div class="tile-summary">
                <p class="post-header"><?php echo get_the_excerpt(); ?></p>
                <p class="post-title"><?php the_title(); ?></p>
                <div class="post-summary"><?php the_content();?></div>
              </div>
            </div>
          <?php endif; ?>
        <?php endwhile;
        wp_reset_postdata(); ?>
        </div>
      </div>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

function victories_tiles_init() {
    register_sidebar( array(
      'name'          => 'Victories Tiles',
      'id'            => 'victories_tiles',
      'before_widget' => '<div>',
      'after_widget'  => '</div>',
      'before_title'  => '<span class="hidden">',
      'after_title'   => '</span>',
    ) );
}
add_action( 'widgets_init', 'victories_tiles_init' );

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
