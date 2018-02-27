<section class="related-articles">
	<div class="container">
		<h2>Related</h2>
		<div class="columns">
			<?php

			$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
			if( $related ) foreach( $related as $post ) {
			setup_postdata($post); ?>
			 	<div class="column is-one-third">
	        <article>
	          <div class="article-photo">
	            <figure class="image is-3by2">
	              <?php if ( has_post_thumbnail() ) : ?>
	                <img src="<?php the_post_thumbnail_url(); ?>"/>
	              <?php endif; ?>
	            </figure>
	          </div>
	          <div class="article-summary">
	            <div class="article-content">
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
				      	<div class="meta-left">
					      	<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
					      </div>
					      <div class="meta-content">
						      <?php get_template_part('templates/entry-meta'); ?>
					      </div>
					    </div>
	          </div>
	        </article>
	      </div>
			<?php }
			wp_reset_postdata(); ?>
		</div>
		<?php echo do_shortcode('[wpdevart_facebook_comment curent_url="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" order_type="social" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" ]'); ?>
	</div>
</section>