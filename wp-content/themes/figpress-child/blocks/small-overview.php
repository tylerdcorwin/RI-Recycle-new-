<?php
  $orientation = get_field('overview_text_orientation');
  $bg_color = get_field('overview_background_color');
  $overview_title = get_field('overview_title');
  $overview_subtext = get_field('overview_subtext');
?>

<section class="small-overview-wrap <?php echo $bg_color; ?>">
  <div class="outer-container">
    <div class="small-overview <?php echo $orientation; ?>">
      <?php if( $overview_title ) { ?>
        <h3><?php echo $overview_title; ?></h3>
      <?php } if( $overview_subtext ) { ?>
        <p><?php echo $overview_subtext; ?></p>
      <?php } ?>
    </div>
  </div>
</section>
