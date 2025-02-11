<?php

add_theme_support('post-thumbnails');
set_post_thumbnail_size(800, 480);
add_image_size('vignette', 220, 100, true);

// enlever les attributs width / height des balises images insérées
// avec the_post_thumbnail
function cw4_img_no_attributes( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter('post_thumbnail_html', 'cw4_img_no_attributes', 10, 3);

function new_excerpt_length($length) {
    return 10; // Nombre de mots limite des résumés
}
add_filter('excerpt_length', 'new_excerpt_length');

// menu
register_nav_menus(array(
    'menu_header_vedette' => 'Liens Vedettes', // slug => nom dans l'interface
    'menu_header_sections' => 'Pages dans le menu' // slug => nom dans l'interface
));

// on vérifie si acf pro est installé
if ( function_exists('acf_add_options_page') ) {
    // on ajoute une page d'option
    acf_add_options_page(array(
    'page_title' => 'Options générales Accueil',
    'menu_title' => 'Options du thème',
    'menu_slug' => 'theme-options',
    'capability' => 'edit_posts',
    'redirect' => false
    ));
}

// Register Custom Post Type
function jobs() {

	$labels = array(
		'name'                  => _x( 'Emplois', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Emploi', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Emplois', 'text_domain' ),
		'name_admin_bar'        => __( 'Emploi', 'text_domain' ),
		'archives'              => __( 'Archives des emplois', 'text_domain' ),
		'attributes'            => __( 'Attributs de l\'emploi', 'text_domain' ),
		'parent_item_colon'     => __( 'Emploi parent :', 'text_domain' ),
		'all_items'             => __( 'Tous les emplois', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter un nouvel emploi', 'text_domain' ),
		'add_new'               => __( 'Ajouter un emploi', 'text_domain' ),
		'new_item'              => __( 'Nouvel emploi', 'text_domain' ),
		'edit_item'             => __( 'Modifier l\'emploi', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour l\'emploi', 'text_domain' ),
		'view_item'             => __( 'Voir l\'emploi', 'text_domain' ),
		'view_items'            => __( 'Voir les emplois', 'text_domain' ),
		'search_items'          => __( 'Chercher un emploi', 'text_domain' ),
		'not_found'             => __( 'Introuvable', 'text_domain' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image en avant', 'text_domain' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans l\'emploi', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Ajouté à cet emploi', 'text_domain' ),
		'items_list'            => __( 'Liste des emplois', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation de la liste des emplois', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer la liste des emplois', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Emploi', 'text_domain' ),
		'description'           => __( 'Postes d\'emploi', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'job', $args );

}
add_action( 'init', 'jobs', 0 );

// Register Custom Post Type
function news() {

	$labels = array(
		'name'                  => _x( 'Actualités', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Actualité', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Actualités', 'text_domain' ),
		'name_admin_bar'        => __( 'Actualité', 'text_domain' ),
		'archives'              => __( 'Archives des actualités', 'text_domain' ),
		'attributes'            => __( 'Attributs des actualités', 'text_domain' ),
		'parent_item_colon'     => __( 'Actualité parent :', 'text_domain' ),
		'all_items'             => __( 'Toutes les actualités', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une actualité', 'text_domain' ),
		'add_new'               => __( 'Ajouter une actualité', 'text_domain' ),
		'new_item'              => __( 'Nouvelle actualité', 'text_domain' ),
		'edit_item'             => __( 'Modifier l\'actualité', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour l\'actualité', 'text_domain' ),
		'view_item'             => __( 'Voir l\'actualité', 'text_domain' ),
		'view_items'            => __( 'Voir les actualités', 'text_domain' ),
		'search_items'          => __( 'Chercher une actualité', 'text_domain' ),
		'not_found'             => __( 'Introuvable', 'text_domain' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image en avant', 'text_domain' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans l\'actualité', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Ajouté à cette actualité', 'text_domain' ),
		'items_list'            => __( 'Liste des actualités', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation de la liste des actualités', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer la liste des actualités', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Actualité', 'text_domain' ),
		'description'           => __( 'Actualités', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'new', $args );

}
add_action( 'init', 'news', 0 );

// Register Custom Post Type
function forfaits() {

	$labels = array(
		'name'                  => _x( 'Forfaits', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Forfait', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Forfaits', 'text_domain' ),
		'name_admin_bar'        => __( 'Forfait', 'text_domain' ),
		'archives'              => __( 'Archives des forfaits', 'text_domain' ),
		'attributes'            => __( 'Attributs des forfaits', 'text_domain' ),
		'parent_item_colon'     => __( 'Forfait parent :', 'text_domain' ),
		'all_items'             => __( 'Tous les forfaits', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter un forfait', 'text_domain' ),
		'add_new'               => __( 'Ajouter un forfait', 'text_domain' ),
		'new_item'              => __( 'Nouveau forfait', 'text_domain' ),
		'edit_item'             => __( 'Modifier le forfait', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour le forfait', 'text_domain' ),
		'view_item'             => __( 'Voir le forfait', 'text_domain' ),
		'view_items'            => __( 'Voir les forfaits', 'text_domain' ),
		'search_items'          => __( 'Chercher un forfait', 'text_domain' ),
		'not_found'             => __( 'Introuvable', 'text_domain' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image en avant', 'text_domain' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans le forfait', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Ajouté à ce forfait', 'text_domain' ),
		'items_list'            => __( 'Liste des forfaits', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation de la liste des forfaits', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer la liste des forfaits', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Forfait', 'text_domain' ),
		'description'           => __( 'Forfaits', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'forfait', $args );

}
add_action( 'init', 'forfaits', 0 );

// Register Custom Post Type
function services() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Services', 'text_domain' ),
		'name_admin_bar'        => __( 'Service', 'text_domain' ),
		'archives'              => __( 'Archives des services', 'text_domain' ),
		'attributes'            => __( 'Attributs des services', 'text_domain' ),
		'parent_item_colon'     => __( 'Service parent :', 'text_domain' ),
		'all_items'             => __( 'Tous les services', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter un service', 'text_domain' ),
		'add_new'               => __( 'Ajouter un service', 'text_domain' ),
		'new_item'              => __( 'Nouveau service', 'text_domain' ),
		'edit_item'             => __( 'Modifier le service', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour le service', 'text_domain' ),
		'view_item'             => __( 'Voir le service', 'text_domain' ),
		'view_items'            => __( 'Voir les services', 'text_domain' ),
		'search_items'          => __( 'Chercher un service', 'text_domain' ),
		'not_found'             => __( 'Introuvable', 'text_domain' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image en avant', 'text_domain' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans le service', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Ajouté à ce service', 'text_domain' ),
		'items_list'            => __( 'Liste des services', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation de la liste des services', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer la liste des services', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'text_domain' ),
		'description'           => __( 'Services', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'services', 0 );