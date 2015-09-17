<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {
	register_sidebar(
        array(
            'id' => 'postpage',
            'name' => __( 'Post Page' ),
            'description' => __( 'Sidebar for Post Page' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );
/**
 * Proper way to enqueue scripts and styles
 */
function datatorrentvone_scripts() {
	wp_enqueue_style( 'zurb-style-guide', get_template_directory_uri() . '/css/app.css', array(), '1.0.0', false );
	wp_enqueue_style( 'responsive-table', get_template_directory_uri() . '/css/responsive-tables.css', array(), '1.0.0', false );
	wp_enqueue_style( 'default-style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom-responsive-style', get_template_directory_uri() . '/css/custom-responsive-style.css', array(), '1.0.0', false );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'plugin-active', get_template_directory_uri() . '/js/plugin-active.js', array(), '1.0.0', true );
	wp_enqueue_script( 'responsive-tables', get_template_directory_uri() . '/js/responsive-tables.js', array(), '1.0.0', true );
	wp_enqueue_style( 'font-awsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '3.2.0', false );
}
add_action( 'wp_enqueue_scripts', 'datatorrentvone_scripts' );
//Addding Wordpress Menus
function register_my_menus() {
	register_nav_menus(
		array(
	  		'dt_main-menu' => __( 'DT Main Menu' ),
	 		'dt_about-us-menu' => __( 'About Us Menu' ),
	  		'dt_resource-menu' => __( 'Resource Menu' ),
	  		'dt_product-menu' => __( 'Product Menu' ),
	  		'dt_events-menu' => __( 'Events Menu' )
			)
	);
}
// Add functionality to upload SVG files in WordPress
function dt_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'dt_mime_types');
// Post thumbnails in WordPress
add_theme_support( 'post-thumbnails' );