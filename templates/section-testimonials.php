<section class="all-testimonials">
    <div class="container">
        <div class="columns" id="testimonials-content">
            <div class="column is-two-thirds left-content" data-aos="fade-up" data-aos-delay="300" data-aos-once="true" >
                <?php $query = new WP_Query( array(
                    'post_type'=>'testimonial',
                    'posts_per_page' => -1,
                ) ); ?>
                <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="testimonial box">
                            <div class="stars">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <h2><?php the_title(); ?></h2>
                            <div class="content"><?php the_content(); ?></div>
                            <h3>– Anonymous</h3>
                        </div>
                    <?php endwhile;
                        wp_reset_postdata(); ?>
                <?php endif;?>
            </div>
            <div class="column" style="position: relative;">
                <div class="form-submit-testimonial">
                    <div class="form-header">
                        <p>Share your positive <br> experience at <br> The Wilder Firm!</p>
                        <img src="<?= get_template_directory_uri(); ?>/dist/images/testimonial-girl.png">
                    </div>
                    <div class="form-content">
                        <span>
                            <a id="btnTestimonialSubmit">Submit My Testimonial</a>
                            <img src="<?= get_template_directory_uri(); ?>/dist/images/whiteRightArrow.svg">
                        </span>
                    </div>
                </div>
                <div class="form-consult sticky" id="sticky_consult_form">
                    <div class="form-content">
                        <div class="form-consult-title"><?php the_field('consultation_form_title'); ?></div>
                        <?php the_field('consultation_form_script') ?>
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

<div id="testimonial-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <script type="text/javascript" src="https://550groupllc.formstack.com/forms/js.php/testimonial"></script>
    </section>
  </div>
</div>