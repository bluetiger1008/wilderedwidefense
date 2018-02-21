<?php
/**
 * Template Name: Thankyou Page Template
 */
?>

<div class="pg-thankyou">
	<section class="alert">
		<div class="container">
			<img src="<?= get_template_directory_uri(); ?>/dist/images/icon-thankyou.png" class="icon-status">
			<p class="sm">Message Sent!</p>
			<h1>Thank you!</h1>
			<p class="alert">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<div class="goBack">
	      <a href="<?= esc_url(home_url('/')); ?>blog">Checkout our blog</a>
	      <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
	    </div>
		</div>
	</section>

	<?php get_template_part('templates/section', 'subscribe'); ?>
</div>