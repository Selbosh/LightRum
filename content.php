<!-- template for post excerpts on archive pages -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title(
      sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),
      '</a></h1>'
    ); ?>
  </header>
  <section class="entry-content">
    Arty McArticle, Conti McContent.
  </section>
  <footer class="entry-footer">
    Footy McFooter
  </footer>
</article>
