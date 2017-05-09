<?php

remove_filter( 'the_excerpt', 'wpautop' );

add_filter( 'body_class', 'my_body_class' );
// add_filter( 'get_post_metadata', 'my_thumbnail', 10, 4 );
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

function my_thumbnail( $null, $post_id, $meta_key, $single ) {
	if ( '_thumbnail_id' === $meta_key ) {
		remove_filter( 'get_post_metadata', 'my_thumbnail' );
		$thumb_id = get_post_thumbnail_id( $post_id );
		if ( ! empty( $thumb_id ) ) {
			return (int) $thumb_id;
		}
		add_filter( 'get_post_metadata', 'my_thumbnail', 10, 4 );

		$images = get_posts( array(
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'post_parent'    => $post_id,
			'posts_per_page' => 1,
		) );
		if ( ! empty( $images ) ) {
			$image = reset( $images );
			// update_post_meta( $post_id, $meta_key, $image->ID );
			return $image->ID;
		}
	}
}

function my_special_nav_class( $classes, $item, $args, $depth ) {
	if ( ! $depth ) {
		$classes[] = 'menu-item--' . sanitize_title( $item->title );
	}

	return $classes;
}

