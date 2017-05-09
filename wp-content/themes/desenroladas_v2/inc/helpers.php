<?php

function my_users( $role ) {
	$users = get_users( array(
		'role'    => $role,
		'fields'  => array( 'id', 'display_name' ),
		'exclude' => 7,
	) );

	foreach ( $users as $key => $user ) {
		$users[ $key ]->meta = (object) get_user_meta( $user->id );
	}

	shuffle( $users );

	return $users;
}

function my_logo() {
	global $post;

	$tag = is_front_page() ? 'h1' : 'div';
	$link = home_url( '/' );
	$name = get_bloginfo( 'name' );
	$html = "<h1 class='logo body__logo'>"
		. "<a href='$link' class='logo__link'>$name</a>"
		. "</h1>";

	echo $html;
}

function my_menu( $location, $menu_class, $container = false, $container_class = '' ) {
	 wp_nav_menu( array(
		'theme_location'  => $location,
		'container'       => $container,
		'container_class' => $container_class,
		'menu_class'      => $menu_class,
		'fallback_cb'     => false,
		'depth'           => $container ? 2 : 1,
	) );
}

function my_related_query() {
	global $post;

	$ids      = array();
	$tags     = wp_get_post_tags( $post->ID );
	$defaults = array(
		'post__not_in'        => array( $post->ID ),
		'posts_per_page'      => 4,
		'ignore_sticky_posts' => true
	);

	if ( $tags ) {
		foreach ( $tags as $tag ) {
			$ids[] = $tag->term_id;
		}
		$args = wp_parse_args( array(
			'tag__in' => $ids,
		), $defaults );
	} else {
		$ids  = wp_get_post_categories( $post->ID );
		$args = wp_parse_args( array(
			'category__in' => $ids,
		), $defaults );
	}

	return new WP_Query( $args );
}

function my_trending_query() {
	$args = array();
	$sticky = get_option( 'sticky_posts' );
	rsort( $sticky );

	if ( empty( $sticky ) ) {
		$args = array(
			'posts_per_page' => 4,
			'ignore_sticky_posts' => 1
		);
	} else {
		$args = array(
			'post__in' => $sticky,
			'ignore_sticky_posts' => 1
		);
	}

	return new WP_Query( $args );
}

function my_social_menu( $css_class ) {
	$facebook  = get_theme_mod( 'facebook_url' );
	$twitter   = get_theme_mod( 'twitter_url' );
	$instagram = get_theme_mod( 'instagram_url' );
	$html      = "<ul class='$css_class'>";

	if ( $facebook ) {
		$html .= '<li class="menu-item menu-item--facebook">'
					. "<a href='$facebook' target='_blank'><span>Facebook</span></a>"
					. '</li>';
	}

	if ( $twitter ) {
		$html .= '<li class="menu-item menu-item--twitter">'
					. "<a href='$twitter' target='_blank'><span>Twitter</span></a>"
					. '</li>';
	}

	if ( $instagram ) {
		$html .= '<li class="menu-item menu-item--instagram">'
					. "<a href='$instagram' target='_blank'><span>Instagram</span></a>"
					. '</li>';
	}

	$html .= '</ul>';

	echo $html;
}

function my_thumb( $size, $css_class ) {
	global $post;

	the_post_thumbnail( $size, array(
		'class' => $css_class
	) );
}
