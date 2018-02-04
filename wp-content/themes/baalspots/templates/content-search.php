<article <?php post_class(); ?>>
  <header>
    <?php if(get_post_type() === 'post'): ?>
      <p class="blog-mark">blog</p>
    <?php endif; ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php if (get_post_type() === 'post'): ?>
    	<div class="meta-data">
	    	<div class="meta-left">
	      	<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
	      </div>
	      <div class="meta-content">
		      <?php get_template_part('templates/entry-meta'); ?>
	      </div>
	    </div>
    <?php endif; ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
