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
    return 10; // Nombre de mots limite
}
add_filter('excerpt_length', 'new_excerpt_length');

// menu
register_nav_menus(array(
    'zone_menu_principale' => 'Zone principale' // slug => nom dans l'interface
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