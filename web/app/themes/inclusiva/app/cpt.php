<?php

namespace App;

add_action( 'init',  __NAMESPACE__ . '\\create_my_post_types' );
function create_my_post_types() {
	$labels_producto = array(
		'name'               => _x( 'Productos', 'post type general name', 'incl' ),
		'singular_name'      => _x( 'Producto', 'post type singular name', 'incl' ),
		'menu_name'          => _x( 'Productos', 'admin menu', 'incl' ),
		'name_admin_bar'     => _x( 'Producto', 'Agregar Nuevo on admin bar', 'incl' ),
		'add_new'            => _x( 'Agregar Nuevo', 'Producto', 'incl' ),
		'add_new_item'       => __( 'Agregar Nuevo Producto', 'incl' ),
		'new_item'           => __( 'Nuevo Producto', 'incl' ),
		'edit_item'          => __( 'Editar Producto', 'incl' ),
		'view_item'          => __( 'Ver Producto', 'incl' ),
		'all_items'          => __( 'Todos', 'incl' ),
		'search_items'       => __( 'Buscar Productos', 'incl' ),
		'parent_item_colon'  => __( 'Producto Padre:', 'incl' ),
		'not_found'          => __( 'Ningún Producto encontrado.', 'incl' ),
		'not_found_in_trash' => __( 'Ningún Producto encontrado en la Papelera.', 'incl' )
	);

	$args_producto = array(
		'labels'             => $labels_producto,
    'description'        => __( 'Productos de AGRO RURAL.', 'incl' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type' => 'producto',
			'capabilities' => array(
				'publish_posts' => 'publish_productos',
				'edit_posts' => 'edit_productos',
				'edit_others_posts' => 'edit_others_productos',
				'delete_posts' => 'delete_productos',
				'delete_others_posts' => 'delete_others_productos',
				'read_private_posts' => 'read_private_productos',
				'edit_post' => 'edit_producto',
				'delete_post' => 'delete_producto',
				'read_post' => 'read_producto',
			),
		'has_archive'        => true,
		'hierarchical'       => true,
		'rewrite'            => array( 'slug' => 'productos' ),
		'menu_position'      => 10,
		'menu_icon'			 => 'dashicons-cart',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	$labels_banner = array(
		'name'               => _x( 'Banners', 'post type general name', 'incl' ),
		'singular_name'      => _x( 'Banner', 'post type singular name', 'incl' ),
		'menu_name'          => _x( 'Banners', 'admin menu', 'incl' ),
		'name_admin_bar'     => _x( 'Banner', 'Agregar Nuevo on admin bar', 'incl' ),
		'add_new'            => _x( 'Agregar Nuevo', 'Banner', 'incl' ),
		'add_new_item'       => __( 'Agregar Nuevo Banner', 'incl' ),
		'new_item'           => __( 'Nuevo Banner', 'incl' ),
		'edit_item'          => __( 'Editar Banner', 'incl' ),
		'view_item'          => __( 'Ver Banner', 'incl' ),
		'all_items'          => __( 'Todos', 'incl' ),
		'search_items'       => __( 'Buscar Banners', 'incl' ),
		'parent_item_colon'  => __( 'Banner Padre:', 'incl' ),
		'not_found'          => __( 'Ningún Banner encontrado.', 'incl' ),
		'not_found_in_trash' => __( 'Ningún Banner encontrado en la Papelera.', 'incl' )
	);

	$args_banner = array(
		'labels'             => $labels_banner,
        'description'        => __( 'Banners de AGRO RURAL.', 'incl' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type' => 'banner',
			'capabilities' => array(
				'publish_posts' => 'publish_banners',
				'edit_posts' => 'edit_banners',
				'edit_others_posts' => 'edit_others_banners',
				'delete_posts' => 'delete_banners',
				'delete_others_posts' => 'delete_others_banners',
				'read_private_posts' => 'read_private_banners',
				'edit_post' => 'edit_banner',
				'delete_post' => 'delete_banner',
				'read_post' => 'read_banner',
			),
		'has_archive'        => true,
		'hierarchical'       => true,
		'rewrite'            => array( 'slug' => 'banners' ),
		'menu_position'      => 10,
		'menu_icon'			 => 'dashicons-image-flip-horizontal',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
	);

	$labels_documentos = array(
		'name'               => _x( 'Documentos', 'post type general name', 'incl' ),
		'singular_name'      => _x( 'Documento', 'post type singular name', 'incl' ),
		'menu_name'          => _x( 'Documentos', 'admin menu', 'incl' ),
		'name_admin_bar'     => _x( 'Documento', 'Agregar Nuevo on admin bar', 'incl' ),
		'add_new'            => _x( 'Agregar Nuevo', 'Documento', 'incl' ),
		'add_new_item'       => __( 'Agregar Nuevo Documento', 'incl' ),
		'new_item'           => __( 'Nuevo Documento', 'incl' ),
		'edit_item'          => __( 'Editar Documento', 'incl' ),
		'view_item'          => __( 'Ver Documento', 'incl' ),
		'all_items'          => __( 'Todos', 'incl' ),
		'search_items'       => __( 'Buscar Documentos', 'incl' ),
		'parent_item_colon'  => __( 'Documento Padre:', 'incl' ),
		'not_found'          => __( 'Ningún Documento encontrado.', 'incl' ),
		'not_found_in_trash' => __( 'Ningún Documento encontrado en la Papelera.', 'incl' )
	);

	$args_documentos = array(
		'labels'             => $labels_documentos,
		'description'        => __( 'Documentos de AGRO RURAL.', 'incl' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type' => 'documento',
			'capabilities' => array(
				'publish_posts' => 'publish_documentos',
				'edit_posts' => 'edit_documentos',
				'edit_others_posts' => 'edit_others_documentos',
				'delete_posts' => 'delete_documentos',
				'delete_others_posts' => 'delete_others_documentos',
				'read_private_posts' => 'read_private_documentos',
				'edit_post' => 'edit_documento',
				'delete_post' => 'delete_documento',
				'read_post' => 'read_documento',
			),
		'has_archive'        => true,
		'hierarchical'       => true,
		'rewrite'            => array( 'slug' => 'documentos' ),
		'menu_position'      => 10,
		'menu_icon'			 => 'dashicons-archive',
		'supports'           => array( 'title', 'editor', 'author', 'revisions' )
	);

	$labels_convocatorias = array(
		'name'               => _x( 'Convocatorias', 'post type general name', 'incl' ),
		'singular_name'      => _x( 'Convocatoria', 'post type singular name', 'incl' ),
		'menu_name'          => _x( 'Convocatorias', 'admin menu', 'incl' ),
		'name_admin_bar'     => _x( 'Convocatoria', 'Agregar Nueva on admin bar', 'incl' ),
		'add_new'            => _x( 'Agregar Nueva', 'Convocatoria', 'incl' ),
		'add_new_item'       => __( 'Agregar Nueva Convocatoria', 'incl' ),
		'new_item'           => __( 'Nueva Convocatoria', 'incl' ),
		'edit_item'          => __( 'Editar Convocatoria', 'incl' ),
		'view_item'          => __( 'Ver Convocatoria', 'incl' ),
		'all_items'          => __( 'Todas', 'incl' ),
		'search_items'       => __( 'Buscar Convocatorias', 'incl' ),
		'parent_item_colon'  => __( 'Convocatoria Padre:', 'incl' ),
		'not_found'          => __( 'Ninguna Convocatoria encontrado.', 'incl' ),
		'not_found_in_trash' => __( 'Ninguna Convocatoria encontrado en la Papelera.', 'incl' )
	);

	$args_convocatorias = array(
		'labels'             => $labels_convocatorias,
		'description'        => __( 'Convocatorias de AGRO RURAL.', 'incl' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type' => 'convocatoria',
			'capabilities' => array(
				'publish_posts' => 'publish_convocatorias',
				'edit_posts' => 'edit_convocatorias',
				'edit_others_posts' => 'edit_others_convocatorias',
				'delete_posts' => 'delete_convocatorias',
				'delete_others_posts' => 'delete_others_convocatorias',
				'read_private_posts' => 'read_private_convocatorias',
				'edit_post' => 'edit_convocatoria',
				'delete_post' => 'delete_convocatoria',
				'read_post' => 'read_convocatoria',
			),
		'has_archive'        => true,
		'hierarchical'       => true,
		'rewrite'            => array( 'slug' => 'convocatorias' ),
		'menu_position'      => 5,
		'menu_icon'			 => 'dashicons-nametag',
		'supports'           => array( 'title', 'editor', 'author', 'revisions' )
	);

	$labels_servicios = array(
		'name'               => _x( 'Servicios', 'post type general name', 'incl' ),
		'singular_name'      => _x( 'Servicio', 'post type singular name', 'incl' ),
		'menu_name'          => _x( 'Servicios', 'admin menu', 'incl' ),
		'name_admin_bar'     => _x( 'Servicio', 'Agregar Nueva on admin bar', 'incl' ),
		'add_new'            => _x( 'Agregar Nuevo', 'Servicio', 'incl' ),
		'add_new_item'       => __( 'Agregar Nuevo Servicio', 'incl' ),
		'new_item'           => __( 'Nuevo Servicio', 'incl' ),
		'edit_item'          => __( 'Editar Servicio', 'incl' ),
		'view_item'          => __( 'Ver Servicio', 'incl' ),
		'all_items'          => __( 'Todos', 'incl' ),
		'search_items'       => __( 'Buscar Servicios', 'incl' ),
		'parent_item_colon'  => __( 'Servicio Padre:', 'incl' ),
		'not_found'          => __( 'Ningún Servicio encontrado.', 'incl' ),
		'not_found_in_trash' => __( 'Ningún Servicio encontrado en la Papelera.', 'incl' )
	);

	$args_servicios = array(
		'labels'             => $labels_servicios,
		'description'        => __( 'Servicios de AGRO RURAL.', 'incl' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type' => 'servicio',
			'capabilities' => array(
				'publish_posts' => 'publish_servicios',
				'edit_posts' => 'edit_servicios',
				'edit_others_posts' => 'edit_others_servicios',
				'delete_posts' => 'delete_servicios',
				'delete_others_posts' => 'delete_others_servicios',
				'read_private_posts' => 'read_private_servicios',
				'edit_post' => 'edit_servicio',
				'delete_post' => 'delete_servicio',
				'read_post' => 'read_servicio',
			),
		'has_archive'        => true,
		'hierarchical'       => true,
		'rewrite'            => array( 'slug' => 'servicios' ),
		'menu_position'      => 5,
		'menu_icon'			 => 'dashicons-businessman',
		'supports'           => array( 'title', 'editor', 'author', 'revisions', 'thumbnail' )
	);

	$labels_directorios = array(
		'name'               => _x( 'Directorios', 'post type general name', 'incl' ),
		'singular_name'      => _x( 'Directorio', 'post type singular name', 'incl' ),
		'menu_name'          => _x( 'Directorios', 'admin menu', 'incl' ),
		'name_admin_bar'     => _x( 'Directorio', 'Agregar Nuevo on admin bar', 'incl' ),
		'add_new'            => _x( 'Agregar Nuevo', 'Directorio', 'incl' ),
		'add_new_item'       => __( 'Agregar Nuevo Directorio', 'incl' ),
		'new_item'           => __( 'Nuevo Directorio', 'incl' ),
		'edit_item'          => __( 'Editar Directorio', 'incl' ),
		'view_item'          => __( 'Ver Directorio', 'incl' ),
		'all_items'          => __( 'Todos', 'incl' ),
		'search_items'       => __( 'Buscar Directorios', 'incl' ),
		'parent_item_colon'  => __( 'Directorio Padre:', 'incl' ),
		'not_found'          => __( 'Ningún Directorio encontrado.', 'incl' ),
		'not_found_in_trash' => __( 'Ningún Directorio encontrado en la Papelera.', 'incl' )
	);

	$args_directorios = array(
		'labels'             => $labels_directorios,
		'description'        => __( 'Directorios de AGRO RURAL.', 'incl' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type' => 'directorio',
			'capabilities' => array(
				'publish_posts' => 'publish_directorios',
				'edit_posts' => 'edit_directorios',
				'edit_others_posts' => 'edit_others_directorios',
				'delete_posts' => 'delete_directorios',
				'delete_others_posts' => 'delete_others_directorios',
				'read_private_posts' => 'read_private_directorios',
				'edit_post' => 'edit_directorio',
				'delete_post' => 'delete_directorio',
				'read_post' => 'read_directorio',
			),
		'has_archive'        => true,
		'hierarchical'       => true,
		'rewrite'            => array( 'slug' => 'directorios' ),
		'menu_position'      => 5,
		'menu_icon'			 => 'dashicons-groups',
		'supports'           => array( 'title', 'editor', 'author', 'revisions' )
	);

	register_post_type('producto', $args_producto);
	register_post_type('banners', $args_banner);
	register_post_type('documentos', $args_documentos);
	register_post_type('convocatorias', $args_convocatorias);
	register_post_type('servicios', $args_servicios);
	register_post_type('directorios', $args_directorios);
}

add_action( 'init',  __NAMESPACE__ . '\\create_my_taxonomies', 0 );
function create_my_taxonomies() {
	// Agregar Nuevo taxonomy, make it hierarchical (like categories)
	$labels_producto_productor = array(
		'name'              => _x( 'Productores', 'taxonomy general name' ),
		'singular_name'     => _x( 'Productor', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar productores' ),
		'all_items'         => __( 'Todos los  productores' ),
		'parent_item'       => __( 'Productor Padre' ),
		'parent_item_colon' => __( 'Productor Padre:' ),
		'edit_item'         => __( 'Editar productor' ),
		'update_item'       => __( 'Actualizar productor' ),
		'add_new_item'      => __( 'Agregar Nuevo productor' ),
		'new_item_name'     => __( 'Nombre de Nuevo productor' ),
		'menu_name'         => __( 'Productores' )
	);

	$args_producto_productor = array(
		'public' 			=> true,
		'hierarchical'      => false,
		'labels'            => $labels_producto_productor,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_productor',
			'edit_terms' => 'edit_productor',
			'delete_terms' => 'delete_productor',
			'assign_terms' => 'assign_productor'
		)
	);

	$labels_producto_marca = array(
		'name'              => _x( 'Marcas', 'taxonomy general name' ),
		'singular_name'     => _x( 'Marca', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Marcas' ),
		'all_items'         => __( 'Todos las  Marcas' ),
		'parent_item'       => __( 'Marca Padre' ),
		'parent_item_colon' => __( 'Marca Padre:' ),
		'edit_item'         => __( 'Editar Marca' ),
		'update_item'       => __( 'Actualizar Marca' ),
		'add_new_item'      => __( 'Agregar Nueva Marca' ),
		'new_item_name'     => __( 'Nombre de Nueva Marca' ),
		'menu_name'         => __( 'Marcas' )
	);

	$args_producto_marca = array(
		'public' 			=> true,
		'hierarchical'      => false,
		'labels'            => $labels_producto_marca,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_marca',
			'edit_terms' => 'edit_marca',
			'delete_terms' => 'delete_marca',
			'assign_terms' => 'assign_marca'
		)
	);

	$labels_producto_lugar = array(
		'name'              => _x( 'Lugares', 'taxonomy general name' ),
		'singular_name'     => _x( 'Lugar', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Lugares' ),
		'all_items'         => __( 'Todos los  Lugares' ),
		'parent_item'       => __( 'Lugar Padre' ),
		'parent_item_colon' => __( 'Lugar Padre:' ),
		'edit_item'         => __( 'Editar Lugar' ),
		'update_item'       => __( 'Actualizar Lugar' ),
		'add_new_item'      => __( 'Agregar Nuevo Lugar' ),
		'new_item_name'     => __( 'Nombre de Nuevo Lugar' ),
		'menu_name'         => __( 'Lugares' )
	);

	$args_producto_lugar = array(
		'public' 			=> true,
		'hierarchical'      => true,
		'labels'            => $labels_producto_lugar,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_lugar',
			'edit_terms' => 'edit_lugar',
			'delete_terms' => 'delete_lugar',
			'assign_terms' => 'assign_lugar'
		)
	);

	$labels_producto_clasificacion = array(
		'name'              => _x( 'Clasificaciones', 'taxonomy general name' ),
		'singular_name'     => _x( 'Clasificación', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Clasificaciones' ),
		'all_items'         => __( 'Todos las Clasificaciones' ),
		'parent_item'       => __( 'Clasificación Padre' ),
		'parent_item_colon' => __( 'Clasificación Padre:' ),
		'edit_item'         => __( 'Editar Clasificación' ),
		'update_item'       => __( 'Actualizar Clasificación' ),
		'add_new_item'      => __( 'Agregar Nueva Clasificación' ),
		'new_item_name'     => __( 'Nombre de Nueva Clasificación' ),
		'menu_name'         => __( 'Clasificaciones' )
	);

	$args_producto_clasificacion = array(
		'public' 			=> true,
		'hierarchical'      => true,
		'labels'            => $labels_producto_clasificacion,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_clasificacion',
			'edit_terms' => 'edit_clasificacion',
			'delete_terms' => 'delete_clasificacion',
			'assign_terms' => 'assign_clasificacion'
		)
	);

	$labels_banner_posicion = array(
		'name'              => _x( 'Posiciones', 'taxonomy general name' ),
		'singular_name'     => _x( 'Posición', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Posiciones' ),
		'all_items'         => __( 'Todas las  Posiciones' ),
		'parent_item'       => __( 'Posición Padre' ),
		'parent_item_colon' => __( 'Posición Padre:' ),
		'edit_item'         => __( 'Editar posición' ),
		'update_item'       => __( 'Actualizar posición' ),
		'add_new_item'      => __( 'Agregar Nueva posición' ),
		'new_item_name'     => __( 'Nombre de Nueva posición' ),
		'menu_name'         => __( 'Posiciones' )
	);

	$args_banner_posicion = array(
		'public' 			=> true,
		'hierarchical'      => true,
		'labels'            => $labels_banner_posicion,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_posicion',
			'edit_terms' => 'edit_posicion',
			'delete_terms' => 'delete_posicion',
			'assign_terms' => 'assign_posicion'
		)
	);

	$labels_documentos_tipos = array(
		'name'              => _x( 'Tipos', 'taxonomy general name' ),
		'singular_name'     => _x( 'Tipo', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Tipos' ),
		'all_items'         => __( 'Todos los  Tipos' ),
		'parent_item'       => __( 'Tipo Padre' ),
		'parent_item_colon' => __( 'Tipo Padre:' ),
		'edit_item'         => __( 'Editar Tipo' ),
		'update_item'       => __( 'Actualizar Tipo' ),
		'add_new_item'      => __( 'Agregar Nuevo Tipo' ),
		'new_item_name'     => __( 'Nombre de Nuevo Tipo' ),
		'menu_name'         => __( 'Tipos' )
	);

	$args_documentos_tipos = array(
		'public' 			=> true,
		'hierarchical'      => true,
		'labels'            => $labels_documentos_tipos,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_tipo',
			'edit_terms' => 'edit_tipo',
			'delete_terms' => 'delete_tipo',
			'assign_terms' => 'assign_tipo'
		)
	);

	$labels_convocatorias_categorias = array(
		'name'              => _x( 'Categorías', 'taxonomy general name' ),
		'singular_name'     => _x( 'Categoría', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Categorías' ),
		'all_items'         => __( 'Todas las  Categorías' ),
		'parent_item'       => __( 'Categoría Padre' ),
		'parent_item_colon' => __( 'Categoría Padre:' ),
		'edit_item'         => __( 'Editar Categoría' ),
		'update_item'       => __( 'Actualizar Categoría' ),
		'add_new_item'      => __( 'Agregar Nueva Categoría' ),
		'new_item_name'     => __( 'Nombre de Nueva Categoría' ),
		'menu_name'         => __( 'Categorías' )
	);

	$args_convocatorias_categorias = array(
		'public' 			=> true,
		'hierarchical'      => true,
		'labels'            => $labels_convocatorias_categorias,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_cat-convocatorias',
			'edit_terms' => 'edit_cat-convocatorias',
			'delete_terms' => 'delete_cat-convocatorias',
			'assign_terms' => 'assign_cat-convocatorias'
		)
	);

	$labels_convocatorias_estados = array(
		'name'              => _x( 'Estados', 'taxonomy general name' ),
		'singular_name'     => _x( 'Estado', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Estados' ),
		'all_items'         => __( 'Todas los  Estados' ),
		'parent_item'       => __( 'Estado Padre' ),
		'parent_item_colon' => __( 'Estado Padre:' ),
		'edit_item'         => __( 'Editar Estado' ),
		'update_item'       => __( 'Actualizar Estado' ),
		'add_new_item'      => __( 'Agregar Nuevo Estado' ),
		'new_item_name'     => __( 'Nombre de Nuevo Estado' ),
		'menu_name'         => __( 'Estados' )
	);

	$args_convocatorias_estados = array(
		'public' 			=> true,
		'hierarchical'      => true,
		'labels'            => $labels_convocatorias_estados,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_est-convocatorias',
			'edit_terms' => 'edit_est-convocatorias',
			'delete_terms' => 'delete_est-convocatorias',
			'assign_terms' => 'assign_est-convocatorias'
		)
	);

	$labels_servicios_condiciones = array(
		'name'              => _x( 'Condiciones', 'taxonomy general name' ),
		'singular_name'     => _x( 'Condición', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Condiciones' ),
		'all_items'         => __( 'Todas las  Condiciones' ),
		'parent_item'       => __( 'Condición Padre' ),
		'parent_item_colon' => __( 'Condición Padre:' ),
		'edit_item'         => __( 'Editar Condición' ),
		'update_item'       => __( 'Actualizar Condición' ),
		'add_new_item'      => __( 'Agregar Nueva Condición' ),
		'new_item_name'     => __( 'Nombre de Nueva Condición' ),
		'menu_name'         => __( 'Condiciones' )
	);

	$args_servicios_condiciones = array(
		'public' 			=> true,
		'hierarchical'      => true,
		'labels'            => $labels_servicios_condiciones,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_condiciones',
			'edit_terms' => 'edit_condiciones',
			'delete_terms' => 'delete_condiciones',
			'assign_terms' => 'assign_condiciones'
		)
	);

	$labels_directorios_grupos = array(
		'name'              => _x( 'Grupos', 'taxonomy general name' ),
		'singular_name'     => _x( 'Grupo', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Grupos' ),
		'all_items'         => __( 'Todos los  Grupos' ),
		'parent_item'       => __( 'Grupo Padre' ),
		'parent_item_colon' => __( 'Grupo Padre:' ),
		'edit_item'         => __( 'Editar Grupo' ),
		'update_item'       => __( 'Actualizar Grupo' ),
		'add_new_item'      => __( 'Agregar Nuevo Grupo' ),
		'new_item_name'     => __( 'Nombre de Nuevo Grupo' ),
		'menu_name'         => __( 'Grupos' )
	);

	$args_directorios_grupos = array(
		'public' 			=> true,
		'hierarchical'      => true,
		'labels'            => $labels_directorios_grupos,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'capabilities'		=> array(
			'manage_terms' => 'manage_grupos',
			'edit_terms' => 'edit_grupos',
			'delete_terms' => 'delete_grupos',
			'assign_terms' => 'assign_grupos'
		)
	);

	register_taxonomy( 'productor', 'producto', $args_producto_productor );
	register_taxonomy( 'marca', 'producto', $args_producto_marca );
	register_taxonomy( 'lugar', 'producto', $args_producto_lugar );
	register_taxonomy( 'clasificacion', 'producto', $args_producto_clasificacion );
	register_taxonomy( 'posiciones', 'banners', $args_banner_posicion );
	register_taxonomy( 'tipos', 'documentos', $args_documentos_tipos );
	register_taxonomy( 'cat-convocatorias', 'convocatorias', $args_convocatorias_categorias );
	register_taxonomy( 'est-convocatorias', 'convocatorias', $args_convocatorias_estados );
	register_taxonomy( 'condiciones', 'servicios', $args_convocatorias_estados );
	register_taxonomy( 'grupos', 'directorios', $args_directorios_grupos );
}

add_filter( 'map_meta_cap',  __NAMESPACE__ . '\\producto_meta_cap', 10, 4 );

function producto_meta_cap( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a producto, get the post and post type object. */
	if ( 'edit_producto' == $cap || 'delete_producto' == $cap || 'read_producto' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a producto, assign the required capability. */
	if ( 'edit_producto' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a producto, assign the required capability. */
	elseif ( 'delete_producto' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private producto, assign the required capability. */
	elseif ( 'read_producto' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

add_filter( 'map_meta_cap',  __NAMESPACE__ . '\\banner_meta_cap', 10, 4 );

function banner_meta_cap( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a banner, get the post and post type object. */
	if ( 'edit_banner' == $cap || 'delete_banner' == $cap || 'read_banner' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a banner, assign the required capability. */
	if ( 'edit_banner' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a banner, assign the required capability. */
	elseif ( 'delete_banner' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private banner, assign the required capability. */
	elseif ( 'read_banner' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

add_filter( 'map_meta_cap',  __NAMESPACE__ . '\\documento_meta_cap', 10, 4 );

function documento_meta_cap( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a documento, get the post and post type object. */
	if ( 'edit_documento' == $cap || 'delete_documento' == $cap || 'read_documento' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a documento, assign the required capability. */
	if ( 'edit_documento' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a documento, assign the required capability. */
	elseif ( 'delete_documento' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private documento, assign the required capability. */
	elseif ( 'read_documento' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

add_filter( 'map_meta_cap',  __NAMESPACE__ . '\\convocatoria_meta_cap', 10, 4 );

function convocatoria_meta_cap( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a convocatoria, get the post and post type object. */
	if ( 'edit_convocatoria' == $cap || 'delete_convocatoria' == $cap || 'read_convocatoria' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a convocatoria, assign the required capability. */
	if ( 'edit_convocatoria' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a convocatoria, assign the required capability. */
	elseif ( 'delete_convocatoria' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private convocatoria, assign the required capability. */
	elseif ( 'read_convocatoria' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

add_filter( 'map_meta_cap',  __NAMESPACE__ . '\\servicio_meta_cap', 10, 4 );

function servicio_meta_cap( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a servicio, get the post and post type object. */
	if ( 'edit_servicio' == $cap || 'delete_servicio' == $cap || 'read_servicio' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a servicio, assign the required capability. */
	if ( 'edit_servicio' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a servicio, assign the required capability. */
	elseif ( 'delete_servicio' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private servicio, assign the required capability. */
	elseif ( 'read_servicio' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}

add_filter( 'map_meta_cap',  __NAMESPACE__ . '\\directorio_meta_cap', 10, 4 );

function directorio_meta_cap( $caps, $cap, $user_id, $args ) {

	/* If editing, deleting, or reading a directorio, get the post and post type object. */
	if ( 'edit_directorio' == $cap || 'delete_directorio' == $cap || 'read_directorio' == $cap ) {
		$post = get_post( $args[0] );
		$post_type = get_post_type_object( $post->post_type );

		/* Set an empty array for the caps. */
		$caps = array();
	}

	/* If editing a directorio, assign the required capability. */
	if ( 'edit_directorio' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->edit_posts;
		else
			$caps[] = $post_type->cap->edit_others_posts;
	}

	/* If deleting a directorio, assign the required capability. */
	elseif ( 'delete_directorio' == $cap ) {
		if ( $user_id == $post->post_author )
			$caps[] = $post_type->cap->delete_posts;
		else
			$caps[] = $post_type->cap->delete_others_posts;
	}

	/* If reading a private directorio, assign the required capability. */
	elseif ( 'read_directorio' == $cap ) {

		if ( 'private' != $post->post_status )
			$caps[] = 'read';
		elseif ( $user_id == $post->post_author )
			$caps[] = 'read';
		else
			$caps[] = $post_type->cap->read_private_posts;
	}

	/* Return the capabilities required by the user. */
	return $caps;
}