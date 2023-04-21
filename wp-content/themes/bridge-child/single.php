<?php
  get_header();
  $bg_img = get_field('dashboard_hero_background_image');
  $hero_title = get_field('dashboard_hero_title');
  $hero_subtitle = get_field('dashboard_hero_subtitle');

  $school_name = get_field('school_dashboard_school_name');
  $school_type = get_field('school_dashboard_school_type');
  $num_days = get_field('school_dashboard_number_of_days');
  $num_students = get_field('school_dashboard_number_of_students');
  $recoverable_food = get_field('school_dashboard_recoverable_food');
  $food_scraps = get_field('school_dashboard_food_scraps');
  $liquids = get_field('school_dashboard_liquids');
  $recycling = get_field('school_dashboard_recycling');
  $landfill = get_field('school_dashboard_landfill');
  $school_avg = $school_type == 'lower' ? 47 : 39.3;

  $content1 = get_field('dashboard_content_section');
  $content2 = get_field('dashboard_content_section2');

?>

<script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  const recoverableFood = parseFloat(<?php echo $recoverable_food; ?>); // 0.3
  const liquids = parseFloat(<?php echo $liquids; ?>); // 4.9
  const recycleable = parseFloat(<?php echo $recycling; ?>); // 4.4
  const landfill = parseFloat(<?php echo $landfill; ?>); // 13.2
  const compost = parseFloat(<?php echo $food_scraps; ?>); // 39.5
  const totalFoodWaste = (recoverableFood + liquids + compost); // 44.7
  const totalCafeteriaWaste = (recoverableFood + liquids + compost + recycleable + landfill); // 62.3
  const foodScraps = (compost/totalCafeteriaWaste)
  const schoolAvg = 'RI <?php echo $school_name; ?> Avg';
  const current = '<?php echo $school_name; ?> Current';
  const goal = '<?php echo $school_name; ?> GOAL';
  const schlAvg = parseFloat(<?php echo $school_avg; ?>);
  const schlCurrent = (
    parseFloat(<?php echo $liquids; ?>) +
    parseFloat(<?php echo $food_scraps; ?>) *
    parseFloat(<?php echo $num_days; ?>) /
    parseFloat(<?php echo $num_students ?>)
  ); //21.1
  const schlGoal = schlAvg/2;

  anychart.onDocumentReady(function() {
    // set the data
    var data = {
      header: ["Name", "Lbs. of Food"],
      rows: [
        [schoolAvg, schlAvg],
        [current, schlCurrent],
        [goal, schlGoal],
    ]};
    // create the chart
    var chart = anychart.column();
    // add data
    chart.data(data);
    // set the chart title
    chart.title("Food Waste per Student");
    // draw
    chart.container("barChart");
    chart.draw();
  });

  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  google.charts.setOnLoadCallback(drawChart2);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Lunch Waste', 'Percent'],
      ['Food Waste', totalFoodWaste],
      ['Recycling', recycleable],
      ['Landfill',  landfill]
    ]);
    var options = {
      title: 'Lunch Waste %'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
  function drawChart2() {
    let percentLiquid = liquids/totalCafeteriaWaste;
    let percentShare = recoverableFood/totalCafeteriaWaste;
    let percentRecycling = recycleable/totalCafeteriaWaste;
    let percentLandfill = landfill/totalCafeteriaWaste;
    let percentFoodScraps = compost/totalCafeteriaWaste;
    var data2 = google.visualization.arrayToDataTable([
      ['Lunch Waste', 'Percent'],
      ['Liquids', percentLiquid],
      ['Recoverable Food', percentShare],
      ['Food Scraps', percentFoodScraps],
      ['Recycling', percentRecycling],
      ['Landfill',  percentLandfill]
    ]);
    var options2 = {
      title: 'Lunch Waste %'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
    chart.draw(data2, options2);
  }

</script>

<?php if ( have_posts() ) { ?>
  <section class="dashboard-hero-wrap" style="background-image: url('<?php echo $bg_img['url']; ?>')">
    <div class="outer-container">

      <div class="indiv-post">
        <?php while ( have_posts() ) { the_post(); ?>

          <a href="<?php the_permalink(); ?>" class="indiv-dashboard">
            <h1><?php echo $school_name; ?></h1>
          </a>
        <?php } ?>
      </div>
    </div>
  </section>

  <section class="dashboard-content-wrap">
    <div class="outer-container">
      <div class="dashboard-content-con">
        <?php if ( $content1 ) { ?>
          <div class="content-con">
            <?php echo $content1; ?>
          </div>
        <?php } ?>
        <div id="barChart"></div>
      </div>
      <div class="pie-chart-con">
        <div id="piechart"></div>
        <div id="piechart2"></div>
      </div>
      <div class="lower-content-con">
        <?php echo $content2; ?>
      </div>
    </div>
  </section>
<?php } ?>


<?php get_footer(); ?>
