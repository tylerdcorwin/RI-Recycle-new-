<?php

	// ==========
  // IMAGES
  // ==========
  class FigChildImages {

    public static function initialize() {
      // self::list_thumb_large();
      // self::list_thumb_small();
      // self::blog_large();
      // self::blog_med();
      // self::blog_small();
      // self::second_hero();
    }

    public static function list_thumb_large() {
      add_image_size( 'list-thumb-large', 204, 204, true );
    }

    public static function list_thumb_small() {
      add_image_size( 'list-thumb-small', 125, 125, true );
    }

    public static function blog_large() {
      add_image_size( 'blog-large', 700, 386, true );
    }

    public static function blog_med() {
      add_image_size( 'blog-med', 700, 220, false );
    }

    public static function blog_small() {
      add_image_size( 'blog-small', 305, 170, false );
    }

    public static function second_hero() {
      add_image_size( 'second-hero', 1353, 310, true );
    }

  }

  FigChildImages::initialize();