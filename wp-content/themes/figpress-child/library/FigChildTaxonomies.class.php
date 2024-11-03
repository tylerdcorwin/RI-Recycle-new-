<?php

  // ==========
  // TAXONOMIES
  // ==========
  class FigChildTaxonomies {

    public static function initialize() {
      // add_action( 'init', array('FigChildTaxonomies', 'portfolio_clients_tax'), 0 );
      // add_action( 'init', array('FigChildTaxonomies', 'support_all') );
      // add_action( 'pre_get_posts', array('FigChildTaxonomies', 'support_query') );
    }

    public static function portfolio_clients_tax() {
      // Add new clients taxonomy, make it hierarchical (like category)
      $clientsTaxLabels = array(
        'name'              => _x( 'Clients', 'taxonomy general name' ),
        'singular_name'     => _x( 'Client', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Clients' ),
        'all_items'         => __( 'All Clients' ),
        'parent_item'       => __( 'Parent Client' ),
        'parent_item_colon' => __( 'Parent Client:' ),
        'edit_item'         => __( 'Edit Client' ),
        'update_item'       => __( 'Update Client' ),
        'add_new_item'      => __( 'Add New Client' ),
        'new_item_name'     => __( 'New Client' ),
        'menu_name'         => __( 'Clients' )
      );
      // dealer types arguments
      $clientsTaxArgs = array(
        'hierarchical'      => true,
        'labels'            => $clientsTaxLabels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'clients' ),
      );

      // Make it happen!
      register_taxonomy( 'fig_clients_tax', array( 'fig_projects' ), $clientsTaxArgs );

      // clients_tax run once
      // wp_insert_term('Figmints', 'clients_tax', array('description'=> '', 'slug' => 'figmints'));
    }

    // Add tax support to pages
    public static function support_all() {
      register_taxonomy_for_object_type('post_tag', 'page');
      register_taxonomy_for_object_type('category', 'page');
    }
    // ensure all tags are included in queries
    public static function support_query($wp_query) {
      if ($wp_query->get('tag', 'category')) $wp_query->set('post_type', 'any');
      if ($wp_query->get('category')) $wp_query->set('post_type', 'any');
    }

  }

  FigChildTaxonomies::initialize();