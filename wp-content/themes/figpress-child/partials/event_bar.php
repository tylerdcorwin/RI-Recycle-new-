<?php if( get_field('header_type', 'option') != 'off' ) { ?>
  <div class="header-bar <?php the_field('header_type', 'option') ?>">
    <?php
      $targetLink = get_field('link_no_title', 'option');
      FigChildHelpers::get_link_no_title($targetLink);
    ?>
    <div class=outer-container>
    <p><?php the_field('header_type', 'option'); ?>:</p>
    <p class="body-content"><?php the_field('header_title', 'option') ?></p>
    <p class="fig-btn">Details</p>
    <span class="close-bar">X</span>
    </div>
    </a>
  </div>

<?php } ?>
