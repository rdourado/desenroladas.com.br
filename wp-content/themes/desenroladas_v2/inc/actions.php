<?php

add_action( 'after_setup_theme', 'my_setup' );
add_action( 'wp_enqueue_scripts', 'my_scripts' );
// add_action( 'pre_get_posts', 'my_ignore_sticky' );

function my_setup() {
	set_post_thumbnail_size( 400, 400, true );
	add_image_size( 'my-four-cols-image', 640, 1920, false );
	add_image_size( 'my-three-cols-image', 480, 360, true );
	add_image_size( 'my-eight-cols-image', 1280, 640, true );

	register_nav_menus( array(
		'header'     => 'Barra superior',
		'categories' => 'Categorias',
		'footer'     => 'Rodapé',
		// 'social'     => 'Redes sociais',
	) );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'post-formats', array(
		'quote',
	) );
	// add_editor_style( array( 'assets/css/editor-style.css', my_fonts_url() ) );
}

function my_scripts() {
	$css = (object) array(
		'uri' => get_theme_file_uri( '/assets/css/style.css' ),
		'ver' => filemtime( TEMPLATEPATH . '/assets/css/style.css' ),
	);
	$js = (object) array(
		'uri' => get_theme_file_uri( '/assets/js/app.js' ),
		'ver' => filemtime( TEMPLATEPATH . '/assets/js/app.js' ),
	);
	wp_enqueue_style( 'my-styles', $css->uri, array(), $css->ver );
	wp_enqueue_script( 'my-scripts', $js->uri, array(), $js->ver, true );
}

function my_ignore_sticky( $query ) {
	if ( is_home() && $query->is_main_query() ) {
		$query->set( 'ignore_sticky_posts', true );
	}
}
