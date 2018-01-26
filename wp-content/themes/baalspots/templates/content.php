<div class="column is-one-third" data-aos="fade-down" data-aos-anchor-placement="top-center">
	<article <?php post_class(); ?>>
    <div class="article-photo">
    	<figure class="image is-3by2">
    		<?php if ( has_post_thumbnail() ) : ?>
    			<img src="<?php the_post_thumbnail_url(); ?>"/>
    		<?php endif; ?>
    	</figure>
    </div>
    <div class="article-summary">
    	<div class="article-title">
	      <p class="categories">
	      	<?php
	      	$categories = get_the_category();
					if ( ! empty( $categories ) ) {
					    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
					}
					?>
	      </p>
	      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	    </div>
      <div class="meta-data">
	      <?php get_template_part('templates/entry-meta'); ?>
	    </div>
    </div>
	</article>
</div>
