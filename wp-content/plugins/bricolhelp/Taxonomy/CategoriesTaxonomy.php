<?php

namespace bricolHelp\Taxonomy;

use bricolHelp\PostType\TutorialsPostType;

class CategoriesTaxonomy extends Taxonomy {

    const TAXONOMY_KEY = 'categories';
    const TAXONOMY_NAME = 'Categories';
    const POST_TYPE_KEY = TutorialsPostType::POST_TYPE_KEY;
    const CAPABILITIES =  [
        'manage_terms' => 'manage_categories',
        'edit_terms' => 'edit_categories',
        'delete_terms' => 'delete_categories',
        'assign_terms' => 'assign_categories'
    ];

    const DEFAULT_ROLES_CAPS =  [
        'administrator' => [
            'manage_categories' => true,
            'edit_categories' => true,
            'delete_categories' => true,
            'assign_categories' => true,
        ],
    ];
}
