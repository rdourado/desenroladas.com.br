<?php

add_action( 'customize_register', 'my_customize_register', 11 );

function my_customize_register( $wp_customize ) {
	// Autoras
	$wp_customize->add_setting( 'bloggers', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		// 'default'           => 'por Clara e Gabi Dourado',
		'sanitize_callback' => '',
	) );

	$wp_customize->add_control( 'bloggers', array(
	  'label'       => 'Escrito por',
	  'description' => 'Texto no rodapé',
	  'type'        => 'text',
	  'section'     => 'title_tagline',
	) );

	$wp_customize->add_setting( 'designer_name', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		// 'default'           => 'Layout por Studio Lilo',
		'sanitize_callback' => '',
	) );

	$wp_customize->add_control( 'designer_name', array(
	  'label'       => 'Nome dx designer',
	  'description' => '',
	  'type'        => 'text',
	  'section'     => 'title_tagline',
	) );

	$wp_customize->add_setting( 'designer_url', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		// 'default'           => '',
		'sanitize_callback' => '',
	) );

	$wp_customize->add_control( 'designer_url', array(
	  'label'       => 'Link dx designer',
	  'description' => '',
	  'type'        => 'url',
	  'section'     => 'title_tagline',
	) );

	// Redes sociais
	$wp_customize->add_section( 'social', array(
		'title'      => 'Redes sociais',
		'priority'   => 160,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'facebook_url', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		// 'default'           => 'http://facebook.com/desenroladas',
		'sanitize_callback' => '',
	) );

	$wp_customize->add_control( 'facebook_url', array(
	  'label'       => 'Facebook URL',
	  'description' => '',
	  'type'        => 'url',
	  'section'     => 'social',
	) );

	$wp_customize->add_setting( 'twitter_url', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		// 'default'           => 'http://twitter.com/desenroladas',
		'sanitize_callback' => '',
	) );

	$wp_customize->add_control( 'twitter_url', array(
	  'label'       => 'Twitter URL',
	  'description' => '',
	  'type'        => 'url',
	  'section'     => 'social',
	) );

	$wp_customize->add_setting( 'instagram_url', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		// 'default'           => 'http://instagram.com/desenroladas',
		'sanitize_callback' => '',
	) );

	$wp_customize->add_control( 'instagram_url', array(
	  'label'       => 'Instagram URL',
	  'description' => '',
	  'type'        => 'url',
	  'section'     => 'social',
	) );

	$wp_customize->add_setting( 'facebook_sdk', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		// 'default'           => '',
		'sanitize_callback' => '',
	) );

	$wp_customize->add_control( 'facebook_sdk', array(
	  'label'       => 'Facebook SDK',
	  'description' => 'Necessário para o funcionamento dos comentários.',
	  'type'        => 'textarea',
	  'section'     => 'social',
	) );
}
