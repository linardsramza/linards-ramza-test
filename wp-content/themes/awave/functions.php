<?php

function load_css() {

    wp_register_style('style', get_template_directory_uri() . '/assets/css/style.css', array(), false, 'all' );
    wp_enqueue_style('style');

}
add_action('wp_enqueue_scripts', 'load_css');

function load_js() {

    wp_register_script('script', get_template_directory_uri() . '/assets/js/scripts.js', '', '', true);
    wp_enqueue_script('script');

    global $wp_query;
    $the_query = new WP_Query(['post_type' => 'form-log',]);

    wp_localize_script('script', 'dataForAjax', array(
    	'nonce' 		=> wp_create_nonce('wp_rest'),
    	'siteURL' 		=> get_site_url(),
    	'ajaxURL' 		=> site_url() . '/wp-admin/admin-ajax.php',
		'posts' 		=> json_encode( $wp_query->query_vars ),
		'max_page' 		=> $wp_query->max_num_pages,
		'posts_per_page' 		=> $wp_query->query_vars['posts_per_page'],
		'max_page_acf' 		=> $the_query->max_num_pages,
		'posts_per_page_acf' 		=> $the_query->query_vars['posts_per_page']
    ));

}
add_action('wp_enqueue_scripts', 'load_js');

// Add featured image to pages
add_theme_support( 'post-thumbnails' );

// Theme Options
add_theme_support('menus');


// Register Menu
register_nav_menus(
    [
        'top-menu' => 'Top menu'
    ]
);

// Custom post type Form log
function form_log_post_type(){
	register_post_type( 'form-log',[
		'label'					=> 'Form log',
		'public'      			=> true,
		'has_archive' 			=> true,
		'supports'				=> ['title','editor','excerpt','thumbnail'],
		'taxonomies'          	=> ['category','post_tag'],
		'show_in_rest' 			=> true
	] );
}
add_action( 'init', 'form_log_post_type');

// Register gutenberg block
function awave_gutenberg_blocks(){
	wp_register_script('listing-block-js', get_template_directory_uri(). '/assets/js/gutenberg-listing-block.js', array( 'wp-blocks' ));
	register_block_type('awave/form-log-listing-block', array(
		'editor_script' => 'listing-block-js'
	));
}
add_action( 'init', 'awave_gutenberg_blocks' );

// Register gutenberg block with ACF
if( function_exists('acf_register_block_type')){
	add_action('acf/init', 'register_acf_block_types');
}
function register_acf_block_types(){
	acf_register_block_type([
		'name' => 'listing-block',
		'title' => 'Listing Block with ACF',
		'description' => 'Block to list form log entries',
		'render_template' => 'blocks/listing-block.php',
		'icon' => 'dashicons-media-text',
		'keywords' => ['listing', 'form'],
	]);
}