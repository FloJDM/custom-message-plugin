<?php
/**
 * Plugin Name: Custom Message Plugin
 * Description: Enregistre un Custom Post Type "Message personnalisé".
 * Version: 1.0.0
 * Author: Ton Nom
 */

defined('ABSPATH') || exit;

function cmp_register_custom_post_type() {
    $labels = [
        'name'               => 'Messages personnalisés',
        'singular_name'      => 'Message personnalisé',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter un message',
        'edit_item'          => 'Modifier',
        'new_item'           => 'Nouveau message',
        'view_item'          => 'Voir le message',
        'search_items'       => 'Rechercher',
        'not_found'          => 'Aucun message trouvé',
        'menu_name'          => 'Messages personnalisés',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 25,
        'menu_icon'          => 'dashicons-format-chat',
        'supports'           => ['title', 'editor'],
        'has_archive'        => true,
        'show_in_rest'       => true,
    ];

    register_post_type('message_personnalise', $args);
}
add_action('init', 'cmp_register_custom_post_type');


require plugin_dir_path(__FILE__) . 'plugin-update-checker-master/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$updateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/FloJDM/custom-message-plugin',
    __FILE__,
    'custom-message-plugin'
);

$updateChecker->setBranch('main');
