<?php
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
