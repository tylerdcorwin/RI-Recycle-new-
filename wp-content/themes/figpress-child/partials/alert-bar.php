<?php
  $banner_close = get_field('header_banner_close_option', 'option');
  $banner_text = get_field('header_banner_text', 'option');
  $banner_url = get_field('header_banner_url', 'option');
  $banner_color = get_field('header_banner_color', 'option');
  $banner_cookie = get_field('header_banner_close_option', 'option');
  $banner_styles = '';
  $banner_class = '';
  $text_styles = '';

  if ( $banner_cookie === 'yes' ) {
    $banner_class = 'cookied ';
  }

  if ( $banner_color != 'custom' ) {
    $banner_class = $banner_class . ' ' . $banner_color;
  } else {
    $custom_banner_color = get_field('header_banner_custom_banner_color', 'option');
    $custom_text_color = get_field('header_banner_custom_text_color', 'option');
    $banner_styles = 'background-color: ' . $custom_banner_color;
    $text_styles = 'color: ' . $custom_text_color;
  }
?>

<div class="alert-bar <?php echo $banner_class; ?>" style="<?php echo $banner_styles; ?>">
  <div class="banner-con">
    <a href="<?php echo $banner_url; ?>" class="banner-btn" style="<?php echo $text_styles; ?>"><?php echo $banner_text; ?></a>
    <span class="close-banner"></span>
  </div>
</div>
