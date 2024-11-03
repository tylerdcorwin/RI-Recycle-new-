<?php
  $bg_img = get_field('lp_hero_inline_video_background_image');
  $title = get_field('lp_hero_inline_video_title');
  $subtitle = get_field('lp_hero_inline_video_subtitle');
  $video_img = get_field('lp_hero_inline_video_placeholder_img');
  $video_url = get_field('lp_hero_inline_video_url');
?>

<section class="lp-hero-inline-video-wrap" style="background-image: url('<?php echo $bg_img['url']; ?>')">
  <div class="outer-container">
    <div class="content-con">
      <?php if ( $title ) { ?>
        <h1><?php echo $title; ?></h1>
      <?php } ?>
      <?php if ( $subtitle ) { ?>
        <p><?php echo $subtitle; ?></p>
      <?php } ?>
    </div>
    <?php if ( $video_url ) { ?>
      <div class="inline-video-con" style="background-image: url('<?php echo $video_img['url']; ?>')">
        <div class="inner-video-player">
          <span class="inline-play-btn" data-video-url="<?php echo $video_url; ?>"></span>
        </div>
      </div>
    <?php } ?>
  </div>
</section>
