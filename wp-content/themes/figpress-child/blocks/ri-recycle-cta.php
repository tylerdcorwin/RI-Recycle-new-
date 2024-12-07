<?php
  $title = get_field('recycle_cta_title');
  $btn = get_field('recycle_cta_button');
?>

<section class="recycle-cta-wrap" data-aos="fade-up">
  <div class="outer-container">
    <div class="cta-con">
      <?php if ( $title ) { ?>
        <h4><?php echo $title; ?></h4>
      <?php } ?>
      <?php if ( $btn['label'] ) { ?>
        <div class="btn-con">
          <?php FigChildHelpers::get_links($btn, 'fig-btn'); ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
