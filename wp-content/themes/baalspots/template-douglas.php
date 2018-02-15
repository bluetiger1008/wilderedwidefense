<?php
/**
 * Template Name: Douglas Page Template
 */
?>
<div class="pg-douglas">
	<?php if(get_field('hero_image')): ?>
    <div class="hero internal-hero" style="background-image: url('<?php the_field('hero_image') ?>');">
  <?php else: ?>
    <div class="hero internal-hero" style="background-image: url('<?= get_template_directory_uri(); ?>/dist/images/hero-placeHolder.jpg');">
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
		            	<div>
		                <h1><?php echo $title; ?></h1>
		                <p class="is-hidden-mobile"><?php echo $description; ?></p>
		                <?php if( $link ): ?>
		                    <a href="<?php echo $link; ?>" class="button btn-cta">
		                      <?php echo get_sub_field('link_text'); ?>
		                    </a>
		                <?php endif; ?>
		              </div>
		            </li>
		        <?php endwhile; ?>
		        </ul>
		        <?php endif; ?>
		    </div>
		    <?php if(get_field('attorney_image')) : ?>
	        <img src="<?php the_field('attorney_image') ?>" class="img-attorney">
	      <?php endif; ?>
	  	</div>
	  </div>
	</div>

	<div class="container">
		<div class="section-navigator">
			<div class="navigators">
				<div class="navigator">
					<a>Biography</a>
				</div>
				<div class="navigator">
					<a>Education</a>
				</div>
				<div class="navigator">
					<a>Awards</a>
				</div>
				<div class="navigator">
					<a>Victories</a>
				</div>
				<div class="navigator">
					<a>Testimonials</a>
				</div>
			</div>
		</div>
	</div>

	<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part( 'templates/section', 'content' ); ?>
	<?php endwhile; ?>

	<?php get_template_part( 'templates/section', 'subscribe' ); ?>
</div>