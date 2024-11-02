<?php
  get_header();
  $hero_img = get_field('dashboard_archive_hero_image', 'option');
  $hero_title = get_field('dashboard_archive_title', 'option');
  $dashboard_img = get_field('dashboard_image', 'option');
?>

<section class="dashboard-archive-hero-wrap" style="background-image: url('<?php echo $hero_img['url']; ?>')">
  <div class="outer-container">
    <?php if ( $hero_title ) { ?>
      <h1><?php echo $hero_title; ?></h1>
    <?php } ?>
  </div>
</section>

<?php if ( have_posts() ) { ?>
  <section class="dashboard-archive-wrap">
    <div class="outer-container">
      <div class="archive-con">
        <?php while ( have_posts() ) { the_post();
          $food_scraps = get_field('school_dashboard_food_scraps');
          $recoverable_food = get_field('school_dashboard_recoverable_food');
          $liquids = get_field('school_dashboard_liquids');
          $num_days = get_field('school_dashboard_number_of_days');
          $num_students = get_field('school_dashboard_number_of_students');
          $school_name = get_field('school_dashboard_school_name');
          $school_location = get_field('school_dashboard_school_loacation');
          $bg_img = get_field('dashboard_hero_background_image');
          $prev_year_diverted = get_field('prev_year_diverted');
          $prev_year_diverted_sharetable = get_field('prev_year_share_table');
          $food_waste_per_student = (($liquids + $food_scraps) * $num_days / $num_students);
          $total_food_waste = ($liquids + $recoverable_food + $food_scraps); // 44.7

          $food_waste_dirversion = $num_days * $total_food_waste + $prev_year_diverted; //15674

          //change to tons of food waste remove metric ton on Archive
          // new formula  (1/23/24):  $food_waste_diverted_tons = $food_waste_diversion / 2000;
          $food_waste_diverted_tons = $food_waste_dirversion / 2000;
          // $food_waste_diverted_metric_tons = ($food_waste_dirversion * 0.45)/2204 ; //3.2
          $school_current = ($total_food_waste) * 180/$num_students;
          $food_waste_pervention = $num_students * (39.5 - $school_current) * ($num_days/180); //4866
          $food_waste_pervented_metric_tons = ($food_waste_pervention * 3.1)/2204; //6.8
          $share_table_recovery = ($num_days * $recoverable_food) + $prev_year_diverted_sharetable;
          ?>
          <a href="<?php the_permalink(); ?>" class="indiv-dashboard">
            <div class="post-image" style="background-image: url(<?php echo $bg_img['url']; ?>)"></div>
            <h3><?php echo get_the_title(); ?></h3>
            <p class="ri-excerpt"><?php echo get_the_excerpt(); ?></p>
            <p class="ri-school"><?php echo $school_name . ', ' . $school_location; ?></p>
            <p class="waste-diverted">Tons of Food Waste Diverted: <strong><?php echo round($food_waste_diverted_tons, 2); ?> Tons</strong></p>
            <p class="food-recovered">Lbs. of Share Food Recovered: <strong><?php echo round($share_table_recovery, 2); ?> Lbs.</strong></p>
            <p>Food Waste per Student: <strong><?php echo round($school_current, 2); ?> Lbs. per Year</strong></p>
          </a>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>


<?php get_footer(); ?>
