<?php
global $post;
$blog_title = get_field('blog_feed_title');
$selected_posts = get_field('blog_feed_choose_post');
$blog_button = get_field('blog_feed_button');

?>

<section class="blog-feed-wrap blog-index">
  <div class="outer-container">
    <?php if( $blog_title ) { ?>
      <h3><?php echo $blog_title; ?></h3>
    <?php } ?>
    <?php
        if( $selected_posts ) { ?>
          <div class="posts-con">
            <?php
            foreach( $selected_posts as $post ) {
              setup_postdata($post);
                  $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];
                  if( !$featured_image ) {
                    $featured_image = get_field('fig_default_blog_image', 'option');
                  }
                ?>
                <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="indiv-blog blog-page">
                  <div class="post-image" style="background-image: url(<?php echo $featured_image; ?>)"></div>
                  <div class="post-details">
                    <h4><?php echo get_the_title(); ?></h4>
                  <?php
                    $content_for_excerpt = FigChildHelpers::checkForBlock($post->post_content, 'acf/wysiwyg');
                  ?>
                    <p><?php echo FigHelpers::excerpt( $content_for_excerpt, 16, ' ...' ); ?></p>
                    <span class="fig-text-btn" href="<?php the_permalink(); ?>">Read More</span>
                  </div>
                </a>
              <?php } wp_reset_postdata(); ?>
        </div>
      <?php } ?>
      <?php if( $blog_button['label'] ) { ?>
        <div class="btn-con">
          <?php FigChildHelpers::get_links($blog_button, 'fig-btn'); ?>
        </div>
      <?php } ?>
  </div>
</section>
