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
          $food_waste_per_student = (($liquids + $food_scraps) * $num_days / $num_students);
          $total_food_waste = ($liquids + $recoverable_food + $food_scraps); // 44.7
          $temp_waste_diverted = get_field('school_dashboard_temp_tons_of_food_waste_diverted');
          $temp_food_recovered = get_field('school_dashboard_temp_lbs_of_food_recovered');
          ?>
          <a href="<?php the_permalink(); ?>" class="indiv-dashboard">
            <div class="post-image" style="background-image: url(<?php echo $bg_img['url']; ?>)"></div>
            <h2><?php echo get_the_title(); ?></h2>
            <p class="ri-excerpt"><?php echo get_the_excerpt(); ?></p>
            <p class="ri-school"><?php echo $school_name . ', ' . $school_location; ?></p>
            <p class="waste-diverted">Tons of Food Waste Diverted: <strong><?php echo $temp_waste_diverted; ?></strong></p>
            <p class="food-recovered">Lbs. of Food Recovered: <strong><?php echo $temp_food_recovered; ?></strong></p>
            <p>Food Waste per Student: <strong><?php echo round($food_waste_per_student, 2); ?> Lbs. per Year</strong></p>
          </a>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>


<?php get_footer(); ?>
