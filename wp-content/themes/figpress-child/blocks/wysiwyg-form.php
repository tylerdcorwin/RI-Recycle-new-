<?php
  $title = get_field('fig_wys_form_title');
  $wysiwyg = get_field('fig_half_wysiwyg');
  $form = get_field('fig_half_form');
?>

<section class="wysiwyg-form-wrap">
  <div class="outer-container">
    <?php if ( $title ) { ?>
      <h3><?php echo $title; ?></h3>
    <?php } ?>
    <div class="wysiwyg-form-con">
      <?php if ( $wysiwyg ) { ?>
        <div class="content-con">
          <?php echo $wysiwyg; ?>
        </div>
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
