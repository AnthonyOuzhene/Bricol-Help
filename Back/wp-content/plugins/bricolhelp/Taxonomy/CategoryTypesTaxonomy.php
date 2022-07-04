<?php

namespace bricolHelp\Taxonomy;

use bricolHelp\PostType\TutorialsPostType;

class CategoryTypesTaxonomy extends Taxonomy {

    const TAXONOMY_KEY = 'category_types';
    const TAXONOMY_NAME = 'Category Types';
    const POST_TYPE_KEY = TutorialsPostType::POST_TYPE_KEY;
    const CAPABILITIES =  [
        'manage_terms' => 'manage_category_types',
        'edit_terms' => 'edit_category_types',
        'delete_terms' => 'delete_category_types',
        'assign_terms' => 'assign_category_types'
    ];

    const DEFAULT_ROLES_CAPS =  [
        'administrator' => [
            'manage_category_types' => true,
            'edit_category_types' => true,
            'delete_category_types' => true,
            'assign_category_types' => true,
        ],
    ];
}
