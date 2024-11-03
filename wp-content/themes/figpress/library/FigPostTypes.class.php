<?php

	// ==========
	// POST TYPES
	// ==========
	class FigPostTypes {

		public static function initialize() {
			// add_action('init', array('FigPostTypes', 'fig_staff'));
		}

		// Staff
		public static function fig_staff() {
		  $args = array(
			'labels' => array(
			   'name' => __( 'Staff', 'figpress' ),
			   'singular_name' => __( 'Staff', 'figpress' ),
			   'add_new' => __( 'Add New Staff', 'figpress' ),
			   'add_new_item' => __( 'Add New Staff', 'figpress' ),
			   'edit_item' => __( 'Edit Staff', 'figpress' ),
			   'new_item' => __( 'Add New Staff', 'figpress' ),
			   'view_item' => __( 'View Staff', 'figpress' ),
			   'search_items' => __( 'Search Staff', 'figpress' ),
			   'not_found' => __( 'No Staff found', 'figpress' ),
			   'not_found_in_trash' => __( 'No Staff found in trash', 'figpress' )
		   ),
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'staff'),
			'exclude_from_search' => true,
			'menu_position' => 20,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'revisions', 'author'),
			'menu_icon' => 'dashicons-admin-users'
		  );

		  register_post_type('fig_staff', $args);
		}

	}

	FigPostTypes::initialize();
