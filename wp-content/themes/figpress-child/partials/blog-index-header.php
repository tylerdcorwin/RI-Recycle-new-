<?php
  $bg_img = get_field('fig_blog_hero_image', 'option');
  $title = get_field('fig_blog_hero_title', 'option');
?>

<section class="small-hero-wrap" style="background-image: url(<?php echo $bg_img['url']; ?>)">
  <div class="outer-container">
    <?php if ( $title ) { ?>
      <h1><?php echo $title; ?></h1>
    <?php } ?>
  </div>
</section>
