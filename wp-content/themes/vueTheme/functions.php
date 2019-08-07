<?php

// This theme uses wp_nav_menu() in two locations.
register_nav_menus(
	array(
		'main-navigation' => __( 'Primary', 'vuewp' ),
		// 'menu-1' => __( 'Primary', 'vuewp' ),
		// 'footer' => __( 'Footer Menu', 'twentynineteen' ),
		// 'social' => __( 'Social Links Menu', 'twentynineteen' ),
	)
);

/*
*
* add api route for menus
* create custom function to return nav menu
* https://website.com/wp-json/wp/v2/menu
*
*/
function custom_wp_menu() {
    // Replace your menu name, slug or ID carefully
    return wp_get_nav_menu_items('Main Navigation');
}

// create new endpoint route
add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', 'menu', array(
        'methods' => 'GET',
        'callback' => 'custom_wp_menu',
    ) );
});


/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1568, 9999 );

add_image_size( 'article_featured', 2048, 500, true );


// Remove all default WP template redirects/lookups
remove_action( 'template_redirect', 'redirect_canonical' );

// Redirect all requests to index.php so the Vue app is loaded and 404s aren't thrown
function remove_redirects() {
	add_rewrite_rule( '^/(.+)/?', 'index.php', 'top' );
}
add_action( 'init', 'remove_redirects' );

// Load scripts
function load_vue_scripts() {

	wp_enqueue_style(
		'appStyle',
		get_stylesheet_directory_uri() . '/dist/app.css',
		filemtime( get_stylesheet_directory() . '/dist/app.css' )
	);

	wp_register_script(
		'chunkVendorsJs', get_stylesheet_directory_uri() . '/dist/chunk-vendors.js', '', '', true
	);

	wp_register_script(
		'appJs', get_stylesheet_directory_uri() . '/dist/app.js', '', '', true
	);


	// wp_enqueue_script('chunkVendorsJs');
	wp_enqueue_script('appJs');

}
add_action( 'wp_enqueue_scripts', 'load_vue_scripts', 100 );


// //add vue
// function add_vue_scripts() {
// 	wp_enqueue_style( 'appstyle', get_template_directory_uri() . '/dist/css/app.1583582f.css', array(), wp_get_theme()->get( 'Version' ) );

// 	wp_enqueue_script(
// 		'appjs',
// 		get_template_directory_uri().'/dist/js/app.e80f25e1.js'
// 		// '1.0.0',
// 		// true
// 	);
//     wp_enqueue_script(
//         'chunk-vendors',
//         get_template_directory_uri().'/dist/js/chunk-vendors.e69161be.js'
// 		// '1.0.0',
// 		// true
// 	);


// };
// add_action('wp_enqueue_scripts', 'add_vue_scripts');
