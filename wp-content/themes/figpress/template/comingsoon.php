<?php

/*
Template Name: Coming Soon
*/

get_header('coming-soon');

?>

<div class="container">
  <div class="row">
    <?php if ( have_posts() ) : ?>

        <section class="col-xs-12 col-md-8 col-md-push-2">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
              <?php endwhile; ?>
              <div class="fig-social-links">
                <?php get_template_part( 'partials/option-social' ); ?>
              </div>
            </article>
        </section>

    <?php endif; ?>
  </div>
</div>

<?php get_footer('coming-soon'); ?>