<?php 
/*
Template Name: Home Page
Template Post Type: post, page, event
*/
?>
<div class="home">  
    <?php get_template_part('templates/section', 'content'); ?>

    <?php if ( is_active_sidebar( 'victories_tiles' ) ) : ?>
        <?php dynamic_sidebar( 'victories_tiles' ); ?>
    <?php endif; ?>

    <?php get_template_part('templates/section', 'daysLeft'); ?>

    <section data-aos="fade-up" data-aos-delay="300" data-aos-once="true" class="meet-team">
        <div class="container">
            <?php the_field('award_team_content') ?>
        </div>
    </section>
    
    <?php get_template_part('templates/section', 'subscribe'); ?>

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

    <section data-aos="fade-up" data-aos-delay="300" data-aos-once="true" class="latest-articles">
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
                    <h1><?php the_field('footer_consultation_form_header'); ?></h1>
                    <p><?php the_field('footer_consultation_form_description'); ?></p>
                    <div data-aos="fade-up" data-aos-delay="300" data-aos-once="true">
                        <?php the_field('footer_consultation_form_script'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>