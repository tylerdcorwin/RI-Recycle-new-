<?php

if(!function_exists('bridge_qode_child_theme_enqueue_scripts')) {

	Function bridge_qode_child_theme_enqueue_scripts() {
		wp_register_style('bridge-childstyle', get_stylesheet_directory_uri() . '/style.css');
		wp_enqueue_style('bridge-childstyle');
	}

	add_action('wp_enqueue_scripts', 'bridge_qode_child_theme_enqueue_scripts', 11);
}

// Enqueues child theme scripts and styles
function childtheme_enqueues() {
	wp_dequeue_style( 'fig' );
	wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/public/css/app.css' );

	if ( get_field( 'fig_dev_mode', 'option' ) ) {
		wp_enqueue_style( 'fig-dev-style', get_field( 'fig_dev_css', 'option' ) );
		wp_enqueue_script( 'fig-dev-js', get_field( 'fig_dev_js', 'option' ), array(), null, true );
	} else {
		wp_enqueue_style( 'child-theme-main', get_stylesheet_directory_uri() . '/public/css/app.css', array( 'fig' ) );
		wp_enqueue_script( 'child-theme-fig-scripts', get_stylesheet_directory_uri() . '/public/js/app.min.js', array( 'jquery' ), null, true );
	}

}

add_action( 'wp_enqueue_scripts', 'childtheme_enqueues', 20 );
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

// ACF options menu

add_action('acf/init', 'fig_acf_init');

function fig_acf_init() {
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

	}
}


function create_ACF_meta_in_REST() {
    $postypes_to_exclude = ['acf-field-group','acf-field'];
    $extra_postypes_to_include = ["page"];
    $post_types = array_diff(get_post_types(["_builtin" => false], 'names'),$postypes_to_exclude);

    array_push($post_types, $extra_postypes_to_include);

    foreach ($post_types as $post_type) {
        register_rest_field( $post_type, 'acf', [
            'get_callback'    => 'expose_ACF_fields',
            'schema'          => null,
       ]
     );
    }

}

function expose_ACF_fields( $object ) {
    $ID = $object['id'];
    return get_fields($ID);
}

add_action( 'rest_api_init', 'create_ACF_meta_in_REST' );


function create_posttype() {
register_post_type( 'news',
// CPT Options
array(
  'labels' => array(
   'name' => __( 'Dashboards' ),
   'singular_name' => __( 'Dashboard' )
  ),
  'public' => true,
  'has_archive' => true,
  'rewrite' => array('slug' => 'dashboards'),
 )
);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
