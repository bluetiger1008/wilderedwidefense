<?php 
/*
Template Name: Home Page
Template Post Type: post, page, event
*/
?>
<div class="home">
    <div class="hero">
        <img src="<?php the_field('hero_image') ?>" class="hero-background">
        <img src="<?php the_field('man_image') ?>" class="img-man">
        <div class="hero-text">
            <ul id="slides">
                <li class="slide showing">
                    <h1><?php the_field('hero_title') ?></h1>
                    <p><?php the_field('hero_description') ?></p>
                    <a href="" class="button btn-red btn-rounded">Get Started Now</a>
                </li>
                <li class="slide">
                    <h1>Slide 2</h1>
                    <p>lorem ipsum</p>
                </li>
                <li class="slide">
                    <h1>Slide 3</h1>
                    <p>lorem ipsum</p>
                </li>
            </ul>
        </div>
        <div class="awards-backbar">  
        </div>
        <div class="awards-forebar">
            <?php 
            // the query
            $wpb_all_query = new WP_Query(array('post_type'=>'award', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
            <?php if ( $wpb_all_query->have_posts() ) : ?>
            <div class="slider js_multislides">
                <div class="frame js_frame">
                    <ul class="slides js_slides">
                        <!-- the loop -->
                        <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                            <li class="js_slide"><?php the_post_thumbnail(); ?></li>
                        <?php endwhile; ?>
                        <!-- end of the loop -->     
                    </ul>
                </div>
                <span class="js_prev prev">
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowLeft.svg">
                </span>
                <span class="js_next next">
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
                </span>
            </div>
            <?php wp_reset_postdata(); ?>       
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="pg-content">
        <div class="container">
            <div class="columns">
                <div class="column is-two-thirds">
                    <?php the_content(); ?>
                </div>
                <div class="column">
                    <?php the_field('form_script') ?>
                    <?php the_field('form_comment') ?>
                </div>
            </div>
        </div>
    </div>

    <?php if ( is_active_sidebar( 'victories_tiles' ) ) : ?>
        <?php dynamic_sidebar( 'victories_tiles' ); ?>
    <?php endif; ?>

    <section class="days-left" style="background-image: url('<?php the_field('background_image') ?>');">
        <div class="container is-vertical">
            <div class="columns">
                <div class="column is-half">
                    <h1><?php the_field('title') ?></h1>
                    <p><?php the_field('description') ?></p>
                    <a href="" class="button btn-red btn-rounded">Act Now</a>
                </div>
            </div>
        </div>
        <div class="thumb-days">
            <p><?php the_field('left_days') ?><span>days</span></p>
        </div>
    </section>

    <section class="meet-team">
        <?php the_field('meet_award_team_header') ?>
        <div class="container">
            <?php the_field('meet_award_team_members') ?>
        </div>
    </section>
</div>