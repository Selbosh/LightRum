<?php get_header(); ?>

<div id="wrapper">

<main role="main">
  <?php while ( have_posts() ): the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php if ( has_excerpt() ): ?>
          <p><?php the_excerpt(); ?></p>
        <?php endif; ?>
        By <address><?php the_author(); ?></address>
        on <time><?php the_date(); ?></time>
      </header>

      <section class="entry-content">
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
  <?php endwhile; ?>
</main>

<?php get_sidebar(); ?>

</div><!--#wrapper-->

<?php get_footer(); ?>
