<section class="consultation">
    <?php if(is_home()) : ?>
        <img src="<?= get_template_directory_uri(); ?>/dist/images/dark-city.jpg">
    <?php endif;?>
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