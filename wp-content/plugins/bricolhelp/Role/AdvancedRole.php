<?php

namespace bricolHelp\Role;

class AdvancedRole extends Role
{
        // définition des éléments spécifiques
        const ROLE_KEY = "advanced";
        const ROLE_DISPLAY_NAME = "Bricoleur avancé";
        const CAPABILITIES = [
            'read' => true,
            'edit_posts' => true,
            'edit_tutorials' => true,
            'publish_tutorials' => false,
            'edit_tutorial' => false,
            'read_tutorial' => true,
            'delete_tutorial' => false,
            'manage_tools' => true,
            'edit_tools' => true,
            'manage_materials' => true,
            'edit_materials' => true,
            'assign_materials' => true,
            'manage_categories' => true,
            'assign_categories' => true,
        ];
}
