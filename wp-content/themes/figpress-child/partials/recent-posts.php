<?php
  $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];
  if ( !$featured_image ) {
    $featured_image = get_field('fig_default_blog_image', 'option')['url'];
  }
?>
<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="indiv-blog">
  <div class="post-image" style="background-image: url(<?php echo $featured_image; ?>)"></div>
  <div class="post-details">
    <h4><?php echo get_the_title(); ?></h4>
    <?php $content_for_excerpt = FigChildHelpers::checkForBlock($post->post_content, 'acf/wysiwyg'); ?>
    <p><?php echo FigHelpers::excerpt( $content_for_excerpt, 16, ' ...' ); ?></p>
    <span class="fig-text-btn" href="<?php the_permalink(); ?>">Read More</span>
  </div>
</a>
