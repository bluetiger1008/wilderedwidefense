<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!--div class="pg-single-article">
	<?php if(get_post_type() === 'cpt_dwi' || get_post_type() === 'criminal_defense') {
		get_template_part('templates/hero');
		get_template_part('template', 'internal');
	} else {
		get_template_part('templates/content-single', get_post_type());
	}?>
</div-->

<div class="pg-single-article">
	<?php if(get_post_type() === 'cpt_dwi' || get_post_type() === 'criminal_defense') {
		get_template_part('templates/hero-internal');
		get_template_part('template', 'internal');
	} else {
		get_template_part('templates/content-single', get_post_type());
	}?>
</div>