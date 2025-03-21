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
    return 40; // Nombre de mots limite des résumés
}
add_filter('excerpt_length', 'new_excerpt_length');

// menu
register_nav_menus(array(
    'menu_header_vedette' => 'Liens Vedettes', // slug => nom dans l'interface
    'menu_header_sections' => 'Pages dans le menu', // slug => nom dans l'interface
    'menu_footer_pages' => 'Pages dans le pied de page', // slug => nom dans l'interface
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

function add_jetpack_support_for_cpt() {
    add_post_type_support('new', 'publicize'); // Remplace 'ton_cpt' par le slug de ton CPT
}
add_action('init', 'add_jetpack_support_for_cpt');

function remove_posts_from_admin_menu() {
    remove_menu_page('edit.php'); // Cache "Articles" du menu admin
}
add_action('admin_menu', 'remove_posts_from_admin_menu');

// Register Custom Post Type
function jobs() {

	$labels = array(
		'name'                  => _x( 'Emplois', 'Post Type General Name', 'badlach' ),
		'singular_name'         => _x( 'Emploi', 'Post Type Singular Name', 'badlach' ),
		'menu_name'             => __( 'Emplois', 'badlach' ),
		'name_admin_bar'        => __( 'Emploi', 'badlach' ),
		'archives'              => __( 'Archives des emplois', 'badlach' ),
		'attributes'            => __( 'Attributs de l\'emploi', 'badlach' ),
		'parent_item_colon'     => __( 'Emploi parent :', 'badlach' ),
		'all_items'             => __( 'Tous les emplois', 'badlach' ),
		'add_new_item'          => __( 'Ajouter un nouvel emploi', 'badlach' ),
		'add_new'               => __( 'Ajouter un emploi', 'badlach' ),
		'new_item'              => __( 'Nouvel emploi', 'badlach' ),
		'edit_item'             => __( 'Modifier l\'emploi', 'badlach' ),
		'update_item'           => __( 'Mettre à jour l\'emploi', 'badlach' ),
		'view_item'             => __( 'Voir l\'emploi', 'badlach' ),
		'view_items'            => __( 'Voir les emplois', 'badlach' ),
		'search_items'          => __( 'Chercher un emploi', 'badlach' ),
		'not_found'             => __( 'Introuvable', 'badlach' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'badlach' ),
		'featured_image'        => __( 'Image en avant', 'badlach' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'badlach' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'badlach' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'badlach' ),
		'insert_into_item'      => __( 'Insérer dans l\'emploi', 'badlach' ),
		'uploaded_to_this_item' => __( 'Ajouté à cet emploi', 'badlach' ),
		'items_list'            => __( 'Liste des emplois', 'badlach' ),
		'items_list_navigation' => __( 'Navigation de la liste des emplois', 'badlach' ),
		'filter_items_list'     => __( 'Filtrer la liste des emplois', 'badlach' ),
	);
	$args = array(
		'label'                 => __( 'Emploi', 'badlach' ),
		'description'           => __( 'Postes d\'emploi', 'badlach' ),
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
		'name'                  => _x( 'Actualités', 'Post Type General Name', 'badlach' ),
		'singular_name'         => _x( 'Actualité', 'Post Type Singular Name', 'badlach' ),
		'menu_name'             => __( 'Actualités', 'badlach' ),
		'name_admin_bar'        => __( 'Actualité', 'badlach' ),
		'archives'              => __( 'Archives des actualités', 'badlach' ),
		'attributes'            => __( 'Attributs des actualités', 'badlach' ),
		'parent_item_colon'     => __( 'Actualité parent :', 'badlach' ),
		'all_items'             => __( 'Toutes les actualités', 'badlach' ),
		'add_new_item'          => __( 'Ajouter une actualité', 'badlach' ),
		'add_new'               => __( 'Ajouter une actualité', 'badlach' ),
		'new_item'              => __( 'Nouvelle actualité', 'badlach' ),
		'edit_item'             => __( 'Modifier l\'actualité', 'badlach' ),
		'update_item'           => __( 'Mettre à jour l\'actualité', 'badlach' ),
		'view_item'             => __( 'Voir l\'actualité', 'badlach' ),
		'view_items'            => __( 'Voir les actualités', 'badlach' ),
		'search_items'          => __( 'Chercher une actualité', 'badlach' ),
		'not_found'             => __( 'Introuvable', 'badlach' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'badlach' ),
		'featured_image'        => __( 'Image en avant', 'badlach' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'badlach' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'badlach' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'badlach' ),
		'insert_into_item'      => __( 'Insérer dans l\'actualité', 'badlach' ),
		'uploaded_to_this_item' => __( 'Ajouté à cette actualité', 'badlach' ),
		'items_list'            => __( 'Liste des actualités', 'badlach' ),
		'items_list_navigation' => __( 'Navigation de la liste des actualités', 'badlach' ),
		'filter_items_list'     => __( 'Filtrer la liste des actualités', 'badlach' ),
	);
	$args = array(
		'label'                 => __( 'Actualité', 'badlach' ),
		'description'           => __( 'Actualités', 'badlach' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'publicize' ),
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
		'name'                  => _x( 'Forfaits', 'Post Type General Name', 'badlach' ),
		'singular_name'         => _x( 'Forfait', 'Post Type Singular Name', 'badlach' ),
		'menu_name'             => __( 'Forfaits', 'badlach' ),
		'name_admin_bar'        => __( 'Forfait', 'badlach' ),
		'archives'              => __( 'Archives des forfaits', 'badlach' ),
		'attributes'            => __( 'Attributs des forfaits', 'badlach' ),
		'parent_item_colon'     => __( 'Forfait parent :', 'badlach' ),
		'all_items'             => __( 'Tous les forfaits', 'badlach' ),
		'add_new_item'          => __( 'Ajouter un forfait', 'badlach' ),
		'add_new'               => __( 'Ajouter un forfait', 'badlach' ),
		'new_item'              => __( 'Nouveau forfait', 'badlach' ),
		'edit_item'             => __( 'Modifier le forfait', 'badlach' ),
		'update_item'           => __( 'Mettre à jour le forfait', 'badlach' ),
		'view_item'             => __( 'Voir le forfait', 'badlach' ),
		'view_items'            => __( 'Voir les forfaits', 'badlach' ),
		'search_items'          => __( 'Chercher un forfait', 'badlach' ),
		'not_found'             => __( 'Introuvable', 'badlach' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'badlach' ),
		'featured_image'        => __( 'Image en avant', 'badlach' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'badlach' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'badlach' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'badlach' ),
		'insert_into_item'      => __( 'Insérer dans le forfait', 'badlach' ),
		'uploaded_to_this_item' => __( 'Ajouté à ce forfait', 'badlach' ),
		'items_list'            => __( 'Liste des forfaits', 'badlach' ),
		'items_list_navigation' => __( 'Navigation de la liste des forfaits', 'badlach' ),
		'filter_items_list'     => __( 'Filtrer la liste des forfaits', 'badlach' ),
	);
	$args = array(
		'label'                 => __( 'Forfait', 'badlach' ),
		'description'           => __( 'Forfaits', 'badlach' ),
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
		'name'                  => _x( 'Services', 'Post Type General Name', 'badlach' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'badlach' ),
		'menu_name'             => __( 'Services', 'badlach' ),
		'name_admin_bar'        => __( 'Service', 'badlach' ),
		'archives'              => __( 'Archives des services', 'badlach' ),
		'attributes'            => __( 'Attributs des services', 'badlach' ),
		'parent_item_colon'     => __( 'Service parent :', 'badlach' ),
		'all_items'             => __( 'Tous les services', 'badlach' ),
		'add_new_item'          => __( 'Ajouter un service', 'badlach' ),
		'add_new'               => __( 'Ajouter un service', 'badlach' ),
		'new_item'              => __( 'Nouveau service', 'badlach' ),
		'edit_item'             => __( 'Modifier le service', 'badlach' ),
		'update_item'           => __( 'Mettre à jour le service', 'badlach' ),
		'view_item'             => __( 'Voir le service', 'badlach' ),
		'view_items'            => __( 'Voir les services', 'badlach' ),
		'search_items'          => __( 'Chercher un service', 'badlach' ),
		'not_found'             => __( 'Introuvable', 'badlach' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'badlach' ),
		'featured_image'        => __( 'Image en avant', 'badlach' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'badlach' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'badlach' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'badlach' ),
		'insert_into_item'      => __( 'Insérer dans le service', 'badlach' ),
		'uploaded_to_this_item' => __( 'Ajouté à ce service', 'badlach' ),
		'items_list'            => __( 'Liste des services', 'badlach' ),
		'items_list_navigation' => __( 'Navigation de la liste des services', 'badlach' ),
		'filter_items_list'     => __( 'Filtrer la liste des services', 'badlach' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'badlach' ),
		'description'           => __( 'Services', 'badlach' ),
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
		'name'                  => _x( 'Séances', 'Post Type General Name', 'badlach' ),
		'singular_name'         => _x( 'Séance', 'Post Type Singular Name', 'badlach' ),
		'menu_name'             => __( 'Horaire', 'badlach' ),
		'name_admin_bar'        => __( 'Séance', 'badlach' ),
		'archives'              => __( 'Archives des séances', 'badlach' ),
		'attributes'            => __( 'Attributs des séances', 'badlach' ),
		'parent_item_colon'     => __( 'Séance parente :', 'badlach' ),
		'all_items'             => __( 'Toutes les séances', 'badlach' ),
		'add_new_item'          => __( 'Ajouter une séance', 'badlach' ),
		'add_new'               => __( 'Ajouter une séance', 'badlach' ),
		'new_item'              => __( 'Nouvelle séance', 'badlach' ),
		'edit_item'             => __( 'Modifier la séance', 'badlach' ),
		'update_item'           => __( 'Mettre à jour la séance', 'badlach' ),
		'view_item'             => __( 'Voir la séance', 'badlach' ),
		'view_items'            => __( 'Voir les séances', 'badlach' ),
		'search_items'          => __( 'Chercher une séance', 'badlach' ),
		'not_found'             => __( 'Introuvable', 'badlach' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'badlach' ),
		'featured_image'        => __( 'Image en avant', 'badlach' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'badlach' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'badlach' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'badlach' ),
		'insert_into_item'      => __( 'Insérer dans la séance', 'badlach' ),
		'uploaded_to_this_item' => __( 'Ajouté à cette séance', 'badlach' ),
		'items_list'            => __( 'Liste des séances', 'badlach' ),
		'items_list_navigation' => __( 'Navigation de la liste des séances', 'badlach' ),
		'filter_items_list'     => __( 'Filtrer la liste des séances', 'badlach' ),
	);
	$args = array(
		'label'                 => __( 'Séance', 'badlach' ),
		'description'           => __( 'Séances', 'badlach' ),
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
		'name'                  => _x( 'Événements', 'Post Type General Name', 'badlach' ),
		'singular_name'         => _x( 'Événement', 'Post Type Singular Name', 'badlach' ),
		'menu_name'             => __( 'Événements', 'badlach' ),
		'name_admin_bar'        => __( 'Événement', 'badlach' ),
		'archives'              => __( 'Archives des événements', 'badlach' ),
		'attributes'            => __( 'Attributs des événements', 'badlach' ),
		'parent_item_colon'     => __( 'Événement parent :', 'badlach' ),
		'all_items'             => __( 'Tous les événements', 'badlach' ),
		'add_new_item'          => __( 'Ajouter un événement', 'badlach' ),
		'add_new'               => __( 'Ajouter un événement', 'badlach' ),
		'new_item'              => __( 'Nouvel événement', 'badlach' ),
		'edit_item'             => __( 'Modifier l\'événement', 'badlach' ),
		'update_item'           => __( 'Mettre à jour l\'événement', 'badlach' ),
		'view_item'             => __( 'Voir l\'événement', 'badlach' ),
		'view_items'            => __( 'Voir l\'événement', 'badlach' ),
		'search_items'          => __( 'Chercher un événement', 'badlach' ),
		'not_found'             => __( 'Introuvable', 'badlach' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'badlach' ),
		'featured_image'        => __( 'Image en avant', 'badlach' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'badlach' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'badlach' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'badlach' ),
		'insert_into_item'      => __( 'Insérer dans l\'événement', 'badlach' ),
		'uploaded_to_this_item' => __( 'Ajouté à cet événement', 'badlach' ),
		'items_list'            => __( 'Liste des événements', 'badlach' ),
		'items_list_navigation' => __( 'Navigation de la liste des événements', 'badlach' ),
		'filter_items_list'     => __( 'Filtrer la liste des événements', 'badlach' ),
	);
	$args = array(
		'label'                 => __( 'Événement', 'badlach' ),
		'description'           => __( 'Événements', 'badlach' ),
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
		'name'                  => _x( 'Employés', 'Post Type General Name', 'badlach' ),
		'singular_name'         => _x( 'Employé', 'Post Type Singular Name', 'badlach' ),
		'menu_name'             => __( 'Employés', 'badlach' ),
		'name_admin_bar'        => __( 'Employé', 'badlach' ),
		'archives'              => __( 'Archives des employés', 'badlach' ),
		'attributes'            => __( 'Attributs des employés', 'badlach' ),
		'parent_item_colon'     => __( 'Employé parent :', 'badlach' ),
		'all_items'             => __( 'Toutes les employés', 'badlach' ),
		'add_new_item'          => __( 'Ajouter un employé', 'badlach' ),
		'add_new'               => __( 'Ajouter un employé', 'badlach' ),
		'new_item'              => __( 'Nouvel employé', 'badlach' ),
		'edit_item'             => __( 'Modifier l\'employé', 'badlach' ),
		'update_item'           => __( 'Mettre à jour l\'employé', 'badlach' ),
		'view_item'             => __( 'Voir l\'employé', 'badlach' ),
		'view_items'            => __( 'Voir les employés', 'badlach' ),
		'search_items'          => __( 'Chercher un employé', 'badlach' ),
		'not_found'             => __( 'Introuvable', 'badlach' ),
		'not_found_in_trash'    => __( 'Introuvable dans la corbeille', 'badlach' ),
		'featured_image'        => __( 'Image en avant', 'badlach' ),
		'set_featured_image'    => __( 'Choisir l\'image en avant', 'badlach' ),
		'remove_featured_image' => __( 'Retirer l\'image en avant', 'badlach' ),
		'use_featured_image'    => __( 'Utiliser comme image en avant', 'badlach' ),
		'insert_into_item'      => __( 'Insérer dans l\'employé', 'badlach' ),
		'uploaded_to_this_item' => __( 'Ajouté à cet employé', 'badlach' ),
		'items_list'            => __( 'Liste des employés', 'badlach' ),
		'items_list_navigation' => __( 'Navigation de la liste des employés', 'badlach' ),
		'filter_items_list'     => __( 'Filtrer la liste des employés', 'badlach' ),
	);
	$args = array(
		'label'                 => __( 'Employé', 'badlach' ),
		'description'           => __( 'Employés', 'badlach' ),
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
    if (get_post_type($post_id) !== 'employee') return;

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

/**
 * Add textdomain support to the theme
 */
add_action('after_setup_theme', function() {
    load_theme_textdomain('badlach', get_template_directory() . '/languages');
});

add_action('after_setup_theme', function() {
    load_theme_textdomain('badlach', get_template_directory() . '/languages');
    // Vérification pour s'assurer que la traduction est bien chargée
    if (is_textdomain_loaded('badlach')) {
        error_log('Le texte-domaine badlach a été chargé avec succès.');
    } else {
        error_log('Le texte-domaine badlach n\'a pas été chargé.');
    }
});

// Fonction générique pour éviter la répétition de code
function acf_populate_taxonomy_select($field, $taxonomy, $add_all_option = false) {
    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => true, // Affiche seulement les catégories avec des posts
    ]);

    // Ajouter l'option "Toutes les catégories" si demandé
    if ($add_all_option) {
        $field['choices'] = ['all' => 'Toutes les catégories'];
    } else {
        $field['choices'] = [];
    }

    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $field['choices'][$term->slug] = $term->name;
        }
    }

    return $field;
}

// 1. Champ 'text_list_employee' → Taxonomie 'type_de_employee'
function acf_populate_text_list_employee($field) {
    return acf_populate_taxonomy_select($field, 'type_de_employee');
}
add_filter('acf/load_field/name=text_list_employee', 'acf_populate_text_list_employee');

// 2. Champ 'products_type' → Taxonomie 'type_de_service'
function acf_populate_products_type($field) {
    return acf_populate_taxonomy_select($field, 'product_cat', true);
}
add_filter('acf/load_field/name=products_type', 'acf_populate_products_type');

// 3. Champ 'service_category' → Taxonomie 'type_de_service' (+ "Toutes les catégories")
function acf_populate_service_category($field) {
    return acf_populate_taxonomy_select($field, 'product_cat', true);
}
add_filter('acf/load_field/name=service_category', 'acf_populate_service_category');

// 4. Champ 'categorie_de_nouvelles' → Taxonomie 'type_de_nouvelles' (+ "Toutes les catégories")
function acf_populate_categorie_de_nouvelles($field) {
    return acf_populate_taxonomy_select($field, 'type_de_nouvelles', true);
}
add_filter('acf/load_field/name=categorie_de_nouvelles', 'acf_populate_categorie_de_nouvelles');

// 5. Champ 'vedette_news_category' → Taxonomie 'type_de_nouvelles' (+ "Toutes les catégories")
function acf_populate_vedette_news_category($field) {
    return acf_populate_taxonomy_select($field, 'type_de_nouvelles', true);
}
add_filter('acf/load_field/name=vedette_news_category', 'acf_populate_vedette_news_category');

// 6. Champ 'vedette_services_category' → Taxonomie 'type_de_service' (+ "Toutes les catégories")
function acf_populate_vedette_services_category($field) {
    return acf_populate_taxonomy_select($field, 'product_cat', true);
}
add_filter('acf/load_field/name=vedette_services_category', 'acf_populate_vedette_services_category');

// 7. Champ 'vedette_events_category' → Taxonomie 'type_de_event' (+ "Toutes les catégories")
function acf_populate_vedette_events_category($field) {
    return acf_populate_taxonomy_select($field, 'type_de_event', true);
}
add_filter('acf/load_field/name=vedette_events_category', 'acf_populate_vedette_events_category');


if ( !is_admin() ) {
    error_reporting(0); // Masque les erreurs sur le front-end
    @ini_set('display_errors', 0); // Empêche l'affichage des erreurs PHP
}

function custom_add_menu_link() {
    add_menu_page(
        'Menus',                // Nom affiché dans le menu
        'Gérer les menus',      // Titre du menu
        'edit_pages',           // Capacité minimale (Éditeur et supérieur)
        'nav-menus.php',        // URL cible (page de gestion des menus)
        '',                     // Fonction de callback (non nécessaire ici)
        'dashicons-menu',       // Icône Dashicons pour le menu
        3                       // Position (très haut dans la sidebar)
    );
}
add_action('admin_menu', 'custom_add_menu_link');

function custom_modify_editor_capabilities() {
    $role = get_role('editor'); 
    if ($role) {
        // Autoriser la gestion des menus
        if (!$role->has_cap('edit_theme_options')) {
            $role->add_cap('edit_theme_options');
        }

        // Empêcher le changement de thème
        if ($role->has_cap('switch_themes')) {
            $role->remove_cap('switch_themes');
        }
    }
}
add_action('init', 'custom_modify_editor_capabilities');

function remove_appearance_menu_for_editors() {
    if (!current_user_can('manage_options')) { // Seuls les admins voient "Apparence"
        remove_menu_page('themes.php');
    }
}
add_action('admin_menu', 'remove_appearance_menu_for_editors', 999);


