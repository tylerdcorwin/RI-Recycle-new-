<?php
  $content_area = get_field('content_area');
?>

<section class="wysiwyg-content-wrap" data-aos="fade-up">
  <div class="outer-container">
    <div class="wysiwyg-content-area">
      <?php if( $content_area ) { ?>
        <?php echo $content_area ?>
      <?php } ?>
    </div>
  </div>
</section>
