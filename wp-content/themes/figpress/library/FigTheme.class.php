<?php

	// ==========
	// INITIALIZE
	// ==========
	class FigTheme {

		public static function initialize() {
			add_action( 'widgets_init', array('FigTheme', 'create_sidebars') );
			add_filter( 'wp_nav_menu_objects', array('FigTheme', 'add_menu_parent_class') );
			add_action( 'wp_enqueue_scripts', array('FigTheme', 'figmints_enqueues'), 10 );
			add_filter( 'body_class', array('FigTheme', 'template_body_class') );
			add_filter( 'init', array('FigTheme', 'custom_menus') );
			add_action( 'init', array('FigTheme', 'enable_thumbnails') );
			// do_action( 'init', array('FigTheme', 'sidebar_list') );
			add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'video' ) );
			add_editor_style( 'public/css/editor-style.css' );
			add_theme_support( 'html5', array('FigTheme', 'custom_search_form') );
			add_filter( 'get_search_form', array('FigTheme', 'custom_search_form') );
			remove_filter( 'acf_the_content', 'wpautop' ); // remove ACF wpautop
			add_filter( 'acf_the_content', 'wpautop' , 99);
			add_filter( 'acf_the_content', 'shortcode_unautop',100 );
			remove_action( 'wp_head', 'wp_generator' ); // [SECURITY] remove generator wp version meta tag
			add_action( 'wp_head', array('FigTheme', 'fig_coming_soon_redirect') );
			add_action('admin_head', array('FigTheme', 'custom_acf_css') );

			// Extend WordPress search to include custom fields
			add_filter('posts_join', array('FigTheme', 'custom_search_join') );
			add_filter( 'posts_where', array('FigTheme', 'custom_search_where') );
			add_filter( 'posts_distinct', array('FigTheme', 'custom_search_distinct') );
			add_filter('acf/settings/google_api_key', function () {
				$googleKey = get_field('fig_google_key', 'option' );
				return $googleKey;
			});
		}

		// Enable sidebars for widgets
		public static function create_sidebars() {
				register_sidebar(array(
					'id' => 'sidebar-1',
					'name' => 'Sidebar 1',
					'before_widget' => '<div class="widget">',
					'after_widget' => '</div>',
					'before_title' => '<h2>',
					'after_title' => '</h2>'
				));
				register_sidebar(array(
					'id' => 'sidebar-2',
					'name' => 'Sidebar 2',
					'before_widget' => '<div class="widget">',
					'after_widget' => '</div>',
					'before_title' => '<h2>',
					'after_title' => '</h2>'
				));
				register_sidebar(array(
					'id' => 'sidebar-3',
					'name' => 'Sidebar 3',
					'before_widget' => '<div class="widget">',
					'after_widget' => '</div>',
					'before_title' => '<h2>',
					'after_title' => '</h2>'
				));
				register_sidebar(array(
					'id' => 'footer-top',
					'name' => 'Footer Top',
					'before_widget' => '<div class="widget">',
					'after_widget' => '</div>',
					'before_title' => '<h6>',
					'after_title' => '</h6>'
				));
				register_sidebar(array(
					'id' => 'footer-bottom',
					'name' => 'Footer Bottom',
					'before_widget' => '<div class="widget">',
					'after_widget' => '</div>',
					'before_title' => '<h6>',
					'after_title' => '</h6>'
				));
		}

		// Enqueues scripts and styles
		public static function figmints_enqueues() {

			wp_enqueue_style( 'fig', get_stylesheet_uri() );
			wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', null );
			// wp_enqueue_style( 'fig-styles', get_template_directory_uri() . '/public/css/app.css', array( 'fig' ), null );
			// wp_enqueue_style( 'fig-theme', get_template_directory_uri() . '/public/css/theme-css.php', array( 'fig' ), null );

			wp_enqueue_script( 'jquery' );
			if( is_page_template('template/modules.php') || is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) ) :
				$googleKey = get_field('fig_google_key', 'option');
				wp_enqueue_script( 'google-api-js3', 'https://maps.googleapis.com/maps/api/js?key=' . $googleKey, array(), null, true );
				wp_enqueue_script( 'vimeo-script', '//f.vimeocdn.com/js/froogaloop2.min.js', array(), null, true );
			endif;
			//wp_enqueue_script( 'fig-vendor', get_template_directory_uri() . '/public/js/vendor/vendor.min.js', array(), null, true );
			// wp_enqueue_script( 'fig-scripts', get_template_directory_uri() . '/public/js/app.min.js', array( 'jquery' ), null, true );

		}

		// Add Parent classes to wp_menu
		public static function add_menu_parent_class( $items ) {

			$parents = array();
			foreach ( $items as $item ) {
					if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
							$parents[] = $item->menu_item_parent;
					}
			}

			foreach ( $items as $item ) {
					if ( in_array( $item->ID, $parents ) ) {
							$item->classes[] = 'menu-parent-item';
					}
			}

			return $items;
		}

		// Enable thumbnails
		public static function enable_thumbnails() {
			if ( function_exists( 'add_theme_support' ) ) {
				add_theme_support( 'post-thumbnails' );
			}
		}

		// Add custom menus
		public static function custom_menus() {
			register_nav_menus(
				array(
					'primary_menu' 	 => __( 'Primary Menu', 'figpress' ),
					'secondary_menu' => __( 'Secondary Menu', 'figpress' ),
					'mobile_menu' 	 => __( 'Mobile Menu', 'figpress' ),
					'footer_menu' 	 => __( 'Footer Menu', 'figpress' )
				)
			);
		}

		// Add custom body class
		public static function template_body_class( $classes ) {
			global $wp_query;
			$page_id = $wp_query->get_queried_object_id();

			if ( is_page() && is_page_template() ) {
				$classes[] = 'fig-template-' . str_replace( array('template-', '.php'), '', get_page_template_slug( $page_id ) );
				return $classes;
			} else {
				$classes[] = 'fig-template-default';
				return $classes;
			}
		}

		// Sidebar list (used in custom fields)
		public static function sidebar_list() {
			global $wp_registered_sidebars;
			$sidebars = array();
			foreach ( $GLOBALS['wp_registered_sidebars'] as $id => $sidebar ) {
				$sidebars[$sidebar['id']] = $sidebar['name'];
			}
			return $sidebars;
		}

		// search form
		public static function custom_search_form( $form ) {
			$form = '<form role="search" method="get" id="search-form" class="search-form" action="' . home_url( '/' ) . '" >
			<label class="screen-reader-text" for="s">' . __( '' ) . '</label>
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search...">
			<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'">
			</form>';

			return $form;
		}

		// redirect non logged-in user to coming soon page if it's enabled
		public static function fig_coming_soon_redirect() {
			if( !is_user_logged_in() && get_field('fig_coming_soon', 'option') && !is_page_template('template/comingsoon.php') ) {
				wp_redirect( get_field('fig_coming_soon_page', 'option'), 302 );
				exit;
			}
		}

		public static function custom_acf_css() {
			echo '<style>
				.acf-flexible-content .layout .acf-fc-layout-controlls > li:first-child:after,
				.acf-flexible-content .layout .acf-fc-layout-controlls > li:last-child:after {
					margin: 0 10px 0 5px;
					line-height: 20px;
				}
				.acf-flexible-content .layout .acf-fc-layout-controlls > li a {
					float: left;
				}
				.acf-flexible-content .layout .acf-fc-layout-controlls > li:first-child:after {
					content: "Add Module";

				}
				.acf-flexible-content .layout .acf-fc-layout-controlls > li:last-child:after {
					content: "Remove Module";
				}
				.acf-flexible-content .layout .acf-fc-layout-controlls > li .acf-fc-popup a {
					float: none;
				}
			</style>';
		}

		/**
		 * Join posts and postmeta tables
		 *
		 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
		 */
		 // Join for searching metadata
 		public static function custom_search_join($join) {
 		    global $wp_query, $wpdb;

 		    if (!empty($wp_query->query_vars['s'])) {
 	        $join .= "LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id ";
 		    }

 		    return $join;
 		}

		/**
		 * Modify the search query with posts_where
		 *
		 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
		 */
		public static function custom_search_where( $where ) {
			global $pagenow, $wpdb;

			if ( is_search() ) {
				$where = preg_replace(
					"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
					"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
			}

			return $where;
		}

		/**
		 * Prevent duplicates
		 *
		 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
		 */
		public static function custom_search_distinct( $where ) {
			global $wpdb;

			if ( is_search() ) {
				return "DISTINCT";
			}

			return $where;
		}

	}

	FigTheme::initialize();
