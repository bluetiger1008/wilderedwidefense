<section class="wp-content">
    <div class="container">
        <div class="columns">
            <div class="column is-two-thirds" data-aos="fade-down">
                <?php the_content(); ?>
            </div>
            <div class="column" style="position: relative;">
                <div class="form-consult <?php echo is_front_page() ? '' : 'sticky'; ?>" id="sticky_consult_form">
                    <div class="form-consult-title"><?php the_field('consultation_form_title'); ?></div>
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
</section>