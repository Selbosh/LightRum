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
        <div class="entry-meta">
          By <address><?php the_author(); ?></address>
          on <time><?php the_date(); ?></time>
        </div>
      </header>

      <section class="entry-content">
        <?php if ( has_post_thumbnail() ):
          the_post_thumbnail( 'large' );
        endif; ?>
        <?php the_content(); ?>
      </section>

      <footer class="entry-footer">
        <div class="author-avatar">
          <?php echo get_avatar( get_the_author_meta('email'), 72); ?>
        </div>
        <address class="author-title"><?php the_author(); ?></address>
        <p class="author-description"><?php the_author_meta('description'); ?></p>
        <?php if ( get_the_author_meta('user_url') ): ?>
          <p class="author-url">Web site: <a href="<?php echo esc_url( get_the_author_meta('user_url') ); ?>"><?php the_author_meta('user_url'); ?></a></p>
        <?php endif; ?>
      </footer>

    </article>

      <?php // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_numbers() ):
        comments_template();
      endif;

      the_post_navigation();

  endwhile; // End of the Loop
?>
</main>

<?php get_sidebar(); ?>

</div><!--#wrapper-->

<?php get_footer(); ?>
