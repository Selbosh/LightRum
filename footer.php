<footer>
  <?php wp_nav_menu( array(
    'theme_location' => 'menu-2',
    'menu_id'        => 'footer-menu',
  ) ); ?>
  <?php if ( is_active_sidebar('footer_1') ):
    dynamic_sidebar( 'footer_1' );
  endif; ?>
  <?php wp_footer(); ?>
</footer>

</body>
</html>
