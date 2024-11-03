<?php

/**
 * Query Widget
 */

$custom_query = FigQueries::get_n_pt(
  get_field('fig_widget_query_posts_per_page', $widget_id),
  get_field('fig_widget_query_post_type', $widget_id),
  get_field('fig_widget_query_order_by', $widget_id),
  get_field('fig_widget_query_order', $widget_id)
);

// Split a string by space & split to class/ID
$classes = explode(" ", get_field('fig_widget_class', $widget_id));
$attrClass = "class='fig-widget-query-wrap";
$attrID = "";
foreach ( $classes as $class ) {
  if ( strpos($class, ".") !== false ) {
    $attrClass .=  " " . str_replace(".", "", $class);
  } else {
    $attrID = "id='" . str_replace("#", "", $class) . "'";
  }
}
$attrClass .= "'";

?>

<section <?php echo $attrID; ?> <?php echo $attrClass; ?>>
<?php if ( $custom_query->have_posts() ) : ?>

    <div class="section-header">
      <?php if( get_field('fig_widget_title', $widget_id) ) { ?>
        <h2 class="section-title"><?php the_field('fig_widget_title', $widget_id); ?></h2>
      <?php } ?>

      <?php if( get_field('fig_widget_subtitle', $widget_id) ) { ?>
        <h4 class="section-subtitle"><?php the_field('fig_widget_subtitle', $widget_id); ?></h4>
      <?php } ?>
    </div>


    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post();
          $imageThumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('fig-widget-query'); ?>>

        <?php if( $imageThumb && get_field('fig_widget_query_image', $widget_id) ) { ?>
          <a href="<?php the_permalink(); ?>"><img src="<?php echo $imageThumb[0]; ?>" alt="<?php the_title(); ?>"></a>
        <?php } ?>

        <?php if( get_field('fig_widget_query_show_title', $widget_id) ) { ?>
          <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
        <?php } ?>

        <?php if( get_field('fig_widget_query_show_excerpt', $widget_id) ) { ?>
          <p><?php echo FigHelpers::excerpt( get_the_excerpt(), 24, '' ); ?></p>
        <?php } ?>

        <?php if( get_field('fig_widget_query_show_button', $widget_id) ) { ?>
          <a href="<?php the_permalink(); ?>" class="fig-btn"><?php the_field('fig_widget_query_button_text', $widget_id); ?></a>
        <?php } ?>

      </article>

    <?php endwhile; ?>

    <?php if( get_field('fig_widget_query_show_archive', $widget_id) && get_field('fig_widget_query_post_type', $widget_id) == "post" ) { ?>
      <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="fig-btn"><?php the_field('fig_widget_query_archive_text', $widget_id); ?></a>
    <?php } elseif( get_field('fig_widget_query_show_archive', $widget_id) ) { ?>
      <a href="<?php echo get_post_type_archive_link( get_field('fig_widget_query_post_type', $widget_id) ); ?>" class="fig-btn"><?php the_field('fig_widget_query_archive_text', $widget_id); ?></a>
    <?php } ?>

<?php endif; wp_reset_query(); ?>

</section>
