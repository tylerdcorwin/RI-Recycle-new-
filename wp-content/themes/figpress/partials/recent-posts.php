<?php
  $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];
  if( !$featured_image ) {
    $featured_image = site_url() . '/wp-content/themes/figpress-child/src/img/logo.svg';
  }
?>
<div id="post-<?php the_ID(); ?>" class="indiv-blog">
  <a class="post-image" href=<?php the_permalink(); ?> style="background-image: url(<?php echo $featured_image; ?>)"></a>
  <span class="date"><?php echo get_the_date(get_option('date_format')); ?></span>
  <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
  <p><?php echo FigHelpers::excerpt( get_the_excerpt(), 24, ' ...' ); ?></p>
  <a class="fig-btn" href="<?php the_permalink(); ?>">Read More</a>
</div>
