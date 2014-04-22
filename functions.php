<?php
/**
 * @package WordPress
 * @subpackage Augusto_Rédua
 * @since Augusto Rédua 1.0
 */


/*********** Reset ***********
*****************************/

// Clean up the <head>
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

// Remove Version
function remove_version() {
	return '';
}
add_filter( 'the_generator', 'remove_version' );

// Hide Admin Bar
add_filter( 'show_admin_bar', '__return_false' );

// Custom Login
function custom_login_logo() {
	echo '<style type="text/css">div#login h1 a { background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; background-size: auto 100%!important; margin: 0 auto; width: auto; }</style>';
}
add_action( 'login_head', 'custom_login_logo' );

function custom_login_url() {
	return get_bloginfo('url');
}
add_filter( 'login_headerurl', 'custom_login_url' );

function custom_login_title() {
	return get_option('blogname');
}
add_filter( 'login_headertitle', 'custom_login_title' );


/*********** Setup ***********
*****************************/
function theme_setup() {

	// This theme uses featured images
	add_theme_support( 'post-thumbnails' );

	// Size thumbnail
	add_image_size( 'thumbnail_client', 195, 195, true );
	add_image_size( 'result', 320, 400, true );

}
add_action( 'after_setup_theme', 'theme_setup' );


/***** Custom Post Type *****
*****************************/

// Depoimentos
function testimony() {
	$labels = array(
		'name' => 'Depoimentos',
		'singular_name' => 'Depoimento',
		'add_new' => 'Adicionar novo Depoimento',
		'add_new_item' => 'Adicionar novo Depoimento',
		'edit_item' =>'Editar Depoimento',
		'new_item' => 'Novo Depoimento',
		'view_item' => 'Visualizar Depoimento',
		'search_items' => 'Buscar Depoimentos',
		'not_found' => 'Depoimento n&atilde;o encontrado',
		'not_found_in_trash' => 'Depoimento n&atilde;o encontrado no Lixo',
		'parent_item_colon' => 'Depoimento Parente:',
		'menu_name' => 'Depoimentos'
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Depoimentos dos clientes',
		'supports' => array( 'title', 'thumbnail', 'excerpt' ),
		'taxonomies' => array( 'depoimentos' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'menu_position' => 5,
		'menu_icon' => get_bloginfo('template_url').'/images/icon-testimony.png',
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array( 'slug' => 'depoimento', 'with_front' => false ),
		'capability_type' => 'post'
	);

	register_post_type( 'depoimentos', $args );
}
add_action( 'init', 'testimony' );

// Resultados
function result() {
	$labels = array(
		'name' => 'Resultados',
		'singular_name' => 'Resultado',
		'add_new' => 'Adicionar novo Resultado',
		'add_new_item' => 'Adicionar novo Resultado',
		'edit_item' =>'Editar Resultado',
		'new_item' => 'Novo Resultado',
		'view_item' => 'Visualizar Resultado',
		'search_items' => 'Buscar Resultados',
		'not_found' => 'Resultado n&atilde;o encontrado',
		'not_found_in_trash' => 'Resultado n&atilde;o encontrado no Lixo',
		'parent_item_colon' => 'Resultado Parente:',
		'menu_name' => 'Resultados'
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Resultado dos clientes',
		'supports' => array( 'title' ),
		'taxonomies' => array( 'resultados' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'menu_position' => 5,
		'menu_icon' => get_bloginfo('template_url').'/images/icon-result.png',
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array( 'slug' => 'resultado', 'with_front' => false ),
		'capability_type' => 'post'
	);

	register_post_type( 'resultados', $args );
}
add_action( 'init', 'result' );


/********* Meta Box *********
*****************************/

// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/inc/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/inc/meta-box' ) );

// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';

// Register Meta Boxes
function register_meta_boxes( $meta_boxes ) {
	$prefix = 'rw_';

	// 1st meta box
	$meta_boxes[] = array(
		'id' => 'dados_do_treino', // $id
		'title' => 'Dados do treino', // $title
		'pages' => array( 'resultados' ), // $post_type 'post', 'page' or 'custom_post_type'
		'context' => 'normal', // $context 'normal', 'advanced', or 'side'
		'priority' => 'default', // $priority 'high', 'core', 'default' or 'low'
		'autosave' => false, // true, false (default).

		'fields' => array(
			// HEADING
			array(
				'type' => 'heading',
				'name' => 'Tempo',
				'id'   => 'fake_id', // Not used but needed for plugin
			),
			// TEXT
			array(
				'name'  => 'Semanas',
				'id'    => $prefix.'semanas',
				'desc'  => 'Preencha o campo apenas com números',
				'type'  => 'text',
				'std'   => '16',
			),

			// HEADING
			array(
				'type' => 'heading',
				'name' => 'Antes',
				'id'   => 'fake_id', // Not used but needed for plugin
			),
			// TEXT
			array(
				'name'  => 'Peso (KG)',
				'id'    => $prefix.'peso_antes',
				'desc'  => 'Preencha o campo apenas com números',
				'type'  => 'text',
			),
			array(
				'name'  => 'Gordura (%)',
				'id'    => $prefix.'gordura_antes',
				'desc'  => 'Preencha o campo apenas com números',
				'type'  => 'text',
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => 'Foto (Antes)',
				'id'               => $prefix.'foto_antes',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),

			// HEADING
			array(
				'type' => 'heading',
				'name' => 'Depois',
				'id'   => 'fake_id', // Not used but needed for plugin
			),
			// TEXT
			array(
				'name'  => 'Peso (KG)',
				'id'    => $prefix.'peso_depois',
				'desc'  => 'Preencha o campo apenas com números',
				'type'  => 'text',
			),
			array(
				'name'  => 'Gordura (%)',
				'id'    => $prefix.'gordura_depois',
				'desc'  => 'Preencha o campo apenas com números',
				'type'  => 'text',
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => 'Foto (Depois)',
				'id'               => $prefix.'foto_depois',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
		)
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'register_meta_boxes' );


/******* Contato Ajax ********
*****************************/

// Form
function contato_ajax() {
	include_once 'form.php';
	die("");
}
add_action( 'wp_ajax_contato_ajax', 'contato_ajax' );
add_action( 'wp_ajax_nopriv_contato_ajax', 'contato_ajax' );

?>