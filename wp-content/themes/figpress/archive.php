<?php

get_header();

?>

  <div class="container">
    <section class="row">

      <div class="col-xs-12">
        <?php if ( have_posts() ) : ?>

          <header class="page-header">
            <h1 class="page-title"><?php the_archive_title(); ?></h1>
            <?php
              // Show an optional term description.
              $term_description = term_description();
              if ( ! empty( $term_description ) ) :
                printf( '<div class="taxonomy-description">%s</div>', $term_description );
              endif;
            ?>
          </header><!-- .page-header -->

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12'); ?>>

              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <span class="date"><?php echo get_the_date(get_option('date_format')); ?></span>
              <span class="time"><?php echo get_the_time(get_option('time_format')); ?></span>
              <?php the_content(); ?>

            </article>
          <?php endwhile; ?>
          <?php FigHelpers::pagination(); ?>


        <?php endif; ?>
      </div> <?php // col ?>

    </section>
  </div><?php // container ?>

<?php get_footer(); ?>