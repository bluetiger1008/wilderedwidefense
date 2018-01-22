<div class="column is-one-third">
	<article <?php post_class(); ?>>
		<div class="article-photo <?php echo has_post_thumbnail()? '': 'empty'; ?>" style="background-image: url('<?php echo has_post_thumbnail()? the_post_thumbnail_url( 'full' ) : null; ?>')">
    </div>
    <div class="article-summary">
      <p class="tags"><?php the_tags('',','); ?></p>
      <div class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
      <div class="article-description"><?php echo wp_trim_words( get_the_content(), 15, $more = '… ' ); ?></div>
    </div>
	</article>
</div>
