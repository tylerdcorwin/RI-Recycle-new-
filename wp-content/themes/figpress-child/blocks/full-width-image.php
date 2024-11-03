<?php
  $fw_img = get_field('full_width_image');
?>

<?php if ( $fw_img ) { ?>
  <section class="full-width-image-wrap" style="background-image: url('<?php echo $fw_img['url']; ?>')"></section>
<?php } ?>
