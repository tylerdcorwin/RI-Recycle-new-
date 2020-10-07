<?php
/**
 * Template Name: Calculator
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>


<?php
  $hero_bg_img = get_field('calc_hero_background_image');
  $hero_title = get_field('calc_hero_title');
  $hero_subtitle = get_field('calc_hero_subtitle');
  $hero_btn = get_field('calc_hero_button');
  $calculator_content = get_field('calc_content');
?>
<div class="custom-wrapper">

  <section class="calculator-hero-wrap" style="background-image: url('<?php echo $hero_bg_img['url']; ?>')">
    <div class="outer-container">
      <div class="content-con">
        <?php if ( $hero_title ) { ?>
          <h1 class="hero-title"><?php echo $hero_title; ?></h1>
        <?php } ?>
        <?php if ( $hero_subtitle ) { ?>
          <p class="hero-subtitle"><?php echo $hero_subtitle; ?></p>
        <?php } ?>
        <?php if ( $hero_btn ) {
          $link_url = $hero_btn['url'];
          $link_title = $hero_btn['title'];
          $link_target = $hero_btn['target'] ? $hero_btn['target'] : '_self';
          ?>
          <a class="ty-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php } ?>
      </div>
    </div>
  </section>

  <section class="calculator-wys-wrap">
    <div class="outer-container">
      <?php if ( $calculator_content ) { ?>
        <div class="wys-content-con">
          <?php echo $calculator_content; ?>
        </div>
      <?php } ?>
    </div>
  </section>

  <section class="calculator-wrap">
    <div class="outer-container">
      <h3>Food Waste Calculator</h3>
      <div id="calculator"></div>
    </div>
  </section>

</div>

<?php get_footer(); ?>
