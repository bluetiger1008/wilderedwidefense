<?php
/**
 * Template Name: The Firm Page Template
 */
?>
<div class="pg-firm">
	<?php get_template_part('templates/section', 'awardTeamMembers'); ?>

	<div class="awards-slider">
		<?php get_template_part('templates/section', 'awardsSlider'); ?>
	</div>

	<?php get_template_part('templates/section', 'content'); ?>

	<section class="commitments">
		<div class="container">
			<h1>Our Commitment</h1>
			<?php if( have_rows('commitments') ): ?>
				<div class="columns">
					<?php while( have_rows('commitments') ): the_row(); 

						// vars
						$title = get_sub_field('commitment_title');
						$description = get_sub_field('commitment_description');

						?>

						<div class="column is-half">
							<div class="commitment">
								<h3><?php echo $title; ?></h3>
						    <p><?php echo $description; ?></p>
						  </div>
						</div>

					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<div class="container second-content">
		<div class="columns">
			<div class="column is-two-thirds" data-aos="fade-up" data-aos-delay="300" data-aos-once="true" >
				<?php the_field('the_firm_second_content'); ?>
			</div>
		</div>
	</div>

	<?php get_template_part('templates/section', 'subscribe'); ?>
	<?php get_template_part('templates/footer', 'consultation'); ?>
</div>