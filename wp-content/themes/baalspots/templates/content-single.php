<section class="single-article">
	<div class="container">
		<?php while (have_posts()) : the_post(); ?>
			<div class="summary">
				<p class="categories">
	    	<?php
	    	$categories = get_the_category($post->ID);
				if ( ! empty( $categories ) ) {
				    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
				}
				?>
				</p>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="meta-data">
	      	<div class="meta-left">
		      	<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
		      </div>
		      <div class="meta-content">
			      <?php get_template_part('templates/entry-meta'); ?>
		      </div>
		    </div>
		    <div class="is-hidden-tablet">
		    	<?php get_template_part('templates/blog', 'share'); ?>
		    </div>
	    </div>
	    <div class="featured-image">
	    	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
				<figure class="image is-16by9" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
		  	</figure>
		  </div>
		  <div class="article-wrapper">
		  	<div class="columns" id="main-blog-content">
		  		<div class="column is-2 is-hidden-mobile" id="side-bar">
		  			<?php get_template_part('templates/blog', 'share'); ?>
		  		</div>
		  		<div class="column is-8">
		  			<div class="article-content">
						  <?php the_content(); ?>
						  <div class="tags">
						  	<span class="yellow-border-bar"></span>
						  	<div class="tag-list">
								  <?php
									echo get_the_tag_list();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</section>


<?php get_template_part('templates/section', 'subscribe'); ?>

<?php get_template_part('templates/section', 'relatedArticles'); ?>

