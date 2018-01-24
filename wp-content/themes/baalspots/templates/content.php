<div class="column is-one-third" data-aos="fade-down" data-aos-anchor-placement="top-center">
	<article <?php post_class(); ?>>
		<div class="article-photo <?php echo has_post_thumbnail()? '': 'empty'; ?>" style="background-image: url('<?php echo has_post_thumbnail()? the_post_thumbnail_url( 'full' ) : null; ?>')">
    </div>
    <div class="article-summary">
      <p class="tags"><?php the_tags('',','); ?></p>
      <div class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
      <?php get_template_part('templates/entry-meta'); ?>
    </div>
	</article>
</div>
