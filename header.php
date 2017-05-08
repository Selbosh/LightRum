<!doctype html>
<html>
  <head>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <h1 class="site-title">
        <a href="<?php echo esc_url( home_url ( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
      </h1>
      <?php if ( get_bloginfo( 'description', 'display' ) ): ?>
        <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
      <?php endif; ?>
    </header>
