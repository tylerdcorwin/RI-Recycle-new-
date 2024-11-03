<?php

	// ==========
	// INITIALIZE
	// ==========
	class FigChildTheme {

		public static function initialize() {
			add_action('wp_ajax_more_post_ajax', array('FigChildTheme', 'more_post_ajax') );
			add_action('wp_ajax_nopriv_more_post_ajax', array('FigChildTheme', 'more_post_ajax') );

			// blocks
			add_action( 'acf/init', array( 'FigChildTheme', 'my_acf_init' ) );
			// // remove blocks
			add_filter( 'allowed_block_types', array( 'FigChildTheme', 'fig_allowed_block_types' ) );
		}

		public static function more_post_ajax(){
			$offset = $_POST["offset"];
			$ppp = $_POST["ppp"];
			// header("Content-Type: text/html");

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $ppp,
				'offset' => $offset
				);

			$loop = new WP_Query($args);
			while ($loop->have_posts()) { $loop->the_post();
				get_template_part('partials/more-posts');
			}
			exit;
		}

		public static function my_acf_init() {
			// check if it exists
			if ( function_exists( 'acf_register_block' ) ) {
				global $acf_block_array;
				foreach ( $acf_block_array as &$value ) {
					acf_register_block( $value );
				}
			}
		}

		public static function fig_allowed_block_types( $allowed_blocks ) {
			global $acf_block_array;
			$allow_the_blocks = array();

			foreach ( $acf_block_array as &$value ) {
				array_push( $allow_the_blocks, 'acf/' . $value['name'] );
			}
			return $allow_the_blocks;
		}


	}

	FigChildTheme::initialize();

// Blocks for Gutenberg
$acf_block_array = 	array(
	array(
		'name' => 'homepage-hero',
		'title' => __('Homepage Hero'),
		'description' => __('Homepage Hero Callout'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('homepage hero callout', 'hero')
	),
	array(
		'name' => 'cta',
		'title' => __('Call to Action'),
		'description' => __('A Custom Call to Action'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('call to action', 'cta'),
	),
	array(
		'name' => 'map',
		'title' => __('Map'),
		'description' => __('A Custom Map'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('map with pins', 'map'),
	),
	array(
		'name' => 'content-with-image',
		'title' => __('Content with Image'),
		'description' => __('A Custom Content area with an Image'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('content with image', 'cta with image'),
	),
	array(
		'name' => 'small-overview',
		'title' => __('Small Overview'),
		'description' => __('A Custom Small Overview'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('small overview', 'overview title with small description'),
	),
	array(
		'name' => 'slider',
		'title' => __('Slider'),
		'description' => __('A Custom Slider'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('Slider', 'slideshow'),
	),
	array(
		'name' => 'icon-grid',
		'title' => __('Icon Grid'),
		'description' => __('A Custom Icon Grid'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('icon grid', 'logo grid'),
	),
	array(
		'name' => 'wysiwyg',
		'title' => __('Main Content'),
		'description' => __('A Custom Content Area'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('WYSIWYG', 'main content', 'what you see is what you get'),
	),
	array(
		'name' => 'small-hero',
		'title' => __('Small Hero'),
		'description' => __('A Custom Small Hero Callout'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('small hero', 'page header', 'small hero callout', 'image'),
	),
	array(
		'name' => 'blog-feed',
		'title' => __('Blog Feed'),
		'description' => __('A Custom Blog Feed'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('choose posts', 'blog feed', 'choose blog posts',),
	),
	array(
		'name' => 'two-column-content',
		'title' => __('Two Column Content'),
		'description' => __('A Custom Two Column Block of Content'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('Two Columns', 'Two column content', 'two images side by side'),
	),
	array(
		'name' => 'wysiwyg-form',
		'title' => __('Wysiwyg with Form'),
		'description' => __('A Custom Block With A Form'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('contact form', 'WYSIWYG', 'what you see is what you get'),
	),
	array(
		'name' => 'icon-nav',
		'title' => __('Icon Nav'),
		'description' => __('Icon Navigation'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('Icon Navigation', 'Navigation'),
	),
	array(
		'name' => 'inline-video',
		'title' => __('Inline Video'),
		'description' => __('Inline Video Block'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('inline video', 'video embed')
	),
	array(
		'name' => 'button',
		'title' => __('Button'),
		'description' => __('Button Block'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('button', 'btn', 'link')
	),
	array(
		'name' => 'resources',
		'title' => __('Resources'),
		'description' => __('Resource Library'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('resources', 'resource library', 'filtered resources and industries', 'custom library')
	),
	array(
		'name' => 'leadership',
		'title' => __('Leadership'),
		'description' => __('Leadership'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('leadership', 'about')
	),
	array(
		'name' => 'accordion',
		'title' => __('Accordion'),
		'description' => __('Accordion'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('accordion', 'tabs')
	),
	array(
		'name' => 'testimonial-slider',
		'title' => __('Testimonial Slider'),
		'description' => __('Testimonials'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('testimonial slider', 'slider', 'quote')
	),
	array(
		'name' => 'testimonial',
		'title' => __('Testimonials'),
		'description' => __('Testimonials'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('testimonials', 'quote')
	),
	array(
		'name' => 'statistics',
		'title' => __('Statistics'),
		'description' => __('Statistics'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('statistics')
	),
	array(
		'name' => 'email-signup',
		'title' => __('Email Signup'),
		'description' => __('Email Signup'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('email signup', 'form', 'gravity form')
	),
	array(
		'name' => 'full-width-image',
		'title' => __('Full Width Image'),
		'description' => __('Full Width Image'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('full width image', 'image', 'picture')
	),
	array(
		'name' => 'lp-hero-form-asset',
		'title' => __('Landing Page Hero: Lead Capture'),
		'description' => __('Landing Page Hero: Lead Capture'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('landing page', 'hero', 'form', 'asset', 'lead capture', 'lp hero')
	),
	array(
		'name' => 'lp-hero-overlap-form',
		'title' => __('Landing Page Hero: Overlap Form'),
		'description' => __('Landing Page Hero: Overlap Form'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('landing page hero', 'hero', 'form', 'overlap form', 'lead capture', 'lp hero')
	),
	array(
		'name' => 'lp-hero-overlap-asset',
		'title' => __('Landing Page Hero: Overlap Asset'),
		'description' => __('Landing Page Hero: Overlap Asset'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('landing page hero', 'hero', 'asset', 'overlap asset', 'lp hero')
	),
	array(
		'name' => 'lp-hero-inline-video',
		'title' => __('Landing Page Hero: Inline Video'),
		'description' => __('Landing Page Hero: Inline Video'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'formatting',
		'icon' => 'format-image',
		'keywords' => array('landing page hero inline video', 'hero', 'inline video', 'video', 'lp hero')
	),
	array(
		'name' => 'landing-full-width-form',
		'title' => __('Landing Page Full Width Form'),
		'description' => __('A Custom landing page full width form'),
		'render_callback' => 'my_acf_block_render_callback',
		'category' => 'text',
		'icon' => 'format-image',
		'keywords' => array('Landing Page form', 'form', 'landing page full width form')
	),

);
