<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php if ( has_excerpt() ): ?>
      <p class="entry-summary"><?php echo get_the_excerpt(); ?></p>
    <?php endif; ?>
  </header>

  <section class="entry-content">
    <?php if ( has_post_thumbnail() ):
      the_post_thumbnail( 'large' );
    endif; ?>
    <?php the_content(); ?>
  </section>

  <footer class="entry-footer">
    <?php get_template_part('author-bio'); ?>
  </footer>

</article>
