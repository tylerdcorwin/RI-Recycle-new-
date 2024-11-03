<?php
$full_scroll_to_id = get_field('landing_page_form_scroll_to_id');
$full_width_form = get_field('fig_landing_page_form');
if ( $full_width_form ) {
?>
  <section id="<?php echo $full_scroll_to_id; ?>" class="landing-full-width-form-wrap">
    <div class="outer-container">
      <div class="landing-full-width-form">
        <?php
          gravity_form_enqueue_scripts($full_width_form->{'id'}, true);
          gravity_form($full_width_form->{'id'}, true, false, false, '', false, 1);
        ?>
      </div>
    </div>
  </section>
<?php } ?>
