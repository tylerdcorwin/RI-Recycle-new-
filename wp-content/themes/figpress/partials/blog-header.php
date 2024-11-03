<?php
  $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];
  if( !$featured_image ) {
    $featured_image = get_field('fig_default_blog_image', 'option');
  }
?>

<section class="small-hero" style="background-image: url(<?php echo $featured_image; ?>)">
  <div class="outer-container">
    <h1 class="page-title"><?php the_title(); ?></h1>
      <p class="hero-subtitle blog-info">
        <!-- <?php //echo get_the_time(get_option('date_format')); ?> | -->
        Categories: <?php echo get_the_category_list(', '); ?>
      </p>
  </div>
</section>
