<?php if ( have_rows('statistics') ) { ?>
  <section class="statistics-wrap">
    <?php while ( have_rows('statistics') ) { the_row();
      $number      = get_sub_field('statistic_number');
      $label       = get_sub_field('statistic_label');
      $description = get_sub_field('statistic_description');
    ?>
      <div class="statistic">
        <?php if ( $number ) { ?>
          <span class="statistic-number"><?php echo $number; ?></span>
        <?php } if ( $label ) { ?>
          <b><?php echo $label; ?></b>
        <?php } if ( $description ) { ?>
          <p><?php echo $description; ?></p>
        <?php } ?>
      </div>
    <?php } ?>
  </section>
<?php } ?>