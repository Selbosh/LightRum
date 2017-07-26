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
          endif;
          the_content(); // Custom post content.
          $terms = get_terms( array('taxonomy' => 'brand') ); ?>
          <ul class="taxonomy-list brands">
            <?php foreach ($terms as $term): ?>
              <li class="taxonomy-term brand">
                <a href="<?php echo get_term_link($term->term_id); ?>">
                  <?php echo $term->name; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </section>

        <footer class="entry-footer">
          <?php get_template_part('author-bio'); ?>
        </footer>

      </article>
    <?php endwhile; ?>
  </main>

  <?php get_sidebar(); ?>

</div><!--#wrapper-->

<?php get_footer(); ?>
