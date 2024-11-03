<?php
  $style = get_field('text_testimonial_style');
  $count = count( get_field('text_testimonials') );
?>

<?php if ( have_rows('text_testimonials') ) { ?>
  <section class="text-testimonial-wrap">
    <div class="outer-container">
      <div class="text-testimonial-con">
        <?php while ( have_rows('text_testimonials') ) { the_row();
          $img = get_sub_field('text_testimonial_img');
          $quote = get_sub_field('text_testimonial_quote');
          $author = get_sub_field('text_testimonial_author');
          ?>
          <div class="indiv-text-testimonial col-<?php echo $count; ?>">
            <?php if ( $style && $img ) { ?>
              <img class="img-up" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
            <?php } ?>
            <div class="quote-marks"></div>
            <?php if ( $quote ) { ?>
              <p><?php echo $quote; ?></p>
            <?php } ?>
            <?php if ( !$style && $img ) { ?>
              <div class="author-con">
                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
                <?php if ( $author ) { ?>
                  <h5><?php echo $author; ?></h5>
                <?php } ?>
              </div>
            <?php } else { ?>
              <?php if ( $author ) { ?>
                <h5><?php echo $author; ?></h5>
              <?php } ?>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>
