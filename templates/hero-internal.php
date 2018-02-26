<?php $heroBackgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<?php if($heroBackgroundImg): ?>
  <div class="hero <?php echo is_front_page() ? 'homepage-hero' : (is_page_template('templates/criminalPage.php') ? 'criminal-hero internal-hero' : 'internal-hero'); ?>" style="background-image: url('<?php echo $heroBackgroundImg[0]; ?>');">
<?php else: ?>
  <div class="hero <?php echo is_front_page() ? 'homepage-hero' : 'internal-hero'; ?>" style="background-image: url('<?= get_template_directory_uri(); ?>/dist/images/hero-placeHolder.jpg');">
<?php endif; ?>

  <div class="content">
    <div class="container">
        <div class="hero-text">
            <ul id="hero-text-slider">
                <li class="slide showing">
                  <?php the_title( '<h1 style="color: #fff">', '</h1>' ); ?>
                    <h1><?php echo $title; ?></h1>
                </li>
            </ul>
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