<?php
$category_detail = get_the_category($post->ID);//$post->ID
foreach($category_detail as $cd){
  $single_category = $cd->cat_name;
}
$args = array(
  'post-type'       => 'post',
  'category_name'   => 'uncategorized',
  'posts_per_page'  => 3,
  'category_name'   => $single_category,
  'order_by'        => 'rand'
);

$the_query = new WP_Query( $args )
?>

<section class="blog-feed-wrap blog-index related-posts">
  <div class="outer-container">

    <h3>Related Posts</h3>

    <?php if ( $the_query->have_posts() ) { ?>
      <div class="posts-con individual-post-page">
        <?php while ( $the_query->have_posts() ) {
          $the_query->the_post();
          get_template_part('partials/recent-posts');
        } ?>
      </div>
    <?php wp_reset_postdata(); } ?>
    <div class="btn-con">
        <a class="fig-btn" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Visit our Blog</a>
    </div>
  </div>
</section>
