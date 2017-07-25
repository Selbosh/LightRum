<?php

/*
====================
Theme JS and CSS
====================
*/
function lightrum_script_enqueue() {
  wp_enqueue_style('lightrumstyle', get_template_directory_uri().'/css/styles.css', array(), '0.1', 'all');
}
add_action('wp_enqueue_scripts', 'lightrum_script_enqueue');

/*
=====================
Theme support
=====================
*/
function lightrum_setup() {
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  register_nav_menus( array(
    'menu-1' => esc_html__( 'Primary', 'lightrum' ),
  ));
}
add_action( 'after_setup_theme', 'lightrum_setup' );

/*
=====================
Sidebars / widgets
=====================
*/
function lightrum_widgets_init() {
  register_sidebar( array(
    'name'          => 'Footer widget',
    'name'          => 'footer_1',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'lightrum_widgets_init' );

/*
=====================
Disable emojicons
=====================
*/
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  // filter to remove TinyMCE emojis
  function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
      return array();
    }
  }
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
  add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );

/*
=====================
Remove <head> junk
=====================
*/
function disable_head_junk() {
  remove_action( 'wp_head', 'rsd_link' );
  remove_action( 'wp_head', 'wlwmanifest_link' );
  remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'disable_head_junk' );

/*
=====================
Archive pagination
=====================
*/
function lightrum_pagination() {
  global $wp_query;
  echo '<div class="pagination">';
  echo paginate_links( array(
    'type' => 'plain'
    ) );
  echo '</div><!--.pagination-->';
}


function discount_stickies($query) {
  // control for stickied posts when counting posts/page
  if ( $query->is_main_query() && is_home() ) {
    $posts_per_page = get_option('posts_per_page');
    $sticky_posts = get_option('sticky_posts');
    // if we have any sticky posts and we are on 1st page:
    if ( is_array($sticky_posts) && !$query->is_paged() ) {
      $n_sticky = count($sticky_posts);
      if ( $n_sticky < $posts_per_page ) {
        $query->set('posts_per_page', $posts_per_page - $n_sticky);
      } else { // when n_sticky >= posts_per_page:
        $query->set('posts_per_page', 1);
      }
    }
  }
}
add_action( 'pre_get_posts', 'discount_stickies' );
