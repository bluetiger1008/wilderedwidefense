<section class="latest-articles-rows">
    <div class="container">
        <div class="columns">
            <div class="column is-two-thirds is-12-desktop is-12-tablet is-12-mobile">
                <h1>Latest Articles</h1>
                <?php $query = new WP_Query( array(
                    'post_type'=>'post',
                    'posts_per_page' => 2,
                ) ); ?>
                <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="article">
                            <?php the_post_thumbnail('full', ['class'=>'article-image']); ?>
                            <div class="article-summary">
                                <p>
                                    <?php
                                    $terms = get_the_terms( $post->ID , array( 'award_winning_team_member_role') );
                                    foreach ( $terms as $term ) {
                                        echo $term->name;
                                    }
                                    ?>
                                </p>
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </div>
                    <?php endwhile;
                        wp_reset_postdata(); ?>
                <?php endif;?>
            </div>
            <div class="column">
            </div>
        </div>
    </div>
</section>