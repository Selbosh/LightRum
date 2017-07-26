<?php get_header(); ?>

  <main role="main">
    <h1>Search results for: <?php the_search_query(); ?></h1>
    <div class="posts-grid">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile; ?>
        </div><!--.posts-grid-->
        <!-- post navigation -->
        <?php lightrum_pagination(); ?>
      <?php else: ?>
        <?php _e('Sorry, nothing matched your search terms.', 'lightrum'); ?>
      </div><!--.posts-grid-->
      <?php endif; ?>
  </main>

<?php get_footer(); ?>
