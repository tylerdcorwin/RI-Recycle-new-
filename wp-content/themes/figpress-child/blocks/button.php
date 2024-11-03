<?php
  $content_button = get_field('content_button');
  $content_button_alignment = get_field('content_button_alignment');
  if ($content_button) {
?>
  <section class="btn-wrap">
    <div class="outer-container">
      <div class="btn-con <?php echo $content_button_alignment ?>">
        <?php FigChildHelpers::get_links($content_button, 'fig-btn'); ?>
      </div>
    </div>
  </section>
<?php } ?>
