<section class="days-left" data-aos="fade-up" data-aos-delay="300" data-aos-once="true" style="background-image: url('<?php the_field('left_days_background_image') ?>');">
    <div class="container is-vertical">
        <div class="columns">
            <div class="column is-half-desktop is-12-tablet">
                <h1><?php the_field('left_days_header') ?></h1>
                <p><?php the_field('left_days_description') ?></p>
                <a href="<?= esc_url(home_url('/')); ?>contact/" class="button btn-cta">Act Now</a>
            </div>
        </div>
    </div>
    <div class="thumb-days">
        <p class="is-uppercase"><?php the_field('left_days_number') ?><span>days</span></p>
    </div>
</section>