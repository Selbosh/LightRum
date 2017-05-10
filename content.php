<!-- template for post excerpts on archive pages -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="article-inner">
    <?php if ( has_post_thumbnail() ):
      the_post_thumbnail( 'large' );
    endif; ?>
    <header class="entry-header">
      <?php the_title(
        sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),
        '</a></h1>'
      ); ?>
    </header>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
    <footer class="entry-footer">
      Footy McFooter
    </footer>
  </div><!--.article-inner-->
</article>
