<!-- template for post excerpts on archive pages -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>
  <div class="article-inner">
    <a href="<?php echo esc_url(get_permalink()); ?>">
      <header class="entry-header <?php if ($thumb) { echo 'thumb'; ?>"
          style="background-image: linear-gradient(rgba(255, 255, 255, .2), rgba(255, 255, 255, .2)), url(<?php echo $thumb; } ?>">
        <?php the_title('<h1 class="entry-title"><span>', '</span></h1>'); ?>
      </header>
    </a>
    <div class="entry-meta">
      <time datetime="<?php the_time('c'); ?>">
        <?php echo get_the_date( get_option('date_format') ); ?>
      </time>
      <?php if ( get_comments_number() ): ?><span class="comments-number">
      <?php comments_number('0',          // zero
                            '1&nbsp;💬',  // one
                            '%&nbsp;💬'); // more ?>
        </span><?php endif; ?>
        <div class="fb-like" data-href="<?php echo esc_url(get_permalink()); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
    </div>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
  </div><!--.article-inner-->
</article>
