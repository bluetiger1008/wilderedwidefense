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

    <section class="subscribe">
        <div class="container" style="background-image: url('<?php the_field('newsletter_form_background') ?>');">
            <h1><?php the_field('newsletter_form_title') ?></h1>
            <p><?php the_field('sign_up_text') ?></p>
            <form action="https://baalspots.createsend.com/t/i/s/atdgj/" method="post" id="subForm">
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="email" name="cm-atdgj-atdgj" required />
                    </div>
                    <div class="control">
                        <button class="button is-info" type="submit">
                        Subscribe
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <?php if( have_rows('testimoinals') ): 
                while( have_rows('testimoinals') ): the_row(); 
                    
                    // vars
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $script = get_sub_field('testimonial_script');
                    
                    ?>
                    <div class="columns is-gapless">
                        <div class="column is-half">
                            <div class="testimonial-title">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
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

    <section class="latest-articles">
        <div class="container">
            <div class="articles-header">
                <h1>Latest Articles</h1>
                <div class="view-all">
                    <a>View All Articles</a>
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/whiteRightArrow.svg">
                </div>
            </div>
            <?php the_field('article_script'); ?>
        </div>
    </section>
</div>