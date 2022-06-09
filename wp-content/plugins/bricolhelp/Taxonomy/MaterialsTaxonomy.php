<?php

namespace bricolHelp\Taxonomy;

use bricolHelp\PostType\TutorialsPostType;

class MaterialsTaxonomy extends Taxonomy {

    const TAXONOMY_KEY = 'materials';
    const TAXONOMY_NAME = 'Materials';
    const POST_TYPE_KEY = TutorialsPostType::POST_TYPE_KEY;
    const CAPABILITIES =  [
        'manage_terms' => 'manage_materials',
        'edit_terms' => 'edit_materials',
        'delete_terms' => 'delete_materials',
        'assign_terms' => 'assign_materials'
    ];

    const DEFAULT_ROLES_CAPS =  [
        'administrator' => [
            'manage_materials' => true,
            'edit_materials' => true,
            'delete_materials' => true,
            'assign_materials' => true,
        ],
    ];
}
