<?php
  $title = get_field('recycle_video_archive_title');
?>

<section class="recycle-video-archive-wrap">
  <div class="outer-container">
    <?php if ( $title ) { ?>
      <h2><?php echo $title; ?></h2>
    <?php } ?>
    <?php if ( have_rows('recycle_video_archive') ) { ?>
      <div class="recycle-video-con">
        <?php while ( have_rows('recycle_video_archive') ) { the_row();
          $url = get_sub_field('recycle_video_archive_youtube_video_url');
          $video_id = FigChildHelpers::getYouTubeVideoId($url);
          if ( $video_id ) {
            $thumbURL = 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';
          } else {
            $thumbURL = 'https://img.youtube.com/vi/cKxNyAFaN1Q/mqdefault.jpg';
          }
          ?>
          <div
            class="indiv-recycle-archive-video"
            data-video-url="<?php echo $url; ?>"
            style="background-image: url('<?php echo $thumbURL; ?>')"
          ></div>

        <?php } ?>
      </div>
    <?php } ?>
  </div>
</section>
