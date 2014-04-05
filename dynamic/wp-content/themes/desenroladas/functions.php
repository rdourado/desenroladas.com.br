<?php 

$date_format = get_option( 'date_format' );

if ( function_exists( 'acf_set_options_page_menu' ) )
	acf_set_options_page_menu( 'Destaques' );

if ( function_exists( 'acf_set_options_page_title' ) )
	acf_set_options_page_title( 'Destaques' );

// Setup

add_action( 'after_setup_theme', 'my_setup' );
add_action( 'widgets_init', 'my_widgets_init' );

function my_setup() {
	// Images
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 310, 200, true );
	add_image_size( 'hero', 960, 400, true );
	add_image_size( 'huge', 960, 530, true );

	// Menu
	register_nav_menus( array(
		'primary'   => 'Categorias',
		'secondary' => 'Rodapé',
	) );

	// Background
	add_theme_support( 'custom-background', array(
		'default-color'          => 'ffffff',
		'default-image'          => get_stylesheet_directory_uri() . '/img/bg1.jpg',
		'default-repeat'         => 'no-repeat',
		'default-position-x'     => 'center',
	) );

	// HTML 5
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
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

add_action( 'wp_enqueue_scripts', 'my_scripts' );

function my_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.10.1.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.min.js', array( 'jquery' ), filemtime( TEMPLATEPATH . '/js/scripts.min.js' ), true );
	wp_enqueue_script( 'diario', 'http://blogs.diariodonordeste.com.br/barra/js/barra-diario.min.js', array( 'scripts' ), null, true );
}


// Filters

add_filter( 'user_contactmethods', 'modify_contact_methods' );
add_filter( 'acf/fields/post_object/query', 'my_post_object_query', 10, 2 );
add_filter( 'acf/fields/post_object/result', 'my_post_object_result', 10, 2 );
add_filter( 'sanitize_file_name', 'make_filename_hash', 10 );

function modify_contact_methods( $profile_fields ) {
	$profile_fields['instagram'] = 'URL do perfil do Instagram';
	return $profile_fields;
}

function my_post_object_query( $field, $post ) {
	$field['orderby'] = 'post_date';
	$field['order'] = 'DESC';
	return $field;
}

function my_post_object_result( $title, $p ) {
	$date = date( 'j M y', strtotime( $p->post_date ) );
	return "{$date} – {$title}";
}

function make_filename_hash( $filename ) {
	$info = pathinfo( $filename );
	$ext  = empty( $info['extension'] ) ? '' : '.' . $info['extension'];
	$name = basename( $filename, $ext );
	return md5( $name ) . $ext;
}

// Functions

function my_the_category( $post_obj = '', $sep = ' – ' ) {
	global $post;
	if ( ! $post_obj ) $post_obj = $post;
	$arr = array();
	$categories = get_the_category( $post_obj->ID );
	foreach( $categories as $category )
		$arr[] = $category->cat_name;
	echo implode( $sep, $arr );
}

function my_acf_thumbnail( $image, $size = 'hero', $class = '' ) {
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
	echo '<img alt="" class="' . $class . '" height="' . $height . '" src="' . $thumb . '" width="' . $width . '" />' . "\n";
}

// Widgets

class About_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'about_widget', // Base ID
			'Sobre', // Name
			array( 'description' => '', ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$text1 = apply_filters( 'the_content', $instance['text1'] );
		$text2 = apply_filters( 'the_content', $instance['text2'] );
		$link1 = esc_url( $instance['link1'] );
		$link2 = esc_url( $instance['link2'] );

		$users = new WP_User_Query( array( 'role' => 'Contributor', 'number' => 1, 'orberby' => 'rand' ) );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		?>
		<a class="about-link" href="<?php echo $link1; ?>">
			<?php echo $text1; ?>
		</a>
		<a class="about-everyone" href="<?php echo $link2 ? $link2 : $link1; ?>">
			<?php foreach( $users->results as $user ) : ?>
			<figure class="about-collaborators">
				<?php echo get_avatar( $user->user_email, 69, 'identicon' ); ?>
				<figcaption class="collaborator-caption"><?php echo $user->display_name; ?></figcaption>
			</figure>
			<?php echo $text2; ?>
			<?php endforeach; ?>
		</a>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 */
	public function form( $instance ) {
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Sobre nós';
		$text1 = isset( $instance[ 'text1' ] ) ? $instance[ 'text1' ] : '';
		$text2 = isset( $instance[ 'text2' ] ) ? $instance[ 'text2' ] : '';
		$link1 = isset( $instance[ 'link1' ] ) ? esc_url( $instance[ 'link1' ] ) : '';
		$link2 = isset( $instance[ 'link2' ] ) ? esc_url( $instance[ 'link2' ] ) : '';
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Título:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p><strong>Sobre</strong></p>
		<p>
		<label for="<?php echo $this->get_field_id( 'text1' ); ?>">Sobre (html):</label> 
		<textarea name="<?php echo $this->get_field_name( 'text1' ); ?>" id="<?php echo $this->get_field_id( 'text1' ); ?>" cols="30" rows="6" class="widefat"><?php echo esc_attr( $text1 ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'link1' ); ?>">Linkar para:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" type="text" value="<?php echo esc_attr( $link1 ); ?>">
		</p>
		
		<p><strong>Colaboradores</strong></p>
		<p>
		<label for="<?php echo $this->get_field_id( 'text2' ); ?>">Texto (html):</label> 
		<textarea name="<?php echo $this->get_field_name( 'text2' ); ?>" id="<?php echo $this->get_field_id( 'text2' ); ?>" cols="30" rows="3" class="widefat"><?php echo esc_attr( $text2 ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'link2' ); ?>">Linkar para:</label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" type="text" value="<?php echo esc_attr( $link2 ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text1'] = ( ! empty( $new_instance['text1'] ) ) ? trim( $new_instance['text1'] ) : '';
		$instance['text2'] = ( ! empty( $new_instance['text2'] ) ) ? trim( $new_instance['text2'] ) : '';
		$instance['link1'] = ( ! empty( $new_instance['link1'] ) ) ? esc_url( trim( $new_instance['link1'] ) ) : '';
		$instance['link2'] = ( ! empty( $new_instance['link2'] ) ) ? esc_url( trim( $new_instance['link2'] ) ) : '';

		return $instance;
	}

}

function register_about_widget() {
    register_widget( 'About_Widget' );
}

add_action( 'widgets_init', 'register_about_widget' );