<?php 

$date_format = get_option( 'date_format' );

// Setup

add_action( 'after_setup_theme', 'my_setup' );
add_action( 'widgets_init', 'my_widgets_init' );

function my_setup() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 310, 200, true );

	register_nav_menus( array(
		'primary'   => 'Categorias',
		'secondary' => 'Rodapé',
	) );
}

function my_widgets_init() {
	register_sidebar( array(
		'name'          => 'Barra lateral',
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

// Actions

add_action( 'pre_get_posts', 'my_ignore_sticky' );

function my_ignore_sticky( $query ) {
	if ( is_home() && $query->is_main_query() )
		$query->set( 'ignore_sticky_posts', true );
}

// Functions

function my_the_category( $sep = ' – ' ) {
	global $post;
	$arr = array();
	$categories = get_the_category();
	foreach( $categories as $category )
		$arr[] = $category->cat_name;
	echo implode( $sep, $arr );
}