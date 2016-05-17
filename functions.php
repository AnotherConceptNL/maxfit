<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'naked' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu, 
		// just change the 'primary' to another name
	)
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
} 

if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'Footer',
'id' => 'sidebar-footer',
'description' => 'Footer widget',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>',

));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	'name' => 'Footer 2',
	'id' => 'sidebar-footer2',
	'description' => 'Footer widget',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3>',
	'after_title' => '</h3>',

	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	'name' => 'Footer 3',
	'id' => 'sidebar-footer3',
	'description' => 'Footer widget',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3>',
	'after_title' => '</h3>',

	));
}

// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  { 

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	
	// add fitvid
	wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );
	
	// add theme scripts
	wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );
  
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header

// ADD IMAGE SIZES
add_image_size ( 'logo', 275, 73, array('center', 'center') );

add_image_size ( 'np_function', 1905, 900, array('center', 'center') );

add_image_size ( 'pp_function', 400, 400, array('center', 'center') );



// ADD CLASS TO BUTTON
// add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
	return 'class="button"';
}

// ENABLE THUMBNAILS

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 600, 250, array('center', 'center') );

// ADD SLIDER
function np_init() {
	add_shortcode('slider-shortcode', 'np_function');
	$args = array(
			'public' => true,
			'label' => 'Slider',
			'supports' => array(
					'title',
					'thumbnail'
			)
	);
	register_post_type('np_images', $args);
}
add_action('init', 'np_init');

function np_function($type='np_function') {
	$args = array(
			'post_type' => 'np_images',
			'posts_per_page' => 5
	);

	//the loop
	$loop = new WP_Query($args);
	while ($loop->have_posts()) {
		$loop->the_post();

		$the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
		$result .='<img title="'.get_the_title().'" src="' . $the_url[0] . '" data-thumb="' . $the_url[0] . '" alt=""/>';
	}

	

	return $result;
}

// ADD PROGRESSION
function pp_init() {
	add_shortcode('progression-shortcode', 'pp_function');
	$args = array(
			'public' => true,
			'label' => 'Progression',
			'supports' => array(
					'title',
					'thumbnail',
					'excerpt'
			)
	);
	register_post_type('pp_images', $args);
}
add_action('init', 'pp_init');

function pp_function($type='pp_function') {
	$args = array(
			'post_type' => 'pp_images',
			'posts_per_page' => 20
	);
	
	$result .= '<section id="photostack-1" class="photostack photostack-start"><div>';

	//the loop
	$loop = new WP_Query($args);
	while ($loop->have_posts()) {
		$loop->the_post();

		$the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
		$result .='<figure><a href="' .get_the_excerpt(). '" class="photostack-img"><img src="' . $the_url[0] . '" alt="' .get_the_title(). '"/></a><figcaption>
				<h2 class="photostack-title">' .get_the_title(). '</h2></figcaption></figure>';
	}

	$result .='</div></section>';
	
	return $result;
}

// DELETE ADMIN BAR
show_admin_bar(false);

