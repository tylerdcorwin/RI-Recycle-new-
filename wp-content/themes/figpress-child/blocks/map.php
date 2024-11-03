<section class="fig-map-wrap">
  <div class="fig-map">
    <?php if( have_rows('fig_map_markers') ) : ?>
      <?php while ( have_rows('fig_map_markers') ) : the_row();
            $location = get_sub_field('fig_map_marker');
            $location_content = get_sub_field('fig_map_content');
      ?>

        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
          <?php echo $location_content; ?>
        </div>

      <?php endwhile; ?>
    <?php endif; ?>
  </div>

</section>
