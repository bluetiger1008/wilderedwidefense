<?php 
/*
Template Name: Criminal Page
Template Post Type: page
*/
?>
<div class="criminal">
	<?php get_template_part('templates/section', 'services'); ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('templates/section', 'content'); ?>
	<?php endwhile; ?>
	<?php get_template_part('templates/section', 'subscribe'); ?>
</div>