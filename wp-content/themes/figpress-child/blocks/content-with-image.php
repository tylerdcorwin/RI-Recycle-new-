<?php
  $orientation = get_field('content_with_image_orientation');
  $content_bg = get_field('content_with_image_bg');
  $content_title = get_field('content_title');
  $content = get_field('content_for_content_with_image');
  $content_button = get_field('button_for_content_with_image');
  $content_image = get_field('image_for_content_with_image');
?>

<section class="content-with-image-wrap <?php echo $content_bg; ?>-bg">
  <div class="outer-container">
    <div class="content-with-image <?php echo $orientation; ?>">
      <div class="image-area">
        <?php if( $content_image ) { ?>
          <img src="<?php echo $content_image['url']; ?>" alt="<?php echo $content_image['alt']; ?>" />
        <?php } ?>
      </div>
      <div class="content-area">
        <?php if ($content_title) { ?>
          <h4><?php echo $content_title; ?></h4>
        <?php } if ($content) { ?>
          <?php echo $content; ?>
        <?php } if ( $content_button['label'] ) { ?>
          <div class="btn-con">
            <?php FigChildHelpers::get_links($content_button, 'fig-btn-orange'); ?>
          </div>
        <?php } ?>
      </div>
    <div>
  </div>
</section>
