<?php
  $headline = get_field('recycle_scrolling_num_headline');
  $mid_text = get_field('recycle_scrolling_num_middle_text_tagline');
  $end_text = get_field('recycle_scrolling_num_end_block_text');
?>

<section class="ri-recycle-scrolling-numbers-block" data-aos="fade-up">
  <div class="outer-container">
    <div class="scrolling-numbers-block-con">
      <?php if ( $headline ) { ?>
        <h3><?php echo $headline; ?></h3>
      <?php } ?>
      <?php if ( have_rows('recycle_scrolling_numbers') ) { ?>
        <div class="scrolling-number-con">
          <?php while ( have_rows('recycle_scrolling_numbers') ) { the_row();
            $num = get_sub_field('recycle_scrolling_num_number');
            $content = get_sub_field('recycle_scrolling_num_text_content');
            ?>
            <?php if ( $num ) { ?>
              <div class="number-con">
                <span class="scroll-number" data-num="<?php echo $num; ?>">0</span>
              </div>
              <?php if ( $content ) { ?>
                <p><?php echo $content; ?></p>
              <?php } ?>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>
      <?php if ( $mid_text ) { ?>
        <h4><?php echo $mid_text; ?></h4>
      <?php } ?>
      <?php if ( have_rows('recycle_scrolling_numbers_second_section') ) { ?>
        <div class="scrolling-number-con">
          <?php while ( have_rows('recycle_scrolling_numbers_second_section') ) { the_row();
            $num = get_sub_field('recycle_scrolling_num_number');
            $content = get_sub_field('recycle_scrolling_num_text_content');
            ?>
            <?php if ( $num ) { ?>
              <div class="number-con">
                <span class="scroll-number" data-num="<?php echo $num; ?>">0</span>
              </div>
              <?php if ( $content ) { ?>
                <p><?php echo $content; ?></p>
              <?php } ?>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>
      <?php if ( $end_text ) { ?>
        <h4><?php echo $end_text; ?></h4>
      <?php } ?>
    </div>
  </div>
</section>
