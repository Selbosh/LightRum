<?php get_header(); ?>

  <main role="main">
    <?php the_archive_title('<h1>', '</h1>'); ?>
    <div class="posts-grid">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile; ?>
        </div><!--.posts-grid-->
        <!-- post navigation -->
        <?php lightrum_pagination(); ?>
      <?php else: ?>
        <?php _e('Sorry, no posts were found.'); ?>
      </div><!--.posts-grid-->
      <?php endif; ?>
  </main>

<?php get_footer(); ?>
