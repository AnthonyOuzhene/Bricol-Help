<?php

namespace bricolHelp\Taxonomy;

use bricolHelp\PostType\TutorialsPostType;

class ToolsTaxonomy extends Taxonomy {

    const TAXONOMY_KEY = 'tools';
    const TAXONOMY_NAME = 'Tools';
    const POST_TYPE_KEY = TutorialsPostType::POST_TYPE_KEY;
    const CAPABILITIES =  [
        'manage_terms' => 'manage_tools',
        'edit_terms' => 'edit_tools',
        'delete_terms' => 'delete_tools',
        'assign_terms' => 'assign_tools'
    ];

    const DEFAULT_ROLES_CAPS =  [
        'administrator' => [
            'manage_tools' => true,
            'edit_tools' => true,
            'delete_tools' => true,
            'assign_tools' => true,
        ],
    ];
}
