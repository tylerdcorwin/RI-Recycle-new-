<section class="testimonial-wrap" data-aos="fade-up">
  <?php if ( have_rows('testimonials') ) { ?>
    <div class="testimonial-container">
      <?php while ( have_rows('testimonials') ) { the_row();
        $testimonial_content = get_sub_field('testimonial_content');
        $testimonial_author  = get_sub_field('testimonial_author');
        $testimonial_bg_img  = get_sub_field('testimonial_bg_img');
        ?>
        <div class="individual-testimonial" style="background-image: url(<?php echo $testimonial_bg_img; ?>)">
          <div class="testimonial-body-wrap">
            <div class="testimonial-body">
              <?php if ($testimonial_content) { ?>
                <h4 class="testimonial-content"><?php echo $testimonial_content; ?></h4>
              <?php } if ($testimonial_author) { ?>
                <h5 class="testimonial-author"><?php echo $testimonial_author; ?></h5>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php $slide_count++; } ?>
    </div>
  <?php } ?>
</section>
