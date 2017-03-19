<?php

remove_filter( 'the_excerpt', 'wpautop' );

add_filter( 'body_class', 'my_body_class' );
add_filter( 'nav_menu_css_class', 'my_special_nav_class', 10, 4 );

function my_body_class( $classes ) {
	global $post;

	$categories = wp_get_post_categories( $post->ID, array(
		'fields' => 'slugs',
	) );

	if ( $categories ) {
		foreach ( $categories as $c ) {
			$classes[] = "category-$c";
		}
	}

	return $classes;
}


function my_special_nav_class( $classes, $item, $args, $depth ) {
	if ( ! $depth ) {
		$classes[] = 'menu-item--' . sanitize_title( $item->title );
	}

	return $classes;
}

