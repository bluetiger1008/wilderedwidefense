<?php
/**
 * Template Name: Internal Page Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part( 'templates/section', 'content' ); ?>
<?php endwhile; ?>

<?php get_template_part('templates/section', 'subscribe'); ?>
