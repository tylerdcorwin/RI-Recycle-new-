<!DOCTYPE html>

<!--[if IE 8 ]>
  <html class="no-js lt-ie9 ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9 ]>
  <html class="no-js lt-ie10 ie9" <?php language_attributes(); ?>>
<![endif]-->

<!--[if gt IE 10|!(IE)]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
  <title><?php wp_title(); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="196x196" href="<?php echo get_stylesheet_directory_uri(); ?>/public/img/touch/chrome-touch-icon-196x196.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
  <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/public/img/touch/ms-touch-icon-144x144-precomposed.png">
  <meta name="msapplication-TileColor" content="#3372DF">

  <!-- Scripts -->

  <script type="text/javascript">
    var TEMPPATH = "<?php bloginfo('template_directory'); ?>";
    var ABSPATH = "<?php echo admin_url(); ?>";
    var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>"; // for use within the ajax load of posts
    var site_url = '<?php echo site_url(); ?>';
    var currentpageid = '<?php echo get_the_ID(); ?>';
  </script>

  <?php if( get_field('fig_custom_css', 'option') ) { ?>
    <!-- Custom CSS -->
    <style type="text/css"><?php the_field('fig_custom_css', 'option'); ?></style>
  <?php } ?>

  <!-- favicon -->
  <?php if( get_field('fig_logo', 'option') ) { ?>
    <link rel="shortcut icon" href="<?php the_field('fig_favicon', 'option'); ?>">
  <?php } else { ?>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">
  <?php } ?>

  <?php the_field('fig_embed_code', 'option'); ?>

  <?php wp_head(); ?>

  <?php // HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ?>
  <!--[if lte IE 9]>
    <link rel='stylesheet' href='<?php bloginfo('template_directory'); ?>/public/css/ie.css' type='text/css' media='all' />
  <![endif]-->

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!--[if lt IE 8]>
    <script type="text/javascript" src="http://assets.figmints.com/ieBad/ieBad.js"></script>
  <![endif]-->

  <?php the_field('fig_analytics', 'option'); ?>
</head>
<body <?php body_class(); ?>>
  <header class="navigation" role="banner">
    <?php if ( get_field('header_banner', 'option') === 'on' ) {
      get_template_part('partials/alert-bar');
    } ?>
    <div class="outer-container">
      <a href="<?php bloginfo('url'); ?>" class="logo" rel="home">
        <?php
          $logo = get_field('fig_logo', 'option');
          $inverseLogo = get_field('fig_inverse_logo', 'option');
        ?>
        <?php if( $logo ) { ?>
          <img class="main-logo" data-inverse="<?php echo $inverseLogo['url']; ?>" src="<?php echo $logo['url']; ?>" alt="<?php bloginfo( 'name' ); ?>" />
        <?php } ?>
      </a>
      <div class="main-menu">
        <?php wp_nav_menu(array( 'theme_location' => 'primary_menu', 'container' => '' )); ?>
        <div class="burger">
          <div class="burg-1"></div>
          <div class="burg-2"></div>
          <div class="burg-3"></div>
        </div>
        <span class="icon icon-search"></span>
      </div>
      <div class="mobile-menu">
        <?php wp_nav_menu(array( 'theme_location' => 'primary_menu', 'container' => '' )); ?>
      </div>
    </div>
    <div class="search-bar">
      <?php get_search_form(); ?>
    </div>
  </header>
  <div class="wrapper">
