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
  'lib/customizer.php', // Theme customizer
  'lib/postTypes.php',  //Custom Post Types
];

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
        <p class="txt-red txt-xs is-uppercase">Notable Victories</p>
        <div class="slider js_simple_dots simple">
          <div class="frame js_frame">
            <ul class="slides js_slides">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li class="js_slide">
                  <p class="post-header">NOT GUILTY</p>
                  <p class="post-title"><?php the_title(); ?></p>
                  <p><?php echo wp_trim_words( get_the_content(), 30, $more = '… ' ); ?></p>
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

function latest_victories_tiles_shortcode( $atts ) {
    ob_start();
    $query = new WP_Query( array(
        'post_type'=>'notable_victories',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order'   => 'ASC',
    ) );
    if ( $query->have_posts() ) { ?>
      <div data-aos="fade-up" data-aos-delay="300" data-aos-once="true" class="tile-victories">
        <?php 
        $index = 0;
        while ( $query->have_posts() ) : $query->the_post(); $index++;?>
          <?php if($index == 1) : ?>
            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
            <div class="tile-left" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
              <div class="tile-left-container" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
                <div class="tile-title">Notable <br> Victories</div>
              </div>
              <div class="tile-summary">
                <p class="post-header">NOT GUILTY</p>
                <p class="post-title"><?php the_title(); ?></p>
                <div class="post-summary"><?php echo wp_trim_words( get_the_content(), 15, $more = '… ' ); ?></div>
              </div>
            </div>
            <div class="tile-right">
          <?php else: ?>
            <?php $bgImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            <div class="tile-<?php echo ($index==2 ? 'right-top' : 'right-bottom'); ?>">
              <div class="tile-img-<?php echo ($index==2 ? 'left' : 'right'); ?>" style="background-image: url('<?php echo $bgImg[0]; ?>');">
                <?php the_post_thumbnail(); ?>
                <?php if($index == 3): ?>
                  <div class="post-all">
                    <a>View All</a>
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/whiteRightArrow.svg">
                  </div>
                <?php endif; ?>
              </div>
              <div class="tile-summary">
                <p class="post-header">NOT GUILTY</p>
                <p class="post-title"><?php the_title(); ?></p>
                <div class="post-summary"><?php echo wp_trim_words( get_the_content(), 15, $more = '… ' ); ?></div>
                <?php if($index == 3): ?>
                  <div class="anchor-view-all is-hidden-desktop is-hidden-tablet">
                      <a>View All</a>
                      <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
                  </div>
                <?php endif; ?>
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

function listing_award_team( $atts ) {
  ob_start();
  $query = new WP_Query( array(
      'post_type'=>'award_winning_team',
      'posts_per_page' => 3,
  ) );
  if ( $query->have_posts() ) { ?>
    <div class="award-team">
      <div class="columns is-hidden-mobile">
        <?php 
        $index = 0;
        while ( $query->have_posts() ) : $query->the_post(); $index++;?>
          <div class="column is-one-third">
            <div class="member-photo <?php echo ($index==2 ? 'middle': ''); ?>">
              <div>
                <?php the_post_thumbnail('full'); ?>
              </div>
            </div>
            <div class="member-role">
              <?php
               $terms = get_the_terms( $post->ID , 'role' );
               // Loop over each item since it's an array
               if ( $terms != null ){
               foreach( $terms as $term ) {
                // Print the name method from $term which is an OBJECT
                print $term->name ;
               }
               // Get rid of the other data stored in the object, since it's not needed
               unset($term);
               }
              ?>
              
            </div>
            <div class="member-name"><?php the_title(); ?></div>
            <div class="about-member has-text-centered"><?php echo wp_trim_words( get_the_content(), 25, $more = '… ' ); ?></div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <div class="slider js_slider js_award_team_slider is-hidden-desktop is-hidden-tablet">
          <div class="frame js_frame">
              <ul class="slides js_slides">
                <?php 
                $index = 0;
                while ( $query->have_posts() ) : $query->the_post(); $index++;?>
                  <li class="js_slide <?php echo $index == 2 ? 'middle' : '' ?>">
                    <div class="member-photo">
                      <div>
                        <?php the_post_thumbnail('full'); ?>
                      </div>
                    </div>
                    <div class="member-role">
                      <?php
                       $terms = get_the_terms( $post->ID , 'role' );
                       // Loop over each item since it's an array
                       if ( $terms != null ){
                       foreach( $terms as $term ) {
                        // Print the name method from $term which is an OBJECT
                        print $term->name ;
                       }
                       // Get rid of the other data stored in the object, since it's not needed
                       unset($term);
                       }
                      ?>
                    </div>
                    <div class="member-name"><h1><?php the_title(); ?></h1></div>
                    <div class="about-member has-text-centered"><p><?php echo wp_trim_words( get_the_content(), 25, $more = '… ' ); ?></p></div>
                  </li>
                <?php endwhile; wp_reset_postdata(); ?>
              </ul>
          </div>
          <span class="js_prev prev">
              <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowLeft.svg">
          </span>
          <span class="js_next next">
              <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
          </span>
      </div>
      <div class="anchor-view-all has-text-centered">
          <a>Read More</a>
          <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
      </div>
    </div>
  <?php $myvariable = ob_get_clean();
  return $myvariable;
  }
}

function listing_testimonials( $atts ) {
  ob_start();
  $query = new WP_Query( array(
      'post_type'=>'testimonial',
      'posts_per_page' => -1,
  ) );
  if ( $query->have_posts() ) { ?>
    <div class="wrapper">
      <div class="slider js_testimonial_slider simple">
        <div class="frame js_frame">
          <ul class="slides js_slides">
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <li class="js_slide">
                <p><?php echo wp_trim_words( get_the_content(), 25, $more = '… ' ); ?></p>
              </li>
              <?php endwhile;
              wp_reset_postdata(); ?>
          </ul>
        </div>
        <div class="slider_nav">
          <span class="js_prev prev">
            <img src="<?= get_template_directory_uri(); ?>/dist/images/iconArrowLeft.svg">
          </span>
          <span class="js_next next">
            <img src="<?= get_template_directory_uri(); ?>/dist/images/iconArrowRight.svg">
          </span>
        </div>
      </div>
      <div class="testimonial-all">
        <a class="">View All</a>
        <img src="<?= get_template_directory_uri(); ?>/dist/images/whiteRightArrow.svg">
      </div>
    </div>
  <?php $myvariable = ob_get_clean();
  return $myvariable;
  }
}

function listing_articles( $atts ) {
  ob_start();
  $query = new WP_Query( array(
      'post_type'=>'post',
      'posts_per_page' => 3,
  ) );
  if ( $query->have_posts() ) { ?>
      <div class="columns">
        <?php 
        $index = 0;
        while ( $query->have_posts() ) : $query->the_post(); $index++;?>
          <div class="column is-one-third">
            <article>
              <div class="article-photo">
                <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                <figure class="image is-3by2" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
                </figure>
              </div>
              <div class="article-summary">
                <div class="article-content">
                  <p class="categories">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                    }
                    ?>
                  </p>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  <div class="article-description"><?php echo wp_trim_words( get_the_content(), 15, $more = '… ' ); ?></div>
                </div>
              </div>
            </article>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
  <?php $myvariable = ob_get_clean();
  return $myvariable;
  }
}

function black_comment($atts=[], $content=null, $tag='') {
  ob_start();
  if (!is_null($content)) { ?>
    <div class="black-comment">
      <img src="<?= get_template_directory_uri(); ?>/dist/images/icon-quote-white.png" class="icon-quote">
      <p><?php echo do_shortcode($content); ?></p>
      <a href="" class="button btn-cta">View our Victories</a>
      <img src="<?= get_template_directory_uri(); ?>/dist/images/man.png" class="img-doug">
    </div>
  <?php $myvariable = ob_get_clean();
  return $myvariable;
  }
}

function clean_custom_menu( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
         
        $menu_list  = '<div class="navbar-start">' ."\n";       
         
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
          
        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {
                 
                $parent = $menu_item->ID;
                 
                $menu_array = array();
                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<a href="' . $submenu->url . '" class="navbar-item">' . $submenu->title . '</a>' ."\n";
                    }
                }
                if( $bool == true && count( $menu_array ) > 0 ) {
                     
                    $menu_list .= '<div class="navbar-item has-dropdown is-hoverable">' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '" class="navbar-link">' . $menu_item->title . ' </a>' ."\n";
                     
                    $menu_list .= '<div class="navbar-dropdown">' ."\n";
                    $menu_list .= '<div class="menu-content">' ."\n";
                    $menu_list .= '<div class="menu-items">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</div>' ."\n";
                    $menu_list .= '<img src="' .get_template_directory_uri(). '/dist/images/key.png" class="menu-img">' ."\n";
                    $menu_list .= '</div>' ."\n";
                    $menu_list .= '<div class="bar-act-now">' ."\n";
                    $menu_list .= '<p>You Have 15 Days to Save Your Driver’s License</p>' ."\n";
                    $menu_list .= '<div class="btn-act"><a>Act Now</a>' ."\n";
                    $menu_list .= '<img src="' .get_template_directory_uri(). '/dist/images/arrowRight.svg"></div>' ."\n";
                    $menu_list .= '</div>' ."\n";
                    $menu_list .= '</div>' ."\n";
                    $menu_list .= '</div>' ."\n";
                } else {
                    $menu_list .= '<a href="' . $menu_item->url . '" class="navbar-item">' . $menu_item->title . '</a>' ."\n";
                }
                 
            }
            
            // end <li>
            
        }
          
        $menu_list .= '</div>' ."\n";  
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
     
    echo $menu_list;
}

add_shortcode( 'latest-victories-tiles', 'latest_victories_tiles_shortcode' );
add_shortcode( 'list-victories-carousel', 'listing_victories_carousel_shortcode' );
add_shortcode( 'list-award-team', 'listing_award_team' );
add_shortcode( 'list-testimonials', 'listing_testimonials');
add_shortcode( 'list-articles', 'listing_articles');
add_shortcode( 'black-comment', 'black_comment');

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
