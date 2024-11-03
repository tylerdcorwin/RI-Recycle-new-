<?php get_header(); ?>

<?php
  $blog_hero = get_field('fig_default_blog_image', 'option');
?>

<section class="small-hero" style="background-image: url(<?php echo $blog_hero ?>)">
  <div class="outer-container">
    <h1 class="page-title">Search Results</h1>
  </div>
</section>

  <div class="outer-container">
    <div class="catchall-con search-results">
      <h3 class="search-top-text">You searched for: <?php echo get_search_query(); ?></h3>
      <?php get_search_form(); ?>
      <?php if( have_posts() ) { ?>
        <?php while( have_posts() ) { the_post(); ?>
          <div class="indiv-search-items">
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <?php
              $content_for_excerpt = FigChildHelpers::checkForBlock($post->post_content, 'acf/wysiwyg');
            ?>
            <p><?php echo FigHelpers::excerpt( $content_for_excerpt, 52, ' ...' ); ?></p>
            <a href="<?php echo the_permalink(); ?>"><?php echo the_permalink(); ?></a>
          </div>
        <?php } ?>
        <?php FigHelpers::pagination(); ?>
      <?php } else { ?>
        <h2>Sorry we couldn't find anything for "<?php echo get_search_query(); ?>". Try another search</h2>
      <?php } ?>
    </div>
  </div>

<?php get_footer(); ?>
