<?php
/**
 * Template Name: Contact Us Template
 */
?>

<div class="pg-contact">
	<div id="map">
	</div>

	<section class="contact">
		<div class="container">
			<div class="contact-wrapper">
				<h1>Contact Us</h1>
				<div class="contact-form">
					<h2>Send us a message</h2>
					<div class="columns is-gapless">
						<div class="column is-two-thirds">
							<div class="form">
								<?php the_field('contact_form_script'); ?>
							</div>
						</div>
						<div class="column">
							<div class="contact-information">
								<h3>Contact Information</h3>
								<?php
										
								// vars
								$contact_information = get_field('contact_information');	

								if( $contact_information ): ?>
									<p><?php echo $contact_information['address']; ?></p>
									<p><?php echo $contact_information['phone_number']; ?></p>
								<?php endif; ?>

								<h3>Connect with us!</h3>
								<div class="social-share">
									<a href="https://www.facebook.com/pages/Wilder-Defense/485379268282490?ref" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/facebook-black.png"></a>
						      <a href="https://twitter.com/TheWilderFirm" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/twitter-black.png"></a>
						      <a href="https://www.linkedin.com/pub/douglas-wilder/b7/3b1/b97"><img src="<?= get_template_directory_uri(); ?>/dist/images/linkedin-black.png"></a>
						      <a href="https://plus.google.com/+TheWilderFirmDallas/posts?hl=en" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/google-black.png"></a>
						    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="awards-slider">
		<?php get_template_part('templates/section', 'awardsSlider'); ?>
	</div>
</div>