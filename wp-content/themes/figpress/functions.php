<?php

  // /* <<<< SETUP >>>> */

  // Debug
  function debug($bug) {
    echo '<pre>';
      print_r($bug);
    echo '</pre>';
  }

  // These first
  $fig_parent_cpt = glob(dirname(__FILE__) . '/library/FigPostTypes.class.php');
  $initialize = glob(dirname(__FILE__) . '/library/FigTheme.class.php');
  $helpers = glob(dirname(__FILE__) . '/library/FigHelpers.class.php');
  $queries = glob(dirname(__FILE__) . '/library/FigQueries.class.php');
  $dependancies = glob(dirname(__FILE__) . '/library/tgmPluginActivation.class.php');
  // Merge the arrays
  $dependants = array_merge($dependancies, $fig_parent_cpt, $initialize, $helpers, $queries);

  // Get all lib files
  $all_files = glob(dirname(__FILE__) . '/library/*.php');
  // Remove dependants
  $files = array_diff($all_files, $dependants);
  /* <<<< RUN >>>> */
  // Require dependants first
  foreach ($dependants as $dependancy) {
    require_once $dependancy;
  }
  // Require all other files
  foreach ($files as $dependancy) {
    require_once $dependancy;
  }
