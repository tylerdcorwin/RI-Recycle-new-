<?php
  $content_area = get_field('content_area');
  $full_width = get_field('content_full_width');
  print_r($full_width)
?>

<section class="wysiwyg-content-wrap" data-aos="fade-up">
  <div class="outer-container">
    <div class="wysiwyg-content-area <?php echo $full_width ? 'full-width' : ''; ?>">
      <?php if( $content_area ) { ?>
        <?php echo $content_area ?>
      <?php } ?>
    </div>
  </div>
</section>
