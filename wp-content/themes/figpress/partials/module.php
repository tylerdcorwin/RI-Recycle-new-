<?php
if( have_rows('fig_module') ):
  while ( have_rows('fig_module') ) : the_row();

    if( get_row_layout() == 'fig_breadcrumb' ):
      get_template_part( 'partials/modules/breadcrumb' );


    elseif( get_row_layout() == 'fig_pheader' ):
      get_template_part( 'partials/modules/header' );


    elseif( get_row_layout() == 'fig_wysiwyg' ):
      get_template_part( 'partials/modules/wysiwyg' );


    elseif( get_row_layout() == 'fig_query' ):
      if( get_sub_field('fig_query_template') == 'default' ):
        get_template_part( 'partials/modules/query' );
      else:
        get_template_part( 'partials/modules/template/' . get_sub_field('fig_query_template') );
      endif;


    elseif( get_row_layout() == 'fig_postobject' ):
      if( get_sub_field('fig_postobject_template') == 'default' ):
        get_template_part( 'partials/modules/post-object' );
      else:
        get_template_part( 'partials/modules/template/' . get_sub_field('fig_postobject_template') );
      endif;


    elseif( get_row_layout() == 'fig_cta' ):
      if( get_sub_field('fig_cta_template') == 'default' ):
        get_template_part( 'partials/modules/cta' );
      else:
        get_template_part( 'partials/modules/template/' . get_sub_field('fig_cta_template') );
      endif;


    elseif( get_row_layout() == 'fig_tabs' ):
      get_template_part( 'partials/modules/tabs' );


    elseif( get_row_layout() == 'fig_pingpong' ):
      get_template_part( 'partials/modules/ping-pong' );


    elseif( get_row_layout() == 'fig_iconnav' ):
      if( get_sub_field('fig_iconnav_template') == 'default' ):
        get_template_part( 'partials/modules/icon-nav' );
      else:
        get_template_part( 'partials/modules/template/' . get_sub_field('fig_iconnav_template') );
      endif;


    elseif( get_row_layout() == 'fig_contact' ):
      get_template_part( 'partials/modules/contact' );


    elseif( get_row_layout() == 'fig_map' ):
      get_template_part( 'partials/modules/map' );


    elseif( get_row_layout() == 'fig_hero_callout' ):
      if( get_sub_field('fig_hero_callout_template') == 'default' ):
        get_template_part( 'partials/modules/hero-callout' );
      else:
        get_template_part( 'partials/modules/template/' . get_sub_field('fig_hero_callout_template') );
      endif;


    elseif( get_row_layout() == 'fig_iconslider' ):
      if( get_sub_field('fig_iconslider_template') == 'default' ):
        get_template_part( 'partials/modules/icon-slider' );
      else:
        get_template_part( 'partials/modules/template/' . get_sub_field('fig_iconslider_template') );
      endif;


    elseif( get_row_layout() == 'fig_slideshow' ):
      if( get_sub_field('fig_slideshow_template') == 'default' ):
        get_template_part( 'partials/modules/slideshow' );
      else:
        get_template_part( 'partials/modules/template/' . get_sub_field('fig_slideshow_template') );
      endif;
    endif;


  endwhile;

else :

  echo "<p>Start by adding modules.</p>";

endif;
?>
