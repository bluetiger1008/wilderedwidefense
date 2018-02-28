<section class="wp-content">
    <div class="container">
        <div class="columns">
            <div class="column is-two-thirds left-content" data-aos="fade-up" data-aos-delay="300" data-aos-once="true" >
                <?php 
                    the_content();

                    if(!is_front_page() && !is_page_template('template-theFirm.php')) {
                        get_template_part('templates/section', 'latestArticles'); 
                    }
                ?>
            </div>
            <div class="column" style="position: relative;">
                <div class="form-consult <?php echo is_front_page() ? '' : 'sticky'; ?> <?php echo is_page_template( 'template-criminalPage.php' ) ? 'reverse' : null?>" id="sticky_consult_form">
                    <div class="form-content">                           
                        <?php  
                        if ( get_post_type() === 'criminal_defense' ) {
                            ?>
                            <div class="form-consult-title">
                                <h3 style="text-transform: uppercase; text-align: center; margin-bottom: 0;">Get a free consultation</h3>
                            </div>
                            <script type="text/javascript" src="https://550groupllc.formstack.com/forms/js.php/contact_us__sidebar"></script>
                            <?php
                        } elseif (get_post_type() === 'cpt_dwi') {
                        ?>
                            <div class="form-consult-title">
                                <h3>Contact Us for <br> Free Consulation</h3>
                                <p>Available 24 hours a day, 7 days a week </p>
                            </div>
                            <script type="text/javascript" src="https://550groupllc.formstack.com/forms/js.php/free_consultation_side_bar"></script>
                            <?php }
                        else { ?>
                            <div class="form-consult-title"><?php the_field('consultation_form_title'); ?></div>
                            <?php the_field('consultation_form_script') ?>
                        <?php }
                        ?>
                    </div>
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