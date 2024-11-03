<?php
  $bg_img = get_field('small_hero_background_image');
  $title = get_field('small_hero_title');
?>

<section class="small-hero-wrap" style="background-image: url(<?php echo $bg_img['url']; ?>)">
  <div class="outer-container">
    <?php if ( $title ) { ?>
      <h1 class="page-title"><?php echo $title; ?></h1>
    <?php } ?>
  </div>
</section>
