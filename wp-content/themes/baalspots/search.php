<?php
/*
Template Name: Search Page
*/
?>

<div class="pg-search">
	<div class="container">
		<h1 class="title"><small><?php echo $wp_query->found_posts; ?> results for:</small><br>
	    <?php echo get_search_query(); ?></h1>
		<?php if (!have_posts()) : ?>
			<?php get_search_form(); ?>
		  <div class="alert alert-warning">
		    <?php _e('Sorry, no results were found.', 'sage'); ?>
		  </div>
		<?php else: ?>
			<section class="search-result">
					<div class="results-list">
						<?php while (have_posts()) : the_post(); ?>
							  <?php get_template_part('templates/content', 'search'); ?>
						<?php endwhile; ?>
					</div>
					<?php the_posts_navigation(); ?>
			</section>
		<?php endif; ?>
	</div>
</div>