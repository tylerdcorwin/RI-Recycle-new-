<?php get_header(); ?>

<section class="blog-index posts-con">
  <?php get_template_part('partials/blog-index-header'); ?>
  <div class="outer-container">
    <?php get_template_part('partials/category-select'); ?>
    <?php if ( have_posts() ) { ?>
      <div class="posts-con">
        <?php while ( have_posts() ) { the_post(); ?>
          <?php get_template_part('partials/recent-posts'); ?>
        <?php } ?>
      </div>
      <?php FigHelpers::pagination(); ?>
    <?php } ?>
  </div>
</section>

<?php get_footer(); ?>
