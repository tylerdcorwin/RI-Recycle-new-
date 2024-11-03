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
  <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
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
  </script>

  <!-- favicon -->
  <?php if( get_field('fig_logo', 'option') ) { ?>
    <link rel="shortcut icon" href="<?php the_field('fig_favicon', 'option'); ?>">
  <?php } else { ?>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">
  <?php } ?>

  <?php the_field('fig_embed_code', 'option'); ?>

  <?php wp_head(); ?>

  <?php // HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ?>
  <!--[if lt IE 9]>
    <link rel='stylesheet' href='<?php bloginfo('template_directory'); ?>/public/css/ie.css' type='text/css' media='all' />
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!--[if lt IE 8]>
    <script type="text/javascript" src="http://assets.figmints.com/ieBad/ieBad.js"></script>
  <![endif]-->

  <?php the_field('fig_analytics', 'option'); ?>

</head>
<body <?php body_class(); ?>>

  <div class="wrapper">

    <div class="mobile-splash-header">
      <div class="container">
        <?php // Insert Logo Here ?>
        <?php if( get_field('fig_logo', 'option') ) { ?>
          <?php $logoID    = get_field('fig_logo', 'option');
                $logoSize  = 'full';
                $logo = wp_get_attachment_image_src( $logoID, $logoSize); ?>
          <img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo( 'name' ); ?>" class="mobile-logo">
        <?php } ?>
      </div>
    </div>
