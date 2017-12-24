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
</nav>
