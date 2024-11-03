<?php
  $cta_image = get_field('cta_image');
  $cta_title = get_field('cta_title');
  $cta_subtitle = get_field('cta_subtitle');
  $cta_button = get_field('cta_button');
?>

<section class="call-to-action-wrap">
  <div class="outer-container">
    <div class="call-to-action">
      <div class="cta-img-con">
        <img src="<?php echo $cta_image['url']; ?>" alt="<?php echo $cta_image['alt']; ?>" />
      </div>
      <div class="cta-titles">
        <?php if( $cta_title ) { ?>
          <h3><?php echo $cta_title; ?></h3>
        <?php } ?>
        <?php if( $cta_subtitle ) { ?>
          <p><?php echo $cta_subtitle; ?></p>
        <?php } ?>
      </div>
        <?php if( $cta_button['label'] ) { ?>
        <div class="btn-con">
          <?php FigChildHelpers::get_links($cta_button, 'fig-trans-btn'); ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
