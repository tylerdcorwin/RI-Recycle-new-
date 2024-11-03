<?php get_header(); ?>
<?php if ( have_posts() ) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php
          get_template_part('partials/blog-header');
        ?>
          <div class="post-wrapper">
            <?php the_content(); ?>
          </div>
      <?php endwhile; ?>
    </article>

<?php endif; ?>

<?php get_template_part('partials/related-posts'); ?>
<?php get_footer(); ?>
