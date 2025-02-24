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
    'menu_header_sections' => 'Pages dans le menu', // slug => nom dans l'interface
    'menu_header_language' => 'Lien de la langue' // slug => nom dans l'interface
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
		'menu_icon'             => 'dashicons-text-page',
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

// Register Custom Post Type
function sessions() {

	$labels = array(
		'name'                  => _x( 'Séances', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Séance', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Séances', 'text_domain' ),
		'name_admin_bar'        => __( 'Séance', 'text_domain' ),
		'archives'              => __( 'Archives des séances', 'text_domain' ),
		'attributes'            => __( 'Attributs des séances', 'text_domain' ),
		'parent_item_colon'     => __( 'Séance parente :', 'text_domain' ),
		'all_items'             => __( 'Toutes les séances', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une séance', 'text_domain' ),
		'add_new'               => __( 'Ajouter une séance', 'text_domain' ),
		'new_item'              => __( 'Nouvelle séance', 'text_domain' ),
		'edit_item'             => __( 'Modifier la séance', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la séance', 'text_domain' ),
		'view_item'             => __( 'Voir la séance', 'text_domain' ),
		'view_items'            => __( 'Voir les séances', 'text_domain' ),
		'search_items'          => __( 'Chercher une séance', 'text_domain' ),
		'not_found'             => __( 'Introuvable', 'text_domain' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image en avant', 'text_domain' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans la séance', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Ajouté à cette séance', 'text_domain' ),
		'items_list'            => __( 'Liste des séances', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation de la liste des séances', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer la liste des séances', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Séance', 'text_domain' ),
		'description'           => __( 'Séances', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-clock',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'session', $args );

}
add_action( 'init', 'sessions', 0 );

// Register Custom Post Type
function events() {

	$labels = array(
		'name'                  => _x( 'Dates importantes', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Date importante', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Dates importantes', 'text_domain' ),
		'name_admin_bar'        => __( 'Date importante', 'text_domain' ),
		'archives'              => __( 'Archives des dates importantes', 'text_domain' ),
		'attributes'            => __( 'Attributs des dates importantes', 'text_domain' ),
		'parent_item_colon'     => __( 'Date parente :', 'text_domain' ),
		'all_items'             => __( 'Toutes les dates importantes', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une date', 'text_domain' ),
		'add_new'               => __( 'Ajouter une date', 'text_domain' ),
		'new_item'              => __( 'Nouvelle date', 'text_domain' ),
		'edit_item'             => __( 'Modifier la date', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la date', 'text_domain' ),
		'view_item'             => __( 'Voir la date', 'text_domain' ),
		'view_items'            => __( 'Voir les dates importantes', 'text_domain' ),
		'search_items'          => __( 'Chercher une date', 'text_domain' ),
		'not_found'             => __( 'Introuvable', 'text_domain' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image en avant', 'text_domain' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans la date', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Ajouté à cette date', 'text_domain' ),
		'items_list'            => __( 'Liste des dates importantes', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation de la liste des dates importantes', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer la liste des dates importantes', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Date importante', 'text_domain' ),
		'description'           => __( 'Dates importantes', 'text_domain' ),
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
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'events', 0 );

// Register Custom Post Type
function employees() {

	$labels = array(
		'name'                  => _x( 'Employés', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Employé', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Employés', 'text_domain' ),
		'name_admin_bar'        => __( 'Employé', 'text_domain' ),
		'archives'              => __( 'Archives des employés', 'text_domain' ),
		'attributes'            => __( 'Attributs des employés', 'text_domain' ),
		'parent_item_colon'     => __( 'Employé parent :', 'text_domain' ),
		'all_items'             => __( 'Toutes les employés', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter un employé', 'text_domain' ),
		'add_new'               => __( 'Ajouter un employé', 'text_domain' ),
		'new_item'              => __( 'Nouvel employé', 'text_domain' ),
		'edit_item'             => __( 'Modifier l\'employé', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour l\'employé', 'text_domain' ),
		'view_item'             => __( 'Voir l\'employé', 'text_domain' ),
		'view_items'            => __( 'Voir les employés', 'text_domain' ),
		'search_items'          => __( 'Chercher un employé', 'text_domain' ),
		'not_found'             => __( 'Introuvable', 'text_domain' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'text_domain' ),
		'featured_image'        => __( 'Image en avant', 'text_domain' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'text_domain' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans l\'employé', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Ajouté à cet employé', 'text_domain' ),
		'items_list'            => __( 'Liste des employés', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation de la liste des employés', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer la liste des employés', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Employé', 'text_domain' ),
		'description'           => __( 'Employés', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'employee', $args );

}
add_action( 'init', 'employees', 0 );


// code pour faire des classes personnalisées pour seulement le type de post

function creer_taxonomie_pour_forfaits() {
    register_taxonomy('type_de_forfaits', array('forfait'), array(
        'label'             => __('Types de forfaits'),
        'rewrite'           => array('slug' => 'type-forfait'),
        'hierarchical'      => true, // true = fonctionne comme une catégorie, false = fonctionne comme un tag
        'show_admin_column' => true,
        'show_in_rest'      => true, // Permet l'utilisation dans l'éditeur Gutenberg
    ));
}
add_action('init', 'creer_taxonomie_pour_forfaits');

function enlever_categories_par_defaut() {
    unregister_taxonomy_for_object_type('category', 'forfait');
}
add_action('init', 'enlever_categories_par_defaut');

function verifier_categorie_personnalisee($post_id) {
    if (get_post_type($post_id) !== 'forfait') return;

    $categories = wp_get_post_terms($post_id, 'type-forfait');
    if (empty($categories)) {
        wp_die('Veuillez sélectionner une catégorie avant de publier.');
    }
}
add_action('save_post', 'verifier_categorie_personnalisee', 10, 1);


// code pour faire des classes personnalisées pour seulement le type de post

function creer_taxonomie_pour_seances() {
    register_taxonomy('type_de_seances', array('session'), array(
        'label'             => __('Types de séances'),
        'rewrite'           => array('slug' => 'type-session'),
        'hierarchical'      => true, // true = fonctionne comme une catégorie, false = fonctionne comme un tag
        'show_admin_column' => true,
        'show_in_rest'      => true, // Permet l'utilisation dans l'éditeur Gutenberg
    ));
}
add_action('init', 'creer_taxonomie_pour_seances');

function enlever_categories_par_defaut_sessions() {
    unregister_taxonomy_for_object_type('category', 'session');
}
add_action('init', 'enlever_categories_par_defaut_sessions');

function verifier_categorie_personnalisee_sessions($post_id) {
    if (get_post_type($post_id) !== 'session') return;

    $categories = wp_get_post_terms($post_id, 'type-session');
    if (empty($categories)) {
        wp_die('Veuillez sélectionner une catégorie avant de publier.');
    }
}
add_action('save_post', 'verifier_categorie_personnalisee_sessions', 10, 1);


// code pour faire des classes personnalisées pour seulement le type de post

function creer_taxonomie_pour_nouvelles() {
    register_taxonomy('type_de_nouvelles', array('new'), array(
        'label'             => __('Types de nouvelles'),
        'rewrite'           => array('slug' => 'type-actu'),
        'hierarchical'      => true, // true = fonctionne comme une catégorie, false = fonctionne comme un tag
        'show_admin_column' => true,
        'show_in_rest'      => true, // Permet l'utilisation dans l'éditeur Gutenberg
    ));
}
add_action('init', 'creer_taxonomie_pour_nouvelles');

function enlever_categories_par_defaut_nouvelles() {
    unregister_taxonomy_for_object_type('category', 'new');
}
add_action('init', 'enlever_categories_par_defaut_nouvelles');

function verifier_categorie_personnalisee_nouvelles($post_id) {
    if (get_post_type($post_id) !== 'new') return;

    $categories = wp_get_post_terms($post_id, 'type-actu');
    if (empty($categories)) {
        wp_die('Veuillez sélectionner une catégorie avant de publier.');
    }
}
add_action('save_post', 'verifier_categorie_personnalisee_nouvelles', 10, 1);

// code pour faire des classes personnalisées pour seulement le type de post

function creer_taxonomie_pour_employee() {
    register_taxonomy('type_de_employee', array('employee'), array(
        'label'             => __('Types employés'),
        'rewrite'           => array('slug' => 'type-employee'),
        'hierarchical'      => true, // true = fonctionne comme une catégorie, false = fonctionne comme un tag
        'show_admin_column' => true,
        'show_in_rest'      => true, // Permet l'utilisation dans l'éditeur Gutenberg
    ));
}
add_action('init', 'creer_taxonomie_pour_employee');

function enlever_categories_par_defaut_employee() {
    unregister_taxonomy_for_object_type('category', 'employee');
}
add_action('init', 'enlever_categories_par_defaut_employee');

function verifier_categorie_personnalisee_employee($post_id) {
    if (get_post_type($post_id) !== 'new') return;

    $categories = wp_get_post_terms($post_id, 'type-employee');
    if (empty($categories)) {
        wp_die('Veuillez sélectionner une catégorie avant de publier.');
    }
}
add_action('save_post', 'verifier_categorie_personnalisee_employee', 10, 1);

// code pour faire des classes personnalisées pour seulement le type de post

function creer_taxonomie_pour_event() {
    register_taxonomy('type_de_event', array('event'), array(
        'label'             => __('Types événements'),
        'rewrite'           => array('slug' => 'type-event'),
        'hierarchical'      => true, // true = fonctionne comme une catégorie, false = fonctionne comme un tag
        'show_admin_column' => true,
        'show_in_rest'      => true, // Permet l'utilisation dans l'éditeur Gutenberg
    ));
}
add_action('init', 'creer_taxonomie_pour_event');

function enlever_categories_par_defaut_event() {
    unregister_taxonomy_for_object_type('category', 'event');
}
add_action('init', 'enlever_categories_par_defaut_event');

function verifier_categorie_personnalisee_event($post_id) {
    if (get_post_type($post_id) !== 'event') return;

    $categories = wp_get_post_terms($post_id, 'type-event');
    if (empty($categories)) {
        wp_die('Veuillez sélectionner une catégorie avant de publier.');
    }
}
add_action('save_post', 'verifier_categorie_personnalisee_event', 10, 1);

// code pour faire des classes personnalisées pour seulement le type de post

function creer_taxonomie_pour_services() {
    register_taxonomy('type_de_service', array('service'), array(
        'label'             => __('Types de services'),
        'rewrite'           => array('slug' => 'type-service'),
        'hierarchical'      => true, // true = fonctionne comme une catégorie, false = fonctionne comme un tag
        'show_admin_column' => true,
        'show_in_rest'      => true, // Permet l'utilisation dans l'éditeur Gutenberg
    ));
}
add_action('init', 'creer_taxonomie_pour_services');

function enlever_categories_par_defaut_services() {
    unregister_taxonomy_for_object_type('category', 'service');
}
add_action('init', 'enlever_categories_par_defaut_services');

function verifier_categorie_personnalisee_services($post_id) {
    if (get_post_type($post_id) !== 'service') return;

    $categories = wp_get_post_terms($post_id, 'type-service');
    if (empty($categories)) {
        wp_die('Veuillez sélectionner une catégorie avant de publier.');
    }
}
add_action('save_post', 'verifier_categorie_personnalisee_services', 10, 1);

