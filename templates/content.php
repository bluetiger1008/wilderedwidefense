<div class="column is-one-third" data-aos="fade-up" data-aos-once="true">
	<article <?php post_class(); ?>>
    <div class="article-photo">
    	<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
    	<figure class="image is-3by2" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
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
      	<div class="meta-left is-48x48">
	      	<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
	      </div>
	      <div class="meta-content">
		      <?php get_template_part('templates/entry-meta'); ?>
	      </div>
	    </div>
    </div>
	</article>
</div>
