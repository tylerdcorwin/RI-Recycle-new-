<?php

	// ==========
	// POST TYPES
	// ==========
	class FigChildPostTypes {

		public static function initialize() {
			// add_action('init', array('FigChildPostTypes', 'fig_employees'));
			// add_action('init', array('FigChildPostTypes', 'fig_testimonials'));
		}

		// Projects
		public static function fig_projects() {
			$args = array(
			'labels' => array(
					'name' => __( 'Projects', 'figpress' ),
					'singular_name' => __( 'Projects', 'figpress' ),
					'add_new' => __( 'Add New Project', 'figpress' ),
					'add_new_item' => __( 'Add New Project', 'figpress' ),
					'edit_item' => __( 'Edit Project', 'figpress' ),
					'new_item' => __( 'Add New Project', 'figpress' ),
					'view_item' => __( 'View Project', 'figpress' ),
					'search_items' => __( 'Search Projects', 'figpress' ),
					'not_found' => __( 'No Projects found', 'figpress' ),
					'not_found_in_trash' => __( 'No Projects found in trash', 'figpress' )
				),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_icon' => 'dashicons-portfolio',
			'rewrite' => array('slug' => 'projects'),
			'exclude_from_search' => true,
			'menu_position' => 20,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
			);

			register_post_type('fig_projects', $args);
		}

		public static function fig_employees() {
	    $args = array(
				'labels' => array(
					'name' => __( 'Employees', 'figpress' ),
					'singular_name' => __( 'Employees', 'figpress' ),
					'add_new' => __( 'Add New Employee', 'figpress' ),
					'add_new_item' => __( 'Add New Employee', 'figpress' ),
					'edit_item' => __( 'Edit Employee', 'figpress' ),
					'new_item' => __( 'Add New Employee', 'figpress' ),
					'view_item' => __( 'View Employee', 'figpress' ),
					'search_items' => __( 'Search Employees', 'figpress' ),
					'not_found' => __( 'No Employees found', 'figpress' ),
					'not_found_in_trash' => __( 'No Employees found in trash', 'figpress' )
		    ),
	      'description'         => 'Holds our employees and employee specific data',
				'show_in_rest'				=> true,
				'public' => false,
				'show_ui' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_icon' => 'dashicons-awards',
				'rewrite' => array('slug' => 'testimonials'),
				'exclude_from_search' => true,
				'menu_position' => 20,
				'has_archive' => true,
				'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
	    );
	    register_post_type( 'fig_employees', $args );
	  }

		public static function fig_testimonials() {
			$args = array(
			'labels' => array(
					'name' => __( 'Testimonials', 'figpress' ),
					'singular_name' => __( 'Testimonials', 'figpress' ),
					'add_new' => __( 'Add New Testimonial', 'figpress' ),
					'add_new_item' => __( 'Add New Testimonial', 'figpress' ),
					'edit_item' => __( 'Edit Testimonial', 'figpress' ),
					'new_item' => __( 'Add New Testimonial', 'figpress' ),
					'view_item' => __( 'View Testimonial', 'figpress' ),
					'search_items' => __( 'Search Testimonials', 'figpress' ),
					'not_found' => __( 'No Testimonials found', 'figpress' ),
					'not_found_in_trash' => __( 'No Testimonials found in trash', 'figpress' )
				),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_icon' => 'dashicons-awards',
			'rewrite' => array('slug' => 'testimonials'),
			'exclude_from_search' => true,
			'menu_position' => 20,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
			);

			register_post_type('fig_testimonials', $args);
		}

	}

	FigChildPostTypes::initialize();
