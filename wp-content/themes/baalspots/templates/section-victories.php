<section class="victories">
    <div class="container">
        <div class="masonry">
            <?php $query = new WP_Query( array(
                'post_type'=>'notable_victories',
                'posts_per_page' => -1,
            ) ); ?>
            <?php if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="item box">
                        <p class="victory-type"><?php the_field('victory_type'); ?></p>
                        <h2><?php the_title(); ?></h2>
                        <div class="victory-content"><?php the_content(); ?></div>
                    </div>
                <?php endwhile;
                    wp_reset_postdata(); ?>
            <?php endif;?>
        </div>
    </div>
</section>