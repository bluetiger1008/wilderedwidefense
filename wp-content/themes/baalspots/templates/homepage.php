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
                    <script type="text/javascript" src="https://550groupllc.formstack.com/forms/js.php/contact_us__sidebar"></script>
                </div>
            </div>
        </div>
    </div>
</div>