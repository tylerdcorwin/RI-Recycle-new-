<?php
  // Debugging - Remove for production
  // error_reporting(E_ALL);
  // ini_set('display_errors', 'on');

  // Enqueues child theme scripts and styles

  function childtheme_enqueues() {
    wp_dequeue_style( 'fig' );
    wp_enqueue_style( 'child-theme-style', get_stylesheet_uri(), array( 'fig' ) );

    if ( get_field('fig_dev_mode', 'option') ) {
      wp_enqueue_style( 'fig-dev-style', get_field('fig_dev_css', 'option') );
      wp_enqueue_script( 'fig-dev-js', get_field('fig_dev_js', 'option'), array(), null, true );
    } else {
      wp_enqueue_style( 'child-theme-main', get_stylesheet_directory_uri() . '/public/css/app.css', array( 'fig' ) );
      wp_enqueue_script( 'child-theme-fig-scripts', get_stylesheet_directory_uri() . '/public/js/app.min.js', array( 'jquery' ), null, true );
    }
  }
  add_action( 'wp_enqueue_scripts', 'childtheme_enqueues', 20 );

  // These first
  $fig_cpt = glob(dirname(__FILE__) . '/library/FigChildPostTypes.class.php');
  $initialize = glob(dirname(__FILE__) . '/library/FigChildTheme.class.php');
  // Merge the arrays
  $dependants = array_merge($fig_cpt, $initialize);

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

  /* Enable SVG on Wordpress */
  function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

  /* Enable shortcodes in widgets */
  add_filter('widget_text', 'do_shortcode');


  // adding acf block callback
  function my_acf_block_render_callback( $block ) {
    // convert name into a path friendly slug
    $slug = str_replace('acf/', '', $block['name']);

    if( file_exists(STYLESHEETPATH . "/blocks/{$slug}.php") ) {
      include( STYLESHEETPATH . "/blocks/{$slug}.php" );
    }
  }

  add_action('admin_head', 'my_custom_fonts');

  function my_custom_fonts() {
    echo '<style>
      .wp-block {
        max-width: 920px;
      }
    </style>';
  }

  // register styles for admin dashboard

  function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/public/css/app.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
  }
  add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

  add_action( 'init', 'wpse325327_add_excerpts_to_pages' );
  function wpse325327_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
  }


  function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
  }

  function custom_logs($message) {
    if ( is_array($message) ) {
      $message = json_encode($message);
    }
    $file = fopen("../custom_logs.log","a");
    echo fwrite($file, "\n" . date('Y-m-d h:i:s') . " :: " . $message);
    fclose($file);
  }

  // if you see bugs during api turn off error displays above
  add_action('rest_api_init', function() {
  	// Surface all Gutenberg blocks in the WordPress REST API
  	$post_types = get_post_types_by_support( [ 'editor' ] );
  	foreach ( $post_types as $post_type ) {
  		// if ( gutenberg_can_edit_post_type( $post_type ) ) {
  			register_rest_field( $post_type, 'fig_blocks', [
  				'get_callback' => function ( array $post ) {
  					return parse_blocks( $post['content']['raw'] );
  				}
  			] );
  		// }
  	}
  });


  // remove html margin-top 32px important

  define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/src/img' );
