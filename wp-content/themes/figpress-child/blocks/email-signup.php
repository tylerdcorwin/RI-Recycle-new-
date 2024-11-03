<?php
  $title = get_field('email_signup_title');
  $subtitle = get_field('email_signup_subtitle');
  $form = get_field('email_signup_form');
?>

<section class="email-signup-wrap">
  <div class="outer-container">
    <div class="email-signup-con">
      <?php if ( $title ) { ?>
        <h3><?php echo $title; ?></h3>
      <?php } ?>
      <?php if ( $subtitle ) { ?>
        <p><?php echo $subtitle; ?></p>
      <?php } ?>
      <?php if ( $form ) { ?>
        <div class="form-con">
          <?php
            gravity_form_enqueue_scripts($form->{'id'}, true);
            gravity_form($form->{'id'}, false, false, false, '', false, 1);
          ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
