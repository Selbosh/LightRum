<!-- template for post excerpts on archive pages -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
  <div class="article-inner">
    <header class="entry-header <?php if ($thumb) { echo 'thumb'; ?>"
      style="background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(<?php echo $thumb; } ?>">
    <?php the_title(
      sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink()) ), '</a></h1>');
      ?>
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
