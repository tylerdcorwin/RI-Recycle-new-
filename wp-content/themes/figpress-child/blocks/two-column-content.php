<?php
  $left_column = get_field('left_column');
  $right_column = get_field('right_column');
?>

<section class="wysiwyg-content-wrap">
  <div class="outer-container">
    <div class="wysiwyg-content-area two-column-wrap">
      <?php if( $left_column ) { ?>
        <div class="left-column">
          <?php echo $left_column; ?>
        </div>
      <?php } ?>
      <?php if( $right_column ) { ?>
        <div class="right-column">
          <?php echo $right_column; ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
