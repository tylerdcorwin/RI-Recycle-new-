<?php

  // ==========
  // CUSTOM FIELDS
  // ==========
  class FigCustomFields {

    public static function initialize() {
      self::figpress_theme_settings();
    }

    public static function figpress_theme_settings() {
      // theme settings page
      if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
          'page_title'  => 'Theme Settings',
          'menu_title'  => 'Theme Settings',
          'menu_slug'   => 'theme-general-settings',
          'capability'  => 'edit_posts',
          'icon_url'    => 'dashicons-art',
          'position'    => 62,
          'redirect'    => true
        ));

        acf_add_options_sub_page(array(
          'page_title'  => 'General Settings',
          'menu_title'  => 'General',
          'parent_slug' => 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
          'page_title'  => 'Blog Settings',
          'menu_title'  => 'Blog Settings',
          'parent_slug' => 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
          'page_title'  => 'Typography Settings',
          'menu_title'  => 'Typography',
          'parent_slug' => 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
          'page_title'  => 'Contact Settings',
          'menu_title'  => 'Contact',
          'parent_slug' => 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
          'page_title'  => 'Custom CSS & JS',
          'menu_title'  => 'Custom CSS & JS',
          'parent_slug' => 'theme-general-settings',
        ));

      }

    }

  }

  FigCustomFields::initialize();
