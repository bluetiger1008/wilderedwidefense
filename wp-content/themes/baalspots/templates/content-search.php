<article <?php post_class(); ?>>
  <header>
    <?php if(get_post_type() === 'post'): ?>
      <p class="blog-mark">Blog</p>
    <?php endif; ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
