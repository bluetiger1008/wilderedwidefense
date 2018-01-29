<section class="latest-articles-rows">
    <span class="bar"></span>
    <h1>Latest Articles</h1>
    <?php $query = new WP_Query( array(
        'post_type'=>'post',
        'posts_per_page' => 2,
    ) ); ?>
    <?php if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="article">
                <div class="article-photo <?php echo has_post_thumbnail()? '': 'empty'; ?>" style="background-image: url('<?php echo has_post_thumbnail()? the_post_thumbnail_url( 'full' ) : null; ?>')">
                </div>
                <div class="article-summary">
                    <p>
                        <?php
                        $taxonomy = 'category';

                        // Get the term IDs assigned to post.
                        $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
                         
                        // Separator between links.
                        $separator = ', ';
                         
                        if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
                         
                            $term_ids = implode( ',' , $post_terms );
                         
                            $terms = wp_list_categories( array(
                                'title_li' => '',
                                'style'    => 'none',
                                'echo'     => false,
                                'taxonomy' => $taxonomy,
                                'include'  => $term_ids
                            ) );
                         
                            $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
                         
                            // Display post categories.
                            echo  $terms;
                        }
                        ?>
                    </p>
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        <?php endwhile;
            wp_reset_postdata(); ?>
    <?php endif;?>
</section>