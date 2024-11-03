<?php
  $bg_img = get_field('lp_hero_overlap_form_background_image');
  $title = get_field('lp_hero_overlap_form_title');
  $subtitle = get_field('lp_hero_overlap_form_subtitle');
  $form_title = get_field('lp_hero_overlap_form_form_title');
  $form = get_field('lp_hero_overlap_form');
?>

<section class="lp-hero-overlap-form-wrap" style="background-image: url('<?php echo $bg_img['url']; ?>')">
  <div class="outer-container">
    <div class="hero-overlap-form-con">
      <div class="content-con">
        <?php if ( $title ) { ?>
          <h1><?php echo $title; ?></h1>
        <?php } ?>
        <?php if ( $subtitle ) { ?>
          <p><?php echo $subtitle; ?></p>
        <?php } ?>
      </div>
      <?php if ( $form ) { ?>
        <div class="form-con">
          <?php if ( $form_title ) { ?>
            <h3><?php echo $form_title; ?></h3>
          <?php } ?>          
          <?php
            gravity_form_enqueue_scripts($form->{'id'}, true);
            gravity_form($form->{'id'}, false, false, false, '', false, 1);
          ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
