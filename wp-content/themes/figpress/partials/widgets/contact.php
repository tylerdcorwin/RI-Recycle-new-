<?php

/**
 * Social Links Widget
 */

// Split a string by space & split to class/ID
$classes = explode(" ", get_field('fig_widget_class', $widget_id));
$attrClass = "class='fig-widget-contact-wrap";
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

    <div class="fig-widget-contact">
      <?php
      if( have_rows('fig_contact', 'option') ):
        while( have_rows('fig_contact', 'option') ) : the_row();
          echo "<p>";
          the_sub_field('fig_location_name');
          echo "</p>";

          if( have_rows('fig_location_information', 'option') ):
            while ( have_rows('fig_location_information', 'option') ) : the_row();
              if( get_row_layout() == 'fig_location_phone' ):
                echo "<p>";
                  echo "<a href='tel:" . get_sub_field('fig_phone') . "'>";
                    $number = str_split( get_sub_field('fig_phone'), 3 );
                    echo "(" . $number[0] . ") " . $number[1] . "-" . $number[2] . $number[3];
                  echo "</a>";
                echo "</p>";
              endif;
              if( get_row_layout() == 'fig_location_fax' ):
                echo "<p>";
                  the_sub_field('fig_fax');
                echo "</p>";
              endif;
              if( get_row_layout() == 'fig_location_email' ):
                echo "<p>";
                  echo "<a href='mailto:" . get_sub_field('fig_email') . "'>";
                    the_sub_field('fig_email');
                  echo "</a>";
                echo "</p>";
              endif;
              if( get_row_layout() == 'fig_location_address' ):
                $location = get_sub_field('fig_address');
                echo "<div class='fig-map'>";
                  echo "<div class='marker' data-lat='" . $location['lat'] . "' data-lng='" . $location["lng"] . "'>";
                    echo "<p>" . $location['address'] . "</p>";
                  echo "</div>";
                echo "</div>";
              endif;

            endwhile;
          endif;

        endwhile;
      endif;

      ?>
    </div>

</section>
