<!-- fixed navbar -->
<header class="header--fixed <?php echo is_home() || is_category() || (get_post_type() === 'post') ? 'black': null; ?>">
  <div class="forebar">
    <div class="forebar-bg">
    </div>
    <div class="navbar-wrapper">
      <div class="navbar-back">
      </div>
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
          // if (has_nav_menu('primary_navigation')) :
          //   wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'menu-items']);
          // endif;
          clean_custom_menu('primary_navigation');
          ?>
          <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
            <div>
              <input type="text" value="" name="s" id="input_search" class="input-search" placeholder="Search" />
              <span id="search_submit" class="search-submit">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/search.png" class="icon-search">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/cancel.png" class="icon-cancel">
              </span>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
  <div class="backbar">
    <div class="backbar-bg">
      <button class="button navbar-burger" id="showRight" data-target="primaryNavigation">
        <span></span>
        <span></span>
      </button>
    </div>
    <div class="backbar-wrapper <?php echo is_home() || is_category() ?'black': null; ?>">
      <div class="backbar-back">
        <p class="phone_number"><span>CALL 24/7</span> <a href="tel:<?php echo get_theme_mod('phone_number','(214) 741-4000'); ?>"><?php echo get_theme_mod('phone_number', '(214) 741-4000'); ?></a></p>
      </div>
    </div>
  </div>
</header>
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
  <a class="btn-close" id="closeMenu"><img src="<?= get_template_directory_uri(); ?>/dist/images/close.svg"></a>
  <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(['theme_location' => 'primary_navigation', 'depth' => '2', 'menu_class' => 'mobile-menu-items', 'container'=> false]);
    endif;
  ?>
  <div id="gradient">
  </div>
  <div class="cbp-spmenu-footer">
    <div class="social-share">
      <a href="https://www.instagram.com/thewilderfirm/" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/insta-black.png"></a>
      <a href="https://twitter.com/TheWilderFirm" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/twitter-black.png"></a>
      <a href="https://www.facebook.com/pages/Wilder-Defense/485379268282490?ref" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/facebook-black.png"></a>
      <a href="https://www.linkedin.com/pub/douglas-wilder/b7/3b1/b97" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/linkedin-black.png"></a>
    </div>
    <form role="search" method="get" id="mobile_searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
      <div>
        <input type="text" value="" name="s" id="mobile_input_search" class="input-search" placeholder="Search" />
        <span id="mobile_search_submit" class="search-submit">
          <img src="<?= get_template_directory_uri(); ?>/dist/images/search.png" class="icon-search">
          <img src="<?= get_template_directory_uri(); ?>/dist/images/cancel.png" class="icon-cancel">
        </span>
      </div>
    </form>
  </div>
</nav>

<!-- hero -->
<?php if(!is_home() && !is_single() && !is_404() && !is_category() && !is_search() && !is_page_template('search.php') && !is_page_template('template-theFirm.php') && !is_page_template('template-douglas.php') && !is_page_template('template-thankyou.php') && !is_page_template('template-contactus.php') && !is_page_template('template-privacy.php')): ?>
  <?php $heroBackgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
  <?php if($heroBackgroundImg): ?>
    <div class="hero <?php echo is_front_page() ? 'homepage-hero' : (is_page_template('templates/criminalPage.php') ? 'criminal-hero internal-hero' : 'internal-hero'); ?>" style="background-image: url('<?php echo $heroBackgroundImg[0]; ?>');">
  <?php else: ?>
    <div class="hero <?php echo is_front_page() ? 'homepage-hero' : 'internal-hero'; ?>" style="background-image: url('<?= get_template_directory_uri(); ?>/dist/images/hero-placeHolder.jpg');">
  <?php endif; ?>

    <div class="content">
      <div class="container">
          <div class="hero-text">
              <?php if( have_rows('hero_slider') ): ?>
              <ul id="hero-text-slider">
              <?php $index = 0; while( have_rows('hero_slider') ): the_row(); 
                  // vars
                  $title = get_sub_field('slider_title');
                  $description = get_sub_field('slider_description');
                  $link = get_sub_field('link_url');
                  $index++;
                  ?>
                  <li class="slide <?php echo ($index==1 ? 'showing' : null); ?>">
                      <h1><?php echo $title; ?></h1>
                      <p class="is-hidden-mobile"><?php echo $description; ?></p>
                      <?php if( $link ): ?>
                          <a href="<?php echo $link; ?>" class="button btn-cta">
                            <?php echo get_sub_field('link_text'); ?>
                          </a>
                      <?php endif; ?>
                  </li>
              <?php endwhile; ?>
              </ul>
              <?php endif; ?>
          </div>
      </div>
      <?php if (is_front_page() || is_page_template( 'templates/criminalPage.php' ) ) : ?>
        <?php if(get_field('attorney_image')) : ?>
          <img src="<?php the_field('attorney_image') ?>" class="img-attorney">
        <?php endif; ?>
        <div class="awards-container">
          <div class="awards-backbar">  
          </div>
          <div class="awards-forebar">
          </div>
          <?php get_template_part('templates/section', 'awardsSlider'); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>