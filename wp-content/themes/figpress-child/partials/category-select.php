<?php
  $tagline = get_field('fig_blog_filter_tagline', 'option');
  $title = get_field('fig_blog_filter_title', 'option');
?>

<div class="mobile-category">
  <div class="content-con">
    <?php if ( $tagline ) { ?>
      <h5><?php echo $tagline; ?></h5>
    <?php } ?>
    <?php if ( $title ) { ?>
      <h3><?php echo $title; ?></h3>
    <?php } ?>
  </div>
  <div class="form-filters">
    <p>Sort By:</p>
    <div class="form-wrapper">
      <form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <div class="selects-arrow">
          <?php
            $args_name  = 'cat';
            $args_tax   = 'category';
            $mobileArgs = array(
              'show_option_none' => __( 'Select category', 'textdomain' ),
              'orderby'          => 'name',
              'echo'             => 0,
            );
          ?>
            <?php $select  = wp_dropdown_categories( $mobileArgs ); ?>
            <?php $replace = "<select$1>"; ?>
            <?php $select  = preg_replace( '#<select([^>]*)>#', $replace, $select ); ?>
            <?php echo $select; ?>
        </div>
        <input type="submit" value="filter" class="fig-btn">
      </form>
    </div>
  </div>
</div>
