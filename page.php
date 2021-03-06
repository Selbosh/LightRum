<?php get_header(); ?>

<div id="wrapper">

  <main role="main">
    <?php while ( have_posts() ): the_post(); ?>
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
      <?php if ( comments_open() || get_comments_number() ):
        comments_template();
      endif;
    endwhile; ?>
  </main>

  <?php get_sidebar(); ?>

</div><!--#wrapper-->

<?php get_footer(); ?>
