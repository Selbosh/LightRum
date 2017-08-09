<?php

/*
====================
Theme JS and CSS
====================
*/
function lightrum_script_enqueue() {
  wp_enqueue_style('lightrum-style', get_template_directory_uri().'/css/styles.css', array(), '0.2.3');
  wp_enqueue_style('custom-style', get_template_directory_uri().'/custom.css', array('lightrum-style'));
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
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
  add_theme_support('custom-logo', array(
    'height' => 72,
    'width'  => 400,
    'flex-height' => true,
    'flex-width' => true,
  ));
  register_nav_menus( array(
    'menu-1' => esc_html__( 'Primary', 'lightrum' ),
    'menu-2' => esc_html__( 'Footer', 'lightrum' ),
    'social' => esc_html__( 'Social', 'lightrum' ),
  ));
  if ( !isset($content_width) ) { $content_width = 1024; }
}
add_action( 'after_setup_theme', 'lightrum_setup' );

/*
=====================
Sidebars / widgets
=====================
*/
function lightrum_widgets_init() {

  register_sidebar( array(
    'name'          => 'Main sidebar',
    'id'            => 'sidebar_1',
    'description'   => 'Right sidebar for large screens, or footer for smaller screens.',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer widget area',
    'id'            => 'footer_1',
    'description'   => 'Centred footer area for copyright information.',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => 'Postscript (below articles)',
    'id'            => 'single_postscript',
    'description'   => 'Area between post content and comments section. For calls to action.',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
  ) );

}
add_action( 'widgets_init', 'lightrum_widgets_init' );

/*
=====================
Custom taxonomies
=====================
*/
function lightrum_taxonomies() {

  $labels = array(
    'name'                  => _x( 'Brands', 'taxonomy general name' ),
    'singular_name'         => _x( 'Brand', 'taxonomy singular name' ),
    'all_items'             => __( 'All Brands' ),
    'edit_item'             => __( 'Edit Brand' ),
    'view_item'             => __( 'View Brand' ),
    'update_item'           => __( 'Update Brand' ),
    'add_new_item'          => __( 'Add New Brand' ),
    'new_item_name'         => __( 'New Brand Name' ),
    'search_items'          => __( 'Search Brands' ),
    'popular_brands'        => __( 'Popular Brands' ),
    'add_or_remove_items'   => __( 'Add or remove brands' ),
    'choose_from_most_used' => __( 'Choose from most used brands' ),
    'not_found'             => __( 'No brands found.' )
  );

  register_taxonomy('brand', 'post', array(
    'labels' => $labels,
    'description' => 'Brand names mentioned in a post',
    'public' => true
    )
  );

  $labels = array(
    'name'                  => _x( 'Gear Types', 'taxonomy general name' ),
    'singular_name'         => _x( 'Gear Type', 'taxonomy singular name' ),
    'all_items'             => __( 'All Gear Types' ),
    'edit_item'             => __( 'Edit Gear Type' ),
    'view_item'             => __( 'View Gear Type' ),
    'update_item'           => __( 'Update Gear Type' ),
    'add_new_item'          => __( 'Add New Gear Type' ),
    'new_item_name'         => __( 'New Gear Name' ),
    'search_items'          => __( 'Search Gear Types' ),
    'popular_brands'        => __( 'Popular Gear Types' ),
    'add_or_remove_items'   => __( 'Add or remove gear types' ),
    'choose_from_most_used' => __( 'Choose from most used gear types' ),
    'not_found'             => __( 'No gear types found.' )
  );

  register_taxonomy('gear', 'post', array(
    'labels' => $labels,
    'description' => 'Types of equipment, e.g. flashguns, studio heads',
    'public' => true
    )
  );

}
add_action( 'init', 'lightrum_taxonomies' );

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
===================
Links with images
===================
*/
function give_linked_images_class($content) {
  // see https://stackoverflow.com/a/24042991
  $classes = 'img-link'; // separate classes by spaces - 'img image-link'
  // check if there are already a class property assigned to the anchor
  if ( preg_match('/<a.*? class=".*?"><img/', $content) ) {
    // If there is, simply add the class
    $content = preg_replace('/(<a.*? class=".*?)(".*?><img)/', '$1 ' . $classes . '$2', $content);
  } else {
    // If there is not an existing class, create a class property
    $content = preg_replace('/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content);
  }
  return $content;
}
add_filter('the_content', 'give_linked_images_class');

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
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'type' => 'plain'
    ) );
  echo '</nav><!--.pagination-->';
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

/*
===================
Menu search form
===================
*/
function add_search_form($items, $args) {
  if ( $args->theme_location == 'menu-1' )
    $items .= '<li>' . get_search_form( false ) . '</li>';
  return $items;
}
add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
