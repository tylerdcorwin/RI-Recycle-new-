<?php

if( have_rows('fig_socials', 'option') ):
  echo "<ul class='fig-social-links'>";
  while( have_rows('fig_socials', 'option') ) : the_row();
    echo "<li>";
      echo "<a href='" . get_sub_field('fig_social_url') . "' target='_blank'>";
        echo "<i class='fa " . get_sub_field('fig_social_icon') . "'></i>";
      echo "</a>";
    echo "</li>";
  endwhile;
  echo "</ul>";
endif;

?>