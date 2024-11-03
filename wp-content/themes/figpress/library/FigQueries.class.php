<?php

	// ==========
	// QUERIES
	// ==========
	class FigQueries {

		public static function google_maps_format($address, $city, $state, $zip) {

			// building the JSON URL string for Google API call
		    $g_address = str_replace(' ', '+', trim($address)).",";
		    $g_city    = '+'.str_replace(' ', '+', trim($city)).",";
		    $g_state   = '+'.str_replace(' ', '+', trim($state));
		    $g_zip     = isset($zip)? '+'.str_replace(' ', '', trim($zip)) : '';

		    // Query string
			$g_addr_str = $g_address.$g_city.$g_state.$g_zip;
			return $g_addr_str;
		}

		public static function get_blog($args = false)  {
			$blog = new WP_Query (
				array(
					'posts_per_page' => 4,
					'orderby' => 'DATE',
					'order' => 'DESC',
					'tag__not_in' => 10,
					'paged' => get_query_var('paged')
				)
			);

			return $blog;
		}

		public static function get_list_pt($pt, $args = false) {
			$default = array(
					'posts_per_page' => 4,
					'post_type'=> $pt,
					'orderby' => 'DATE',
					'order' => 'DESC',
					'paged' => get_query_var('paged')
				);

			if ($args) {
				$post_type = new WP_Query($args);
			} else {
				$post_type = new WP_Query($default);
			}

			return $post_type;
		}

		public static function get_pt($pt) {
			$pt = new WP_Query(
				array(
					'post_type'=> $pt,
					'orderby' => 'ID',
					'order' => 'ASC',
				)
			);

			return $pt;
		}

		public static function get_n_pt($n, $pt, $ob = 'name', $o = 'ASC', $tag = '', $pagi = true) {
			if ($tag) {
				if( $pagi ) {
					$pt = new WP_Query(
						array(
							'tag_slug__in' => $tag,
							'posts_per_page' => $n,
							'post_type'=> $pt,
							'orderby' => $ob,
							'order' => $o,
							'ignore_sticky_posts' => true,
							'paged' => get_query_var('paged')
						)
					);
				} else {
					$pt = new WP_Query(
						array(
							'tag_slug__in' => $tag,
							'posts_per_page' => $n,
							'post_type'=> $pt,
							'orderby' => $ob,
							'order' => $o,
							'ignore_sticky_posts' => true,
							'no_found_rows' => true,
						)
					);
				}
			} else {
				if( $pagi ) {
					$pt = new WP_Query(
						array(
							'posts_per_page' => $n,
							'post_type'=> $pt,
							'orderby' => $ob,
							'order' => $o,
							'ignore_sticky_posts' => true,
							'paged' => get_query_var('paged'),
						)
					);
				} else {
					$pt = new WP_Query(
						array(
							'posts_per_page' => $n,
							'post_type'=> $pt,
							'orderby' => $ob,
							'order' => $o,
							'ignore_sticky_posts' => true,
							'no_found_rows' => true,
						)
					);
				}
			}

			return $pt;
		}

		public static function get_home_slideshow() {
			$home_slideshow = new WP_Query(
				array(
					'post_type'=>'slideshow',
					'orderby' => 'DATE',
					'order' => 'DESC',
				)
			);

			return $home_slideshow;
		}

		public static function get_cats_meow($type) {
			$cats = array();
			$customPostTaxonomies = get_object_taxonomies($type);

			if(count($customPostTaxonomies) > 0) {
			    foreach($customPostTaxonomies as $tax) {
				    $args = array(
			        	'exclude' => 1,
			         	'orderby' => 'name',
				        'show_count' => 0,
			        	'pad_counts' => 0,
				        'hierarchical' => 1,
			        	'taxonomy' => $tax,
			        	'title_li' => ''
			        );

				    $cats[] = get_categories( $args );
			    }
			}

			return $cats;
		}

	}