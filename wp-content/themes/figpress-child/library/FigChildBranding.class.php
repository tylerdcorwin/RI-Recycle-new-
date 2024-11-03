<?php

  // ==========
  // BRANDING
  // ==========
  class FigChildBranding {

    public static function initialize() {
      add_action( 'login_head', array( 'FigChildBranding', 'login_logo' ) );
      add_action( 'wp_dashboard_setup', array( 'FigChildBranding', 'remove_dashboard_widgets' ) );

      // update dashboard icon OR remove it
      add_action( 'admin_head', array( 'FigChildBranding', 'custom_dashboard_icon' ) );
      // add_action( 'admin_bar_menu', array('FigChildBranding', 'remove_dashboard_icon'), 999 );

      add_filter( 'admin_footer_text', array( 'FigChildBranding', 'update_footer_text' ) );
      add_filter( 'update_footer', array( 'FigChildBranding', 'remove_footer_version' ), 999 );

      add_action( 'admin_menu', array( 'FigChildBranding', 'remove_dashboard_menu' ) );
      add_action( 'admin_head', array( 'FigChildBranding', 'remove_notice' ) );
    }

    // Login logo
    // NOTE: change the width and height to the exact dimensions of the image you are using
    public static function login_logo() {
      echo "
      <style>
      body.login #login h1 a {
        background: url('".get_stylesheet_directory_uri()."/public/img/branding-logo-login.png') no-repeat scroll center top transparent;
        width: 52px;
        height: 52px;
        margin: 0 auto;
      }
      </style>
      ";
    }

    // remove unwanted dashboard widgets for relevant users
    public static function remove_dashboard_widgets() {
      remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
      remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
      remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
      remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
      remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
    }

    // Custom Dashboard Logo
    // NOTE: image size should be 20px * 20px
    public static function custom_dashboard_icon() {
      echo "
      <style>
      #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before{
        content: url('".get_stylesheet_directory_uri()."/public/img/branding-logo-icon.png') !important;
        top: 2px;
      }
      #wpadminbar #wp-admin-bar-wp-logo > a.ab-item {
        cursor: default;
      }
      #wpadminbar #wp-admin-bar-wp-logo > .ab-sub-wrapper {
        display: none !important;
      }
      </style>
      ";
    }

    // Remove Custom Dashboard Logo
    public static function remove_dashboard_icon( $wp_admin_bar ) {
      $wp_admin_bar->remove_node('wp-logo');
    }

    // Update Footer Text
    public static function update_footer_text () {
      echo "Built with &#10084; by <a href='http://www.figmints.com' target='_blank'>Figmints</a>.";
    }

    // Remove Footer WP Version
    public static function remove_footer_version () {
      return '';
    }

    // Remove Dashboard Menu
    public static function remove_dashboard_menu(){
      // Hide for ALL users
      remove_menu_page( 'edit-comments.php' );                     // Comments

      // Hide if user's email does not contain figmints.com
      $current_user = wp_get_current_user();
      $current_useremail = $current_user->user_email;
      if ( strpos( $current_useremail, 'figmints.com' ) == false ) {
        remove_menu_page( 'plugins.php' );                         // Plugins
        remove_menu_page( 'edit.php?post_type=acf-field-group' );  // Custom Fields
        remove_menu_page( 'options-general.php' );                 // Settings

        remove_submenu_page( 'index.php', 'update-core.php' );     // Update
        remove_submenu_page( 'tools.php', 'tools.php' );           // Available Tools
        remove_submenu_page( 'tools.php', 'import.php' );          // Import
        remove_submenu_page( 'tools.php', 'export.php' );          // Export

        // Appearance Menu
        remove_submenu_page( 'themes.php', 'themes.php' );         // Appearance
        global $submenu;
        unset($submenu['themes.php'][6]);                          // Customize
        remove_action('admin_menu', '_add_themes_utility_last', 101); // Theme Editor
      }
    }

    // Remove notice for none figmints user
    public static function remove_notice() {
      $current_user = wp_get_current_user();
      $current_useremail = $current_user->user_email;
      if ( strpos( $current_useremail, 'figmints.com' ) == false ) {
        echo '<style type="text/css">#acf-upgrade-notice, #setting-error-tgmpa, .update-nag{ display:none !important; }</style>';
      }
    }

  }
  FigChildBranding::initialize();
