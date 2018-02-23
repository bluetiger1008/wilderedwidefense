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