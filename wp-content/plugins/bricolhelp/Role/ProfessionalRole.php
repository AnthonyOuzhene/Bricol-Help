<?php

namespace bricolHelp\Role;

class ProfessionalRole extends Role
{
        // définition des éléments spécifiques
        const ROLE_KEY = "professional";
        const ROLE_DISPLAY_NAME = "Professional";
        const CAPABILITIES = [
            'read' => true,
            'edit_posts' => true,
            'edit_tutorials' => true,
            'publish_tutorials' => true,
            'edit_tutorial' => true,
            'read_tutorial' => true,
            'delete_tutorial' => true,
            'edit_others_tutorials' => true,
            'delete_others_tutorials' => false,
            'delete_published_posts' => true,
            'manage_tools' => true,
            'edit_tools' => true,
            'delete_tools' => true,
            'assign_tools' => true,
            'manage_materials' => true,
            'edit_materials' => true,
            'delete_materials' => true,
            'assign_materials' => true,
            'manage_categories' => true,
            'edit_categories' => true,
            'delete_categories' => true,
            'assign_categories' => true,
        ];
}
