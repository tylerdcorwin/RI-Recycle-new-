<?php

  // ==========
  // WIDGETS
  // ==========

  class FigWidgets {

    public static function initialize() {
      add_action( 'widgets_init', array('FigWidgets', 'register_widgets') );

    }

    public static function register_widgets() {
      register_widget( 'FigCustomWidget' );
    }


  }

  class FigCustomWidget extends WP_Widget {

    function __construct() {
      // Instantiate the parent object
      parent::__construct(
        'FigCustomWidget', // Base ID
        'Fig Custom Widgets', // Name
        array( 'description' => __( 'Query Widget.', 'figpress' ), ) // Args
      );
    }

    function widget( $args, $instance ) {
      // Widget output
      extract( $args );
      // Render Widget
      echo $before_widget;
      $widget_id = "widget_" . $args["widget_id"];
      // get_template_part( 'partials/widgets/query' );
      $module = get_field('fig_widget_module', $widget_id);
      if( $module == "custom_query" ) {
        include ( dirname(dirname(__FILE__)) . '/partials/widgets/query.php' );
      } elseif ( $module == "gform" ) {
        include ( dirname(dirname(__FILE__)) . '/partials/widgets/gform.php' );
      } elseif ( $module == "map" ) {
        include ( dirname(dirname(__FILE__)) . '/partials/widgets/map.php' );
      } elseif ( $module == "social_links" ) {
        include ( dirname(dirname(__FILE__)) . '/partials/widgets/social.php' );
      } elseif ( $module == "contact" ) {
        include ( dirname(dirname(__FILE__)) . '/partials/widgets/contact.php' );
      }
      echo $after_widget;
    }

    // function update( $new_instance, $old_instance ) {
    //   // Save widget options
    // }

    function form( $instance ) {
      // Output admin widget options form
    }
  }

  FigWidgets::initialize();
