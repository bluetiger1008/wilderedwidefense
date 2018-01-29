<section class="pinned-article">
	<?php
		$args = array( 'numberposts' => '1' );
		$latest_post = wp_get_recent_posts( $args );
		foreach( $latest_post as $latest ): ?>
			<div class="columns">
				<div class="column is-two-thirds article-image">
					<figure class="image is-3by2">
		    		<?php echo get_the_post_thumbnail( $latest->ID, 'thumbnail' ); ?>
		    	</figure>
				</div>
				<div class="column">
					<div class="content">
						<p class="categories">
		      	<?php
		      	$categories = get_the_category($latest->ID);
						if ( ! empty( $categories ) ) {
						    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
						}
						?>
						</p>
						<a href="<?php the_permalink(); ?>" class="post-title"><?php echo $latest["post_title"]?></a>
						<p class="post-content"><?php echo wp_trim_words( $latest["post_content"], 30, $more = '… ' ); ?></p>
		      </div>
				</div>
			</div>
		<? endforeach; ?>
	<? wp_reset_query(); ?>

</section>