<?php
  $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];
  if( !$featured_image ) {
    $featured_image = get_field('fig_default_blog_image', 'option')['url'];
  }
?>

<section class="small-hero-wrap" style="background-image: url(<?php echo $featured_image; ?>)">
  <div class="outer-container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <?php if ( get_the_category_list() !== '' ) { ?>
      <p class="hero-subtitle blog-info">
        Categories: <?php echo get_the_category_list(', '); ?>
      </p>
    <?php } ?>
  </div>
</section>
