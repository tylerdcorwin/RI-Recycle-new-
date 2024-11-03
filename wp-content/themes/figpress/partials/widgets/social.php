<?php

/**
 * Social Links Widget
 */

// Split a string by space & split to class/ID
$classes = explode(" ", get_field('fig_widget_class', $widget_id));
$attrClass = "class='fig-widget-social-wrap";
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

    <div class="fig-widget-social">
      <?php get_template_part( 'partials/option-social' ); ?>
    </div>

</section>
