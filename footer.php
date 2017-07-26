<footer>
  <?php get_template_part( 'menu', 'social' ); ?>
  <?php wp_nav_menu( array(
    'theme_location' => 'menu-2',
    'menu_id'        => 'footer-menu',
    'container'      => 'nav',
  ) ); ?>
  <?php if ( is_active_sidebar('footer_1') ): ?>
    <div id="footer-widget-area">
      <?php dynamic_sidebar( 'footer_1' ); ?>
    </div>
  <?php endif; ?>
  <?php wp_footer(); ?>
</footer>

</body>
</html>
