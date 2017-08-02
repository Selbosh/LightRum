<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <!--Facebook SDK -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <!--/Facebook SDK-->
    <header>
      <?php if ( has_custom_logo() ):
        the_custom_logo();
      else: ?>
      <h1 class="site-title">
        <a href="<?php echo esc_url( home_url ( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
      </h1>
      <?php endif; ?>
      <?php if ( get_bloginfo( 'description', 'display' ) ): ?>
        <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); ?></p>
      <?php endif; ?>
      <nav id="site-navigation" class="main-navigation">
        <?php wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
          ) );
        ?>
      </nav>
    </header>
