<?php
/**
 * Template Name: Thankyou Page Template
 */
?>

<div class="pg-thankyou">
	<section class="alert">
		<div class="container">
			<img src="<?= get_template_directory_uri(); ?>/dist/images/icon-thankyou.png" class="icon-status">
			<?php the_field('thankyou_content'); ?>
			<div class="goBack">
	      <a href="<?= esc_url(home_url('/')); ?>blog">Checkout our blog</a>
	      <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
	    </div>
		</div>
	</section>

	<?php get_template_part('templates/section', 'subscribe'); ?>
</div>