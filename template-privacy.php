<?php
/*
Template Name: Privacy Page Template
Template Post Type: page
 */
?>

<div class="pg-privacy">
	<div class="container">
		<section class="privacy">
			<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</section>
	</div>
</div>