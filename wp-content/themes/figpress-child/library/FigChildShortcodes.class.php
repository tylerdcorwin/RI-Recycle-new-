<?php

  // ==========
  // SHORTCODES
  // ==========
  class FigChildShortcodes {

    public static function initialize() {
      // add_shortcode( 'accordion', array( 'FigChildShortcodes', 'accordion_shortcode') );
      // add_shortcode( 'faq', array( 'FigChildShortcodes', 'faq_shortcode') );
      // add_filter('widget_text', 'do_shortcode');
    }

    public static function accordion_shortcode( $atts, $content = null ) {

      extract( shortcode_atts (
        array(
          'id' => 'accordion'
        ), $atts )
      );

      return '<div class="panel-group" id="' . $id . '" role="tablist" aria-multiselectable="true">' . (do_shortcode($content)) . '</div>';
    }

    public static function faq_shortcode( $atts, $content = null ) {

      extract( shortcode_atts (
        array (
          'group' => 'accordion',
          'title' => 'title',
          'id' => 'One',
        ), $atts )
      );

      return '<div class="panel panel-default"><div class="panel-heading" role="tab" id="heading' . $id . '"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#' . $group . '" href="#collapse' . $id . '" aria-expanded="true" aria-controls="collapse' . $id . '">' . $title . ' </a></h4></div><div id="collapse' . $id . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'. $id . '"><div class="panel-body">' . (do_shortcode($content)) . ' </div></div></div>';
    }

  }

  FigChildShortcodes::initialize();
