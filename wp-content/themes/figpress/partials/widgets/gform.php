<?php

/**
 * Gravity Form Widget
 */

// Split a string by space & split to class/ID
$classes = explode(" ", get_field('fig_widget_class', $widget_id));
$attrClass = "class='fig-widget-gform-wrap";
$attrID = "";
foreach ( $classes as $class ) {
  if ( strpos($class, ".") !== false ) {
    $attrClass .=  " " . str_replace(".", "", $class);
  } else {
    $attrID = "id='" . str_replace("#", "", $class) . "'";
  }
}
$attrClass .= "'";

?>

<section <?php echo $attrID; ?> <?php echo $attrClass; ?>>

    <div class="section-header">
      <?php if( get_field('fig_widget_title', $widget_id) ) { ?>
        <h2 class="section-title"><?php the_field('fig_widget_title', $widget_id); ?></h2>
      <?php } ?>

      <?php if( get_field('fig_widget_subtitle', $widget_id) ) { ?>
        <h4 class="section-subtitle"><?php the_field('fig_widget_subtitle', $widget_id); ?></h4>
      <?php } ?>
    </div>

    <div class="fig-widget-gform">
      <?php
        $form = get_field('fig_widget_gform_form', $widget_id);
        gravity_form_enqueue_scripts($form->id, true);
        // gravity_form(formID, title, description, ajax, '', true, tabindex);
        gravity_form($form->id, false, false, true, '', true, 1);
      ?>
    </div>

</section>
