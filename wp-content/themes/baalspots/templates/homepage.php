<?php 
/*
Template Name: Home Page
Template Post Type: post, page, event
*/
?>
<div class="home">
    <div class="hero" style="background-image: url('<?php the_field('hero_image') ?>');">
        <div class="container">
            <div class="hero-text">
                <?php if( have_rows('hero_slider') ): ?>
                <ul id="slides">
                <?php while( have_rows('hero_slider') ): the_row(); 
                    // vars
                    $title = get_sub_field('slider_title');
                    $description = get_sub_field('slider_description');
                    $link = get_sub_field('get_start_link');
                    ?>
                    <li class="slide">
                        <h1><?php echo $title; ?></h1>
                        <p class="is-hidden-mobile"><?php echo $description; ?></p>
                        <?php if( $link ): ?>
                            <a href="<?php echo $link; ?>" class="button btn-cta">
                                Get Started Now
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        <img src="<?php the_field('attorney_image') ?>" class="img-man">
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
    
    <div class="wp-content">
        <div class="container">
            <div class="columns">
                <div class="column is-two-thirds">
                    <?php the_content(); ?>
                </div>
                <div class="column">
                    <div class="form-consult">
                        <?php the_field('consultation_form_script') ?>
                        <?php if(get_field('consultation_form_quote')) : ?>
                            <div class="form-quote">
                                <img class="icon-quote" src="<?= get_template_directory_uri(); ?>/dist/images/icon-quote.png">
                                <p class="quote"><?php the_field('consultation_form_quote') ?></p>
                                <p class="verdict"><?php the_field('consultation_form_verdict') ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ( is_active_sidebar( 'victories_tiles' ) ) : ?>
        <?php dynamic_sidebar( 'victories_tiles' ); ?>
    <?php endif; ?>

    <section class="days-left" style="background-image: url('<?php the_field('left_days_background_image') ?>');">
        <div class="container is-vertical">
            <div class="columns">
                <div class="column is-half">
                    <h1><?php the_field('left_days_header') ?></h1>
                    <p><?php the_field('left_days_description') ?></p>
                    <a href="" class="button btn-cta">Act Now</a>
                </div>
            </div>
        </div>
        <div class="thumb-days">
            <p class="is-uppercase"><?php the_field('left_days_number') ?><span>days</span></p>
        </div>
    </section>

    <section class="meet-team">
        <div class="container">
            <?php the_field('award_team_content') ?>
        </div>
    </section>

    <section class="subscribe">
        <div class="container">
            <h1><?php the_field('newsletter_form_header') ?></h1>
            <p><?php the_field('subscribe_description') ?></p>
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
                            <div class="testimonial-title" style="background-image: url('<?php echo $image['url']; ?>');">
                                <img class="is-hidden-mobile" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
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
            </div>
            <?php the_field('article_script'); ?>
            <div class="anchor-view-all">
                <a>View All Articles</a>
                <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
            </div>
        </div>
    </section>

    <section class="consultation">
        <img src="<?= get_template_directory_uri(); ?>/dist/images/dark-city.jpg">
        <div class="form">
            <div class="container">
                <div class="wrapper">
                    <h1><?php the_field('consult_form_header'); ?></h1>
                    <p><?php the_field('consult_form_description'); ?></p>
                    <script type="text/javascript" src="https://550groupllc.formstack.com/forms/js.php/contact_us_main_pre_footer"></script>
                </div>
            </div>
        </div>
    </section>
</div>