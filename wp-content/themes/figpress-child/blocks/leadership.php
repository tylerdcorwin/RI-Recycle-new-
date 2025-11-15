<?php
  $title = get_field('leadership_title');
  $btn = get_field('leadership_button');
  $count = 0;
?>

<section class="leadership-wrap">
  <div class="outer-container">
    <?php if ( $title ) { ?>
      <h3><?php echo $title; ?></h3>
    <?php } ?>
    <?php if ( have_rows('leadership') ) { ?>
      <div class="leadership-con">
        <?php while ( have_rows('leadership') ) { the_row();
          $img = get_sub_field('leader_image');
          $name = get_sub_field('leader_name');
          $position = get_sub_field('leader_position');
          $email = get_sub_field('leader_email_address');
          $bio = get_sub_field('leader_bio');
          ?>
          <div class="indiv-leader">
            <?php if ( $img ) { ?>
              <div class="leader-img" style="background-image: url('<?php echo $img['url']; ?>')"></div>
            <?php } ?>
            <?php if ( $name ) { ?>
              <h4><?php echo $name; ?></h4>
            <?php } ?>
            <?php if ( $position ) { ?>
              <h6><?php echo $position; ?></h6>
            <?php } ?>
            <?php if ( $email ) { ?>
              <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            <?php } ?>
            <?php if ( $bio ) { ?>
              <p class="open-bio" data-bio="<?php echo $count; ?>">Learn More</p>
            <?php } ?>
          </div>
          <?php if ( $bio ) { ?>
            <div class="leader-bio" data-open="<?php echo $count; ?>">
              <div class="bio-con">
                <?php if ( $img ) { ?>
                  <div class="bio-img" style="background-image: url('<?php echo $img['url']; ?>')"></div>
                <?php } ?>
                <div class="bio-content">
                  <span class="close-bio"></span>
                  <?php if ( $name ) { ?>
                    <h3><?php echo $name; ?></h3>
                  <?php } ?>
                  <?php if ( $position ) { ?>
                    <h6><?php echo $position; ?></h6>
                  <?php } ?>
                  <p><?php echo $bio; ?></p>
                  <?php if ( $email ) { ?>
                    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php $count++; } ?>
      </div>
    <?php } ?>
    <?php if ( $btn ) { ?>
      <div class="btn-con">
        <?php FigChildHelpers::get_links($btn, 'fig-btn'); ?>
      </div>
    <?php } ?>
  </div>
</section>
