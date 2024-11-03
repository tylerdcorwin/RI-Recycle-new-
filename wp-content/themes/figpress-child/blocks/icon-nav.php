<?php
  $style = get_field('fig_icon_nav_style');
  $tagline = get_field('fig_icon_nav_tagline');
  $title = get_field('fig_icon_nav_title');
  $btn = get_field('fig_icon_nav_button');
?>

<section class="icon-nav-wrap">
  <div class="outer-container">
    <div class="inner-container">
      <?php if ( $tagline ) { ?>
        <h5><?php echo $tagline; ?></h5>
      <?php } ?>
      <?php if ( $title ) { ?>
        <h3><?php echo $title; ?></h3>
      <?php } ?>
    </div>
    <?php if ( have_rows('fig_icon_nav_icons') ) { ?>
      <div class="icon-nav-con">
        <?php while( have_rows('fig_icon_nav_icons') ) { the_row();
          $icon = get_sub_field('fig_icon_nav_image');
          $icon_title = get_sub_field('fig_icon_nav_image_title');
          $desc = get_sub_field('fig_icon_nav_description');
          $link = get_sub_field('fig_icon_nav_link');
          ?>
          <div class="indiv-icon-nav <?php echo $style; ?>">
            <?php if ( $icon ) { ?>
              <div class="icon-con">
                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
              </div>
            <?php } ?>
            <?php if ( $icon_title ) { ?>
              <h4><?php echo $icon_title; ?></h4>
            <?php } ?>
            <?php if ( $desc ) { ?>
              <p><?php echo $desc; ?></p>
            <?php } ?>
            <?php if ( $link ) {
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="fig-text-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
    <?php if ( $btn ) { ?>
      <div class="btn-con">
        <?php FigChildHelpers::get_links($btn, 'fig-btn'); ?>
      </div>
    <?php } ?>
  </div>
</section>
