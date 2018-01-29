<section class="services">
	<div class="container">
		<div class="service-header">
			<?php the_field('service_header')?>
		</div>
		<div class="columns service-list">
			<?php
				// check if the repeater field has rows of data
				if( have_rows('service_list') ):
				 	// loop through the rows of data
				    while ( have_rows('service_list') ) : the_row();
				    	//vars 
				    	$service_image = get_sub_field('service_image');
				    	$service_icon = get_sub_field('service_icon');
				    	$service_title = get_sub_field('service_title');
				    	$service_link = get_sub_field('service_link');

				    	?>
				      <div class="column is-4-desktop is-6-tablet service">
				      	<div class="service-image">
					      	<figure class="image is-16by9">
					    			<img src="<?php echo $service_image; ?>"/>
						    	</figure>
						    </div>
					    	<div class="service-footer">
					    		<div class="content">
						    		<div class="summary">
						    			<img src="<?php echo $service_icon; ?>"/>
							    		<h3><?php echo $service_title; ?></h3>
							    	</div>
						    		<a href="<?php echo $service_link; ?>" class="btn-more">
						    			<span>Learn More</span>
						    			<img src="<?= get_template_directory_uri(); ?>/dist/images/whiteRightArrow.svg">
						    		</a>
						    	</div>
					    	</div>
				      </div>
						<?php endwhile; ?>
			<?php else : ?>
			    
			<?php endif; ?>
		</div>
	</div>
</section>