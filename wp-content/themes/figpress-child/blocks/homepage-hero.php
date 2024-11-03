<?php
  $featured_img       = get_field('hero_callout_background_image');
  $hero_title         = get_field('hero_callout_title');
  $hero_subtitle      = get_field('hero_callout_subtitle');
  $hero_video         = get_field('hero_callout_video_link');
  $hero_video_btn     = get_field('hero_callout_video_button_text');
  $hero_ambient_video = get_field('hero_callout_ambient_video');
  $the_featured_img   = $featured_img ?: get_stylesheet_directory_uri() . '/src/img/default-bg-img.jpg';
?>

<section class="hero-callout-wrap" <?php if ( $hero_video ) { ?>data-ambient-video="<?php echo $hero_ambient_video; } ?>" style="background-image: url(<?php echo $the_featured_img; ?>)">
  <div class="outer-container">
    <div class="ambient-vid"></div>
    <div class="hero-content-con">
      <?php if ( $hero_title ) { ?>
        <h1 class="hero-title"><?php echo $hero_title; ?></h1>
      <?php } ?>
      <?php if ( $hero_subtitle ) { ?>
        <p class="hero-subtitle"><?php echo $hero_subtitle; ?></p>
      <?php } ?>
      <?php if ( $hero_video ) { ?>
        <div data-video-source="<?php echo $hero_video; ?>" class="play-video-homepage">
          <span class="play-arrow"></span>
          <?php if ( $hero_video_btn ) { ?>
            <p><?php echo $hero_video_btn; ?></p>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
