<?php
  $sub_header = get_field('ri_recycle_sub_header');
  $title = get_field('ri_recycle_title');
  $btn = get_field('ri_recycle_button');
  $img = get_field('ri_recycle_hero_image');
?>

<section class="ri-recycle-hero-wrap">
  <div class="outer-container">
    <div class="content-con">
      <?php if ( $sub_header ) { ?>
        <h5><?php echo $sub_header; ?></h5>
      <?php } ?>
      <?php if ( $title ) { ?>
        <h1><?php echo $title; ?></h1>
      <?php } ?>
    </div>
    <?php if ( have_rows('ri_recycle_floating_text') ) { ?>
      <div class="floating-text-con">
        <?php while ( have_rows('ri_recycle_floating_text') ) { the_row();
          $text = get_sub_field('ri_recycle_text');
          ?>
          <div class="indiv-text">
            <p><?php echo $text; ?></p>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
  <?php if ( $img['url'] ) { ?>
    <div class="hero-image" style="background-image: url('<?php echo $img['url']; ?>')"></div>
  <?php } ?>
  <div class="outer-container">
    <?php if ( $btn ) { ?>
      <div class="btn-con">
        <?php FigChildHelpers::get_links($btn, 'fig-btn'); ?>
      </div>
    <?php } ?>
  </div>
</section>
