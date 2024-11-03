<?php
  $video_embed = get_field('video_embed');
  if( $video_embed ) {
?>
  <section class="inline-video-wrap">
    <div class="outer-container">
      <div class="inline-video">
        <?php echo $video_embed; ?>
      </div>
    </div>
  </section>
<?php } ?>
