<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Autres tailles d'image
add_image_size( 'square', 900, 900, true );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

function seize_assets() {
    
    // Déclarer jQuery et autres bibliothèques
    wp_enqueue_script('jquery');

    wp_enqueue_script( // Swup
        'swup', 
        'https://unpkg.com/swup@4', 
        false, 
        '4.0', 
        true 
    );

    wp_enqueue_script( 
        'seize_lightbox', 
        get_template_directory_uri() . '/js/lightbox.js', 
        array( 'jquery' ), 
        '1.0', 
        true
    );

    wp_enqueue_script( 
        'seize_script', 
        get_template_directory_uri() . '/js/script.js', 
        array( 'jquery' ), 
        '1.0', 
        true
    );

    // Ajouter l'attribut "defer" au script
    wp_script_add_data( 'seize_lightbox', 'defer', true );
    wp_script_add_data( 'seize_script', 'defer', true );

    // Déclarer les fichiers de style
    wp_enqueue_style( 
        'seize',
        get_stylesheet_uri(), 
        array(), 
        '1.0'
    );

}
add_action( 'wp_enqueue_scripts', 'seize_assets' );

function seize_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'seize' ) );
    register_nav_menu( 'footer-menu', __( 'Menu Bas de Page', 'seize' ) );
}
add_action( 'after_setup_theme', 'seize_menu');

// Création CPT et Taxonomies
function seize_post_types() {
	// CPT Portfolio
    $labels = array(
        'name' => 'Portfolio',
        'all_items' => 'Tous les projets',
        'singular_name' => 'Projet',
        'add_new' => 'Ajouter',
        'add_new_item' => 'Ajouter un projet',
        'edit_item' => 'Modifier le projet',
        'update_item' => 'Éditer le projet',
        'menu_name' => 'Portfolio'
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'menu_position' => 10, 
        'menu_icon' => 'dashicons-portfolio',
	);
	register_post_type( 'portfolio', $args );

    // Taxonomie Compétences
    $labels = array(
        'name' => 'Compétences',
        'new_item_name' => 'Nom de la nouvelle compétence',
        'add_new_item' => 'Ajouter une nouvelle compétence',
        'edit_item' => 'Modifier la compétence'
    );
    
    $args = array( 
        'labels' => $labels,
        'public' => true, 
        'show_in_rest' => true,
        'hierarchical' => true, 
    );
    register_taxonomy( 'competences', 'portfolio', $args );
}
add_action( 'init', 'seize_post_types' );