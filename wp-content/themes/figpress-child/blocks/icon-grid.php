<?php
  $icon_grid_tagline = get_field('icon_grid_tagline');
  $icon_grid_title = get_field('icon_grid_title');
  $icon_grid_link = get_field('icon_grid_link');
?>

<section class="icon-grid-wrap">
  <div class="outer-container">
    <?php if( $icon_grid_tagline ) { ?>
      <h5><?php echo $icon_grid_tagline; ?></h5>
    <?php } if ( $icon_grid_title ) { ?>
      <h3><?php echo $icon_grid_title; ?></h3>
    <?php } if ( have_rows('grid_items') ) { ?>
      <div class="icon-grid">
        <?php while ( have_rows('grid_items') ) { the_row();
          $grid_image = get_sub_field('grid_icon');
          $grid_image_url = $grid_image['url'];
          $grid_image_alt = $grid_image['alt'];
          ?>
          <?php if ( $grid_image ) { ?>
            <img class="icon-img" src="<?php echo $grid_image_url ?>" alt="<?php echo $grid_image_alt ?>" />
          <?php } ?>
        <?php } ?>
      </div>
    <?php } ?>
    <?php if ( $icon_grid_link['label'] ) { ?>
      <div class="btn-con">
        <?php FigChildHelpers::get_links($icon_grid_link, 'fig-btn-orange'); ?>
      </div>
    <?php } ?>
  </div>
</section>
