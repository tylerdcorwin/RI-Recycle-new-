<?php get_header(); ?>
<?php if ( have_posts() ) : ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="ri-blog-header">

      </div>
      <div class="ri-post-wrapper container_inner">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_id()) ?>" alt="blog-featured-image" class="ri-blog-img">
        <h2><?php the_title(); ?></h2>
        <div class="ri-post-details">
          <p>By: <?php the_author(); ?></p>
          <p>Published: <?php echo get_the_date('j M. Y'); ?></p>
        </div>

        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  </article>

<?php endif; ?>

<?php get_footer(); ?>
