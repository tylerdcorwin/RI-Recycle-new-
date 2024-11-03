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
          the_sub_field('fig_phone');
          echo "</p>";
        endif;
        if( get_row_layout() == 'fig_location_fax' ):
          echo "<p>";
          the_sub_field('fig_fax');
          echo "</p>";
        endif;
        if( get_row_layout() == 'fig_location_email' ):
          echo "<p>";
          the_sub_field('fig_email');
          echo "</p>";
        endif;
        if( get_row_layout() == 'fig_location_address' ):
          $location = get_sub_field('fig_address');
        echo "<p>";
          echo $location['address'];
        echo "<br>";
          echo "Lat: " . $location['lat'];
        echo "<br>";
          echo "Lng: " . $location['lng'];
        echo "</p>";

        endif;

      endwhile;
    endif;

  endwhile;
endif;

?>