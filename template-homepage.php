<?php 
/*
Template Name: Home Page
Template Post Type: post, page, event
*/
?>
<div class="home">  
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/section', 'content'); ?>
    <?php endwhile; ?>

    <?php if ( is_active_sidebar( 'victories_tiles' ) ) : ?>
        <?php dynamic_sidebar( 'victories_tiles' ); ?>
    <?php endif; ?>

    <?php get_template_part('templates/section', 'daysLeft'); ?>

    <?php get_template_part('templates/section', 'awardTeamMembers'); ?>
    
    <?php get_template_part('templates/section', 'subscribe'); ?>

    <section class="testimonials">
        <div class="container">
            <?php if( have_rows('testimoinals') ): 
                while( have_rows('testimoinals') ): the_row(); 
                    
                    // vars
                    $title = get_sub_field('title');
                    $script = get_sub_field('testimonial_script');
                    
                    ?>
                    <div class="columns is-gapless">
                        <div class="column is-half">
                            <div class="testimonial-title">
                                <img class="is-hidden-mobile" src="<?= get_template_directory_uri(); ?>/dist/images/bg-law.jpg">
                                <h1><?php echo $title; ?></h1>
                            </div>
                        </div>
                        <div class="column is-half">
                            <div class="testimonial-content">
                                <?php echo $script; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                
            <?php endif; ?>
        </div>
    </section>

    <section data-aos="fade-up" data-aos-delay="300" data-aos-once="true" class="latest-articles">
        <div class="container">
            <div class="articles-header">
                <h1>Latest Articles</h1>
            </div>
            <?php the_field('article_script'); ?>
            <div class="anchor-view-all">
                <a href="<?= esc_url(home_url('/')); ?>blog/">View All Articles</a>
                <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
            </div>
        </div>
    </section>

    <?php get_template_part('templates/footer', 'consultation'); ?>
</div>