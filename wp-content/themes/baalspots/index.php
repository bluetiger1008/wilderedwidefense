<div class="<?php echo is_home()? 'pg-blog' : '' ?>">
	<div class="container">
		<?php if (!have_posts()) : ?>
		  <div class="alert alert-warning">
		    <?php _e('Sorry, no results were found.', 'sage'); ?>
		  </div>
		  <?php get_search_form(); ?>
		<?php endif; ?>

		<?php get_template_part('templates/section', 'pinnedArticle'); ?>

		<span class="yellow-border-bar"></span>

		<div class="columns">
			<?php while (have_posts()) : the_post(); ?>
			  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
			<?php endwhile; ?>
		</div>

		<div class="posts-navigation">
			<?php posts_nav_link("<span class='separator'></span>","<span class='nav-button left'><i class='fa fa-angle-left' aria-hidden='true'></i></span>Older posts","Newer posts<span class='nav-button right'><i class='fa fa-angle-right' aria-hidden='true'></i></span>"); ?>
		</div>
	</div>

	<?php get_template_part('templates/section', 'subscribe'); ?>
</div>