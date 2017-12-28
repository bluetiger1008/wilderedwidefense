<!-- fixed navbar -->
<header class="header--fixed">
  <div class="forebar">
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="<?= esc_url(home_url('/')); ?>">
          <?php
          if ( get_theme_mod( 'upload_logo' ) ) : ?>
            <img src="<?php echo get_theme_mod( 'upload_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
          <?php else: ?>
            <?php bloginfo( 'name' ); ?>
          <?php endif; ?>
        </a>
      </div>
      <div class="navbar-menu">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu-items']);
        endif;
        ?>
      </div>
    </nav>
  </div>
  <div class="backbar">
    <button class="button navbar-burger" id="showRight">
      <span></span>
      <span></span>
    </button>
    <p class="phone_number">CALL 24/7 <a href="tel:<?php echo get_theme_mod('phone_number','(214) 741-4000'); ?>"><?php echo get_theme_mod('phone_number', '(214) 741-4000'); ?></a></p>
  </div>
</header>
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
  <a class="btn-close" id="closeMenu"><img src="<?= get_template_directory_uri(); ?>/dist/images/close.png"></a>
  <?php
  if (has_nav_menu('primary_navigation')) :
    wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu-items']);
  endif;
  ?>
  <div class="search-box">
    <div class="control">
      <input type="text" placeholder="This search box  is not to be me">
      <span class="btn-cancel"><img src="<?= get_template_directory_uri(); ?>/dist/images/cancel.png"></span>
    </div>
    <span class="btn-search"><img src="<?= get_template_directory_uri(); ?>/dist/images/search.png"></span>
  </div>
</nav>

<!-- hero -->
<div class="hero" style="background-image: url('<?php the_field('hero_image') ?>');">
  <div class="content">
    <div class="container">
        <div class="hero-text">
            <?php if( have_rows('hero_slider') ): ?>
            <ul id="hero-text-slider">
            <?php while( have_rows('hero_slider') ): the_row(); 
                // vars
                $title = get_sub_field('slider_title');
                $description = get_sub_field('slider_description');
                $link = get_sub_field('get_start_link');
                ?>
                <li class="slide">
                    <h1><?php echo $title; ?></h1>
                    <p class="is-hidden-mobile"><?php echo $description; ?></p>
                    <?php if( $link ): ?>
                        <a href="<?php echo $link; ?>" class="button btn-cta">
                            Get Started Now
                        </a>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
    <?php if (is_front_page()) : ?>
      <img src="<?php the_field('attorney_image') ?>" class="img-attorney">
      <div class="awards-backbar">  
      </div>
      <div class="awards-forebar">
          <?php 
          // the query
          $wpb_all_query = new WP_Query(array('post_type'=>'award', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
          <?php if ( $wpb_all_query->have_posts() ) : ?>
          <div class="slider js_multislides">
              <div class="frame js_frame">
                  <ul class="slides js_slides">
                      <!-- the loop -->
                      <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                          <li class="js_slide"><?php the_post_thumbnail(); ?></li>
                      <?php endwhile; ?>
                      <!-- end of the loop -->     
                  </ul>
              </div>
              <span class="js_prev prev">
                  <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowLeft.svg">
              </span>
              <span class="js_next next">
                  <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
              </span>
          </div>
          <?php wp_reset_postdata(); ?>       
          <?php else : ?>
              <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</div>