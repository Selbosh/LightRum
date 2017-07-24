<!-- template for post excerpts on archive pages -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
  <div class="article-inner">
    <a href="<?php echo esc_url(get_permalink()); ?>">
    <header class="entry-header <?php if ($thumb) { echo 'thumb'; ?>"
      style="background-image: linear-gradient(rgba(255, 255, 255, .2), rgba(255, 255, 255, .2)), url(<?php echo $thumb; } ?>">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
  </header></a>
    <?php echo '<time>'.get_the_date( get_option('date_format') ).'</time>'; ?>
    <?php if ( in_category(array('News', 'Reviews', 'Tutorials')) ) {
      // https://developer.wordpress.org/reference/functions/get_categories/
      echo 'I am news, reviews or tutorials';
    } ?>

    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
    <!--<footer class="entry-footer">
      Footy McFooter
    </footer>-->
  </div><!--.article-inner-->
</article>
