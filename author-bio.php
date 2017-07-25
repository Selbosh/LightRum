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
