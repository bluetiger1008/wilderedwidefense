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

function listing_award_team( $atts ) {
  ob_start();
  $query = new WP_Query( array(
      'post_type'=>'award_winning_team',
      'posts_per_page' => 3,
  ) );
  if ( $query->have_posts() ) { ?>
    <div class="award-team">
      <div class="columns">
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
              $terms = get_the_terms( $post->ID , array( 'award_winning_team_member_role') );
              foreach ( $terms as $term ) {
                echo $term->name;
              }
              ?>
            </div>
            <div class="member-name"><?php the_title(); ?></div>
            <div class="about-member has-text-centered"><?php the_content(); ?></div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <div class="has-text-centered">
        <a class="read-more">Read More</a>
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
            <div class="article">
              <div class="article-photo" style="background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>')">
              </div>
              <div class="article-summary">
                <div class="category">
                  <?php
                  $terms = get_the_terms( $post->ID , array( 'award_winning_team_member_role') );
                  foreach ( $terms as $term ) {
                    echo $term->name;
                  }
                  ?>
                </div>
                <div class="article-title"><?php the_title(); ?></div>
                <div class="article-description"><?php echo wp_trim_words( get_the_content(), 15, $more = '… ' ); ?></div>
              </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
  <?php $myvariable = ob_get_clean();
  return $myvariable;
  }
}

add_shortcode( 'latest-victories-tiles', 'latest_victories_tiles_shortcode' );
add_shortcode( 'list-victories-carousel', 'listing_victories_carousel_shortcode' );
add_shortcode( 'list-award-team', 'listing_award_team' );
add_shortcode( 'list-testimonials', 'listing_testimonials');
add_shortcode( 'list-articles', 'listing_articles');

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
