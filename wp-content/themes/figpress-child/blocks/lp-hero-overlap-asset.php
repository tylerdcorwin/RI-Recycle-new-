<?php
  $bg_img = get_field('lp_hero_overlap_asset_background_image');
  $asset = get_field('lp_hero_overlap_asset_image');
  $title = get_field('lp_hero_overlap_asset_title');
  $subtitle = get_field('lp_hero_overlap_asset_subtitle');
  $btn = get_field('lp_hero_overlap_asset_button');
?>

<section class="lp-hero-overlap-asset-wrap" style="background-image: url('<?php echo $bg_img['url']; ?>')">
  <div class="outer-container">
    <div class="lp-hero-overlap-asset-con">
      <?php if ( $asset ) { ?>
        <div class="asset-con">
          <img src="<?php echo $asset['url']; ?>" alt="<?php echo $asset['alt']; ?>" />
        </div>
      <?php } ?>
      <div class="content-con">
        <?php if ( $title ) { ?>
          <h1><?php echo $title; ?></h1>
        <?php } ?>
        <?php if ( $subtitle ) { ?>
          <p><?php echo $subtitle; ?></p>
        <?php } ?>
        <?php if ( $btn ) { ?>
          <?php FigChildHelpers::get_links($btn, 'fig-btn-orange'); ?>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
