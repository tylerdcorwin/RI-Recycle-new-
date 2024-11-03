<?php

	// ==========
  // SHORTCODES
  // ==========
  class FigShortcodes {

  	public static function initialize() {
      add_shortcode( 'columns', array( 'FigShortcodes', 'column_shortcode' ) );
      add_shortcode( 'container', array( 'FigShortcodes', 'container_shortcode' ) );
      add_shortcode( 'button', array( 'FigChildShortcodes', 'button_shortcode' ) );
  	}

  	public static function column_shortcode( $atts, $content = null ) {
  		 // Attributes
	    extract( shortcode_atts(
	      array(
	        'lg' => '12',
	        'md' => '12',
	        'sm' => '12',
	        'xs' => '12',
	      ), $atts )
	    );

    	// Code ** You'll need to wrap loop in .row with this
  		return '<div class="col-lg-' . $lg . ' col-md-' . $md . ' col-sm-' . $sm . ' col-xs-' . $xs . '">' . (do_shortcode($content)) . '</div>';
  	}

    public static function container_shortcode( $atts, $content = null ) {

      extract( shortcode_atts(
        array(
          'class' => 'row',
        ), $atts )
      );

      return '<div class="' . $class . '">' . (do_shortcode($content)) . '</div>';
    }

    public static function button_shortcode( $atts ) {

      extract( shortcode_atts(
        array(
          'link' => 'http://',
          'target' => '',
          'class' => '',
          'text' => 'Learn More',
        ), $atts )
      );

      return '<a href="' . $link . '" target="' . $target . '" class="fig-btn ' . $class . '">' . $text . '</a>';
    }

  }

  FigShortcodes::initialize();
