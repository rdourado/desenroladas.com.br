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
