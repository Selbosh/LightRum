<div class="author-avatar">
  <?php echo get_avatar( get_the_author_meta('email'), 120); ?>
</div>
<div class="author-bio">
  <span class="author-title"><?php the_author(); ?></span><br />
  <span class="author-description"><?php the_author_meta('description'); ?></span>
  <?php if ( get_the_author_meta('user_url') ):
    $pretty_author_url = get_the_author_meta('user_url');
    $url_prefixes = array( 'http://', 'https://', 'www.' );
    foreach ($url_prefixes as $item) {
      $pretty_author_url = str_replace($item, '', $pretty_author_url);
    } ?>
  <br>
      <a class="author-url" href="<?php echo esc_url( get_the_author_meta('user_url') ); ?>">
        <?php echo $pretty_author_url; ?>
      </a>
    </div><!--.author-bio-->
<?php endif; ?>
