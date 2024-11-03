<?php

get_header();

?>

<?php
if (is_home() && get_option('page_for_posts') ) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
    $featured_image_url = $img[0];
}
?>

<?php if ( $featured_image_url ) : ?>
  <div class="blog-hero" style="background-image: url(<?php echo $featured_image_url ?>)"></div>
<?php endif; ?>

<div class="mobile-category">
  <form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
      <?php
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
  </form>
</div>

<section class="blog-index">
  <div class="outer-container">
    <?php if ( have_posts() ) : ?>
      <h1 class="page-title">Blog</h1>
      <div class="posts-con">
        <?php while ( have_posts() ) { the_post(); ?>
          <?php get_template_part('partials/recent-posts'); ?>
        <?php } ?>
      </div>
      <?php FigHelpers::pagination(); ?>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
