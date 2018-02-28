<div class="pg-404">
	<section class="alert">
		<div class="container">
			<img src="<?= get_template_directory_uri(); ?>/dist/images/icon-error.png" class="icon-status">
			<p class="sm">Ohh Nooo</p>
			<h1>Page Not Found</h1>
			<p class="alert">It may have moved or the page you requested does not exist. Please check the URL and try it again.</p>
			<div class="goBack">
	      <a href="<?= esc_url(home_url('/')); ?>">Let’s bail you out</a>
	      <img src="<?= get_template_directory_uri(); ?>/dist/images/arrowRight.svg">
	    </div>
		</div>
	</section>
</div>