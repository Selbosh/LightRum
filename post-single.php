<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php if ( has_excerpt() ): ?>
      <p class="entry-summary"><?php echo get_the_excerpt(); ?></p>
    <?php endif; ?>
    <div class="entry-meta">
      By <address><?php the_author_link(); ?></address>
      <!--on--><time datetime="<?php the_time('c'); ?>">
        <?php echo get_the_date( get_option('date_format') ); ?>
      </time>
      <!--in--><?php the_category(); ?>
    </div><!--.entry-meta-->
  </header>

  <section class="entry-content">
    <?php if ( has_post_thumbnail() ):
      the_post_thumbnail( 'large' );
    endif; ?>
    <?php the_content(); ?>
    <p><!--sharing buttons-->
      <div class="fb-like" data-href="<?php echo esc_url(maybe_https_url()); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
      <div class="fb-share-button" data-href="<?php echo esc_url(maybe_https_url()); ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&amp;src=sdkpreparse">Share</a></div>
      <a class="twitter-share-button"></a>
    </p>
  </section>

  <footer class="entry-footer">
      <?php get_template_part('author', 'bio'); ?>
  </footer>

  <?php if ( is_active_sidebar('single_postscript') ): ?>
    <aside id="postscript" role="complementary">
     <?php dynamic_sidebar( 'single_postscript' ); ?>
   </aside><!--#postscript-->
  <?php endif; ?>

</article>

<nav class="pagination">
  <span class="previous">
    <?php previous_post_link(); ?>
  </span><span class="next">
    <?php next_post_link(); ?>
  </span>
</nav><!--.pagination-->
