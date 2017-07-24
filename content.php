<!-- template for post excerpts on archive pages -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
  <div class="article-inner">
    <?php if ($thumb): ?>
    <header class="entry-header featured-thumb" style="background-image: url(<?php echo $thumb; ?>);">
    <?php else: ?>
    <header class="entry-header">
    <?php endif; ?>
      <?php the_title(
        sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),
        '</a></h1>'
      ); ?>
    </header>
    <?php echo '<time>'.get_the_date( get_option('date_format') ).'</time>'; ?>

    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
    <!--<footer class="entry-footer">
      Footy McFooter
    </footer>-->
  </div><!--.article-inner-->
</article>
