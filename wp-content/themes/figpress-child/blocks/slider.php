<?php
  $slider_title = get_field('slider_title');
  $nav_count = 0;
  $slide_count = 0;
?>

<section class="slider-wrap">
  <div class="outer-container">
    <?php if ( $slider_title ) { ?>
      <h1 class="slider-title"><?php echo $slider_title; ?></h1>
    <?php } ?>
    <?php if ( have_rows('slider_slides') ) { ?>
      <div class="slider-nav-container">
        <?php while ( have_rows('slider_slides') ) { the_row();
          $slide_title = get_sub_field('slide_title');
          ?>
          <?php if ( $slide_title ) { ?>
            <h5 class="slide-title" data-nav-count="<?php echo $nav_count; ?>"><?php echo $slide_title; ?></h5>
          <?php } ?>
        <?php $nav_count++; } ?>
      </div>
    <?php } ?>
    <?php if ( have_rows('slider_slides') ) { ?>
      <div class="slider-container">
        <?php while ( have_rows('slider_slides') ) { the_row();
          $slide_title = get_sub_field('slide_title');
          $slide_desc = get_sub_field('slide_description');
          $slide_btn = get_sub_field('slide_button');
          $slide_img = get_sub_field('slide_image');
          $slide_img_url = $slide_img['url'];
          $slide_img_alt = $slide_img['alt'];
          ?>
          <div class="indiv-slide" data-slide-count="<?php echo $slide_count; ?>">
            <div class="slide-content">
              <?php if ( $slide_title ) { ?>
                <h3><?php echo $slide_title; ?></h3>
              <?php } ?>
              <?php if ( $slide_desc ) { ?>
                <p><?php echo $slide_desc; ?>
              <?php } ?>
              <?php if ( $slide_btn['label'] ) {
                FigChildHelpers::get_links($slide_btn, 'fig-btn');
              } ?>
            </div>
            <div class="slide-image">
              <?php if ( $slide_img ) { ?>
                <img class="slide-img" src="<?php echo $slide_img_url; ?>" alt="<?php echo $slide_img_alt; ?>" />
              <?php } ?>
            </div>
          </div>
        <?php $slide_count++; } ?>
      </div>
    <?php } ?>
  </div>
</section>
