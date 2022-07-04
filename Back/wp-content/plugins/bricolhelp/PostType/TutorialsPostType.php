<?php

namespace bricolHelp\PostType;

class TutorialsPostType extends PostType
{
    // On définit les données qui sont spécifiques à ce CPT de la classe parente
    const POST_TYPE_KEY = 'tutorials';
    const POST_TYPE_LABEL = 'Tutorials';
    const POST_TYPE_SLUG = 'tutoriels';

    const CAPABILITIES = [
        // [cap par défaut, existante dans WP] => [cap custom qui correpond à la même action mais pour ce CPT distinct]
        'edit_posts' => 'edit_tutorials', // on décide du nom de la capability à associer au comportement par défaut "edit_posts"
        'publish_posts' => 'publish_tutorials',
        'edit_post' => 'edit_tutorial',
        'read_post' => 'read_tutorial',
        'delete_post' => 'delete_tutorial',
        'edit_others_posts' => 'edit_others_tutorials',
        'delete_others_posts' =>  'delete_others_tutorials', // la notion "others" s'appuie sur l'auteur du post, il faut donc que ce CPT déclare le support de la feature "author"
        'delete_published_posts' => 'delete_published_tutorials',
    ];

    // la liste des custom caps pour ce CPT que je veux associer à l'administrateur
    const DEFAULT_ROLES_CAPS = [
        'administrator' => [
            'edit_tutorials' => true, 
            'publish_tutorials' => true,
            'edit_tutorial' => true,
            'read_tutorial' => true,
            'delete_tutorial' => true,
            'edit_others_tutorials' => true,
            'delete_others_tutorials' => true,
        ]
    ];
}
