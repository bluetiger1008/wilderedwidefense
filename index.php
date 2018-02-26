<div class="<?php echo is_home() || is_category()? 'pg-blog' : '' ?>">
	<div class="container">
		<?php if (!have_posts()) : ?>
		  <div class="alert alert-warning">
		    <?php _e('Sorry, no results were found.', 'sage'); ?>
		  </div>
		  <?php get_search_form(); ?>
		<?php endif; ?>

		<?php if(!is_category()) {
			get_template_part('templates/section', 'pinnedArticle');
		}?>

		<span class="yellow-border-bar"></span>

		<div class="columns">
			<?php while (have_posts()) : the_post(); ?>
			  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
			<?php endwhile; ?>
		</div>

		<?php the_posts_navigation(); ?>
	</div>

	<?php get_template_part('templates/section', 'subscribe'); ?>
</div>