<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php if ( has_excerpt() ): ?>
      <p class="entry-summary"><?php echo get_the_excerpt(); ?></p>
    <?php endif; ?>
    <div class="entry-meta">
      By <address><?php the_author(); ?></address>
      <!--on--><time datetime="<?php the_time('c'); ?>">
        <?php echo get_the_date( get_option('date_format') ); ?>
      </time>
      <!--in--><?php the_category(); ?>
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
    <?php if ( get_the_author_meta('user_url') ):
      $pretty_author_url = get_the_author_meta('user_url');
      $url_prefixes = array( 'http://', 'https://', 'www.' );
      foreach ($url_prefixes as $item) {
        $pretty_author_url = str_replace($item, '', $pretty_author_url);
      } ?>
      <p class="author-url">
        <!--Web site:-->
        <a href="<?php echo esc_url( get_the_author_meta('user_url') ); ?>">
          <?php echo $pretty_author_url; ?>
        </a>
      </p>
    <?php endif; ?>
  </footer>

</article>

<nav class="pagination">
  <span class="previous">
    <?php previous_post_link(); ?>
  </span><span class="next">
    <?php next_post_link(); ?>
  </span>
</nav><!--.pagination-->
