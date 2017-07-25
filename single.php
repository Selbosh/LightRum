<?php get_header(); ?>

<div id="wrapper">

<main role="main">
  <?php while ( have_posts() ): the_post();
    get_template_part('post', 'single');
    if ( comments_open() || get_comments_number() ):
      comments_template();
    endif;
  endwhile; ?>
</main>

<?php get_sidebar(); ?>

</div><!--#wrapper-->

<?php get_footer(); ?>
