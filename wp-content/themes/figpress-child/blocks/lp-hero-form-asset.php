<?php
  $bg_img = get_field('lp_hero_form_asset_background_image');
  $title = get_field('lp_hero_form_asset_title');
  $subtitle = get_field('lp_hero_form_asset_subtitle');
  $form = get_field('lp_hero_form_asset_form');
  $asset_img = get_field('lp_hero_form_asset_image');
?>

<section class="lp-hero-form-asset-wrap" style="background-image: url('<?php echo $bg_img['url']; ?>')">
  <div class="outer-container">
    <div class="form-asset-con">
      <div class="content-con">
        <?php if ( $title ) { ?>
          <h1><?php echo $title; ?></h1>
        <?php } ?>
        <?php if ( $subtitle ) { ?>
          <p><?php echo $subtitle; ?></p>
        <?php } ?>
        <?php if ( $form ) { ?>
          <div class="form-con">
            <?php
              gravity_form_enqueue_scripts($form->{'id'}, true);
              gravity_form($form->{'id'}, false, false, false, '', false, 1);
            ?>
          </div>
        <?php } ?>
      </div>
      <?php if ( $asset_img ) { ?>
        <div class="asset-con">
          <img src="<?php echo $asset_img['url']; ?>" alt="<?php echo $asset_img['alt']; ?>" />
        </div>
      <?php } ?>
    </div>
  </div>
</section>
