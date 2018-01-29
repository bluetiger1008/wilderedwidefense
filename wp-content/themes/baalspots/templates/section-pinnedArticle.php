<section class="pinned-article">
	<?php $query = new WP_Query( array(
      'post_type'=>'post',
      'posts_per_page' => 1,
  ) ); ?>
  <?php if ( $query->have_posts() ) : ?>
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      	<div class="columns">
					<div class="column is-two-thirds article-image">
						<figure class="image is-3by2">
			    		<img src="<?php the_post_thumbnail_url(); ?>"/>
			    	</figure>
					</div>
					<div class="column">
						<div class="content">
							<p class="categories">
			      	<?php
			      	$categories = get_the_category($post->ID);
							if ( ! empty( $categories ) ) {
							    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
							}
							?>
							</p>
							<a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
							<p class="post-content"><?php echo wp_trim_words( get_the_content(), 15, $more = '… ' ); ?></p>
			      </div>
					</div>
				</div>
      <?php endwhile;
          wp_reset_postdata(); ?>
  <?php endif;?>
</section>