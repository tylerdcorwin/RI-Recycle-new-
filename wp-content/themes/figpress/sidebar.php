<?php if( get_field('fig_choose_sidebar') ) { ?>
  <?php dynamic_sidebar( get_field('fig_choose_sidebar') ); ?>
<?php } else { ?>
  <?php dynamic_sidebar( 'Sidebar 1' ); ?>
<?php } ?>