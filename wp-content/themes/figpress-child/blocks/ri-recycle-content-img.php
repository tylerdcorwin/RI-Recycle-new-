<?php
  // True = image left content right
  $orientation = get_field('recycle_content_img_orientation');
  $content_style = get_field('recycle_content_img_content_style');
  $content = get_field('recycle_content_img_content');
  $cta_pre_title = get_field('recycle_content_img_cta_pre_title');
  $cta_title = get_field('recycle_content_img_cta_title');
  $cta_content = get_field('recycle_content_img_cta_content');
  $cta_btn = get_field('recycle_content_img_cta_button');
  $img = get_field('recycle_content_img_image');
?>

<section class="recycle-content-img-wrap" data-aos="fade-up">
  <div class="outer-container">
    <div class="content-img-con <?php echo $orientation ? 'img-left' : ''; ?>">
      <div class="content-con">
        <?php if ( $content && !$content_style ) { ?>
          <p class="text-style"><?php echo $content; ?></p>
        <?php } ?>
        <?php if ( $content_style ) { ?>
          <?php if ( $cta_pre_title ) { ?>
            <p class="pre-title"><?php echo $cta_pre_title; ?></p>
          <?php } ?>
          <?php if ( $cta_title ) { ?>
            <h3><?php echo $cta_title; ?></h3>
          <?php } ?>
          <?php if ( $cta_content ) { ?>
            <p class="cta-content"><?php echo $cta_content; ?></p>
          <?php } ?>
          <?php if ( $cta_btn ) {
            $link_url = $cta_btn['url'];
            $link_title = $cta_btn['title'];
            $link_target = $cta_btn['target'] ? $cta_btn['target'] : '_self';
            ?>
            <a class="fig-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
          <?php } ?>
        <?php } ?>
      </div>
      <?php if ( $img ) { ?>
        <div class="img-con">
          <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
        </div>
      <?php } ?>
    </div>
  </div>
</section>
