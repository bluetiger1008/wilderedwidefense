<header class="banner">
  <div class="container">
    <nav class="nav-primary">
      <?php
      if ( get_theme_mod( 'upload_logo' ) ) : ?>
        <a href="<?= esc_url(home_url('/')); ?>">
          <img src="<?php echo get_theme_mod( 'upload_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
        </a>
      <?php else: ?>
        <a href="<?= esc_url(home_url('/')); ?>" class="site-title"><?php bloginfo( 'name' ); ?></h1>
      <?php endif; ?>

      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
