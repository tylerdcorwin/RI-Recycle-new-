<?php
if( have_rows('fig_splash') ):
  while ( have_rows('fig_splash') ) : the_row();

    if( get_row_layout() == 'fig_hero_callout' ):
      if( get_sub_field('fig_hero_callout_template') == 'default' ):
        get_template_part( 'partials/modules/hero-callout' );
      else:
        get_template_part( 'partials/template/' . get_sub_field('fig_hero_callout_template') );
      endif;

    elseif( get_row_layout() == 'fig_wysiwyg' ):
      get_template_part( 'partials/modules/wysiwyg' );

    elseif( get_row_layout() == 'fig_iconslider' ):
      get_template_part( 'partials/modules/iconslider' );

    endif;

  endwhile;

else :

  // no layouts found

endif;
?>
