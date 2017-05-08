<?php get_header(); ?>

  <main role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php get_template_part('content', get_post_format()); ?>
    <?php endwhile; ?>
      <!-- post navigation -->
    <?php else: ?>
      <?php _e('Sorry, no posts were found.'); ?>
    <?php endif; ?>
  </main>

<?php get_footer(); ?>
