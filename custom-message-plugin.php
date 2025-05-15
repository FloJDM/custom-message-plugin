<?php
/**
 * Plugin Name: Custom Message Plugin
 * Description: Enregistre un Custom Post Type "Message personnalisé".
 * Version: 1.0.3
 * Author: Ton Nom
 */

defined('ABSPATH') || exit;

function cmp_register_cpt_message()
{
    $labels = [
        'name' => 'Messages personnalisés',
        'singular_name' => 'Message personnalisé',
        'add_new' => 'Ajouter',
        'add_new_item' => 'Ajouter un message',
        'edit_item' => 'Modifier',
        'new_item' => 'Nouveau message',
        'view_item' => 'Voir le message',
        'search_items' => 'Rechercher',
        'not_found' => 'Aucun message trouvé',
        'menu_name' => 'Messages personnalisés',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'menu_position' => 25,
        'menu_icon' => 'dashicons-format-chat',
        'supports' => ['title', 'editor'],
        'has_archive' => true,
        'show_in_rest' => true,
    ];

    register_post_type('message_personnalise', $args);
}
add_action('init', 'cmp_register_cpt_message');

function cmp_register_cpt_annonce()
{
    $labels = [
        'name'               => 'Evenements',
        'singular_name'      => 'Evenement',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter une annonce',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouvelle annonce',
        'view_item'          => 'Voir l\'annonce',
        'search_items'       => 'Rechercher des annonces',
        'not_found'          => 'Aucune annonce trouvée',
        'menu_name'          => 'Annonces',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'menu_position' => 26,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => ['title', 'editor'],
        'has_archive' => true,
        'show_in_rest' => true,
    ];

    register_post_type('annonce', $args);
}
add_action('init', 'cmp_register_cpt_annonce');

function cmp_register_taxonomy_theme_message()
{
    $labels = [
        'name' => 'Thèmes',
        'singular_name' => 'Thème',
        'search_items' => 'Rechercher des thèmes',
        'all_items' => 'Tous les thèmes',
        'edit_item' => 'Modifier le thème',
        'update_item' => 'Mettre à jour le thème',
        'add_new_item' => 'Ajouter un nouveau thème',
        'new_item_name' => 'Nouveau nom de thème',
        'menu_name' => 'Thèmes',
    ];

    $args = [
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'theme-message'],
        'show_in_rest' => true,
    ];

    register_taxonomy('theme_message', ['message_personnalise'], $args);
}
add_action('init', 'cmp_register_taxonomy_theme_message');

require plugin_dir_path(__FILE__) . 'plugin-update-checker-master/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$updateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/FloJDM/custom-message-plugin',
    __FILE__,
    'custom-message-plugin'
);

$updateChecker->setBranch('main');
