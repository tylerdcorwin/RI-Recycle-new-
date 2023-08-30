<?php
  get_header();
  $bg_img = get_field('dashboard_hero_background_image');
  $hero_title = get_field('dashboard_hero_title');
  $hero_subtitle = get_field('dashboard_hero_subtitle');
  $school_name = get_field('school_dashboard_school_name');
  $school_type = get_field('school_dashboard_school_type');
  $school_avg = $school_type === 'Lower School' ? 47 : 39.3;
  $num_days = get_field('school_dashboard_number_of_days');
  $num_students = get_field('school_dashboard_number_of_students');

  $recoverable_food = get_field('school_dashboard_recoverable_food');
  $food_scraps = get_field('school_dashboard_food_scraps');
  $liquids = get_field('school_dashboard_liquids');
  $recycling = get_field('school_dashboard_recycling');
  $landfill = get_field('school_dashboard_landfill');
  $prev_year_diverted = get_field('prev_year_diverted');
  $prev_year_diverted_sharetable = get_field('prev_year_share_table');
  $total_food_waste = $recoverable_food + $liquids + $food_scraps;  //39.5
  $total_food_scraps = $liquids + $food_scraps; //44.4
  // 180 is total num of school days
  $food_waste_per_student = ($recoverable_food + $liquids + $food_scraps) * 180 / $num_students; //21.2
  // 180 is total num of school days
  // 39.3 is middle school baseline

  $food_waste_pervention = $num_students * ($school_avg - $food_waste_per_student) * ($num_days/180); //4866
  $food_waste_dirversion = $num_days * $total_food_waste + $prev_year_diverted; //15674
  $share_table_recovery = ($num_days * $recoverable_food) + $prev_year_diverted_sharetable; //971.4
  // 0.45 is conversion factor
  // 2204 is lbs of metric ton
  $food_waste_diverted_metric_tons = ($food_waste_dirversion * 0.45)/2204 ; //3.2
  // 3.1 is conversion factor
  $food_waste_pervented_metric_tons = ($food_waste_pervention * 3.1)/2204; //6.8
  $total_metric_tons = $food_waste_diverted_metric_tons + $food_waste_pervented_metric_tons;
  // 0.833 is a conversion factor
  $meals_created = $share_table_recovery * 0.833; //813

  $content1 = get_field('dashboard_content_section');
  $content2 = get_field('dashboard_content_section2');
  $content3 = get_field('dashboard_content_section3');
  $content4 = get_field('dashboard_content_section4');
  $img = get_field('dashboard_content_image');

?>

<!-- <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  const tyTest = parseFloat(<?php echo $food_waste_pervention; ?>); // 813
  const numStudents = parseFloat(<?php echo $num_students; ?>); //976
  const numDays = parseFloat(<?php echo $num_days; ?>); //128
  const tyTest2 = parseFloat(<?php echo $prev_year_diverted; ?>); // 933
  const recoverableFood = parseFloat(<?php echo $recoverable_food; ?>); // 0.3
  const liquids = parseFloat(<?php echo $liquids; ?>); // 4.9
  const recycleable = parseFloat(<?php echo $recycling; ?>); // 4.4
  const landfill = parseFloat(<?php echo $landfill; ?>); // 13.2
  const compost = parseFloat(<?php echo $food_scraps; ?>); // 39.5
  const totalFoodWaste = (liquids + compost); // 44.7
  const totalCafeteriaWaste = (recoverableFood + liquids + compost + recycleable + landfill); // 62.3
  const foodScraps = (compost/totalCafeteriaWaste)
  const schoolAvg = 'RI <?php echo $school_type; ?> Avg';
  const current = '<?php echo $school_name; ?> Current';
  const goal = '<?php echo $school_name; ?> GOAL';
  const schlAvg = parseFloat(<?php echo $school_avg; ?>);
  const schlCurrent = (totalFoodWaste) * 180/numStudents; //21.1
  const schlGoal = schlAvg/2;
  const schoolName = '<?php echo $school_name; ?>';
  const schoolGoal = schoolName + ' GOAL';

  google.charts.load('current', {'packages':['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawChart);
  google.charts.setOnLoadCallback(drawChart2);
  // google.charts.setOnLoadCallback(drawChart3);


  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Lunch Waste', 'Percent'],
      ['Food Waste', totalFoodWaste],
      ['Recycling', recycleable],
      ['Landfill',  landfill]
    ]);
    var options = {
      title: 'Lunch Waste %',
      'width': 400,
      'height': 300,
      'colors': ['#119618', '#3367CC', '#FF9801']
      // chartArea: {left: 0, top: 0, width: "100%", height: "100%"}
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
      title: 'Lunch Waste %',
      'width': 400,
      'height': 300,
      'colors': ['#FF9801', '#976AAC', '#119618', '#3367CC', '#949595']
      // chartArea: {left: 0, top: 0, width: "100%", height: "100%"}
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
    chart.draw(data2, options2);
  }

  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawMultSeries);

  function drawMultSeries() {
    var data = google.visualization.arrayToDataTable([
      ['School', 'Food Waste', { role: 'style' }],
      ['RI Middle School Avg', 39.3, '#4284F5'],
      [schoolName, schlCurrent, '#4284F5'],
      [schoolGoal, schlGoal, '#4284F5'],
    ]);

    var options2 = {
      title: 'Food Waste Per Student',
      legend: {position: 'none'},
      'height': 500,
      vAxis: {
        viewWindow: {
          min: 0
        }
      }
    };

    var chart = new google.visualization.ColumnChart(
      document.getElementById('chart_div'));

    chart.draw(data, options2);
  }

</script>

<?php if ( have_posts() ) { ?>
  <section class="dashboard-hero-wrap" style="background-image: url('<?php echo $bg_img['url']; ?>')">
    <div class="outer-container">

      <div class="indiv-post">
        <?php while ( have_posts() ) { the_post(); ?>

          <div class="indiv-dashboard">
            <h1><?php echo $hero_title; ?></h1>
          </div>
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
        <div class="pie-chart-con">
          <div id="piechart"></div>
          <div id="piechart2"></div>
        </div>
      </div>

      <div class="content-with-img-con">
        <?php if ( $content2 ) { ?>
          <div class="content-con">
            <?php echo $content2; ?>
          </div>
        <?php } ?>
        <div class="img-con">
          <div class="calcs">
            <?php
              $food_recovered = $num_days * $recoverable_food + $prev_year_diverted_sharetable;
            ?>
            <h5>Food Recovered: <?php echo round($food_recovered, 2); ?> lbs.</h5>
            <h5>Meals Created: <?php echo round($meals_created, 2); ?></h5>
          </div>
          <?php if ( $img ) { ?>
            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
          <?php } ?>
        </div>
      </div>

      <div class="content-with-bar-chart">
        <div class="content-con">
          <?php echo $content3; ?>
        </div>
        <div class="barChart">
          <div id="chart_div"></div>
        </div>
      </div>

      <div class="content-with-stats">
        <div class="content-con">
          <?php if ( $content4 ) { ?>
            <?php echo $content4; ?>
          <?php } ?>
        </div>
        <div class="stats-con">
          <h5>Food Waste Diverted: <?php echo round($food_waste_diverted_metric_tons, 2); ?> MTCO2</h5>
          <h5>Food Waste Prevented: <?php echo round($food_waste_pervented_metric_tons, 2); ?> MTCO2</h5>
          <h5>Food Waste Total: <?php echo round($total_metric_tons, 2); ?> MTCO2</h5>
          <div class="calc-con">
            <h5>What does this mean?</h5>
            <a href="https://www.epa.gov/energy/greenhouse-gas-equivalencies-calculator">Greenhouse Gas Equivalencies Calculator | US EPA</a>
          </div>
        </div>
      </div>

    </div>
  </section>
<?php } ?>


<?php get_footer(); ?>
